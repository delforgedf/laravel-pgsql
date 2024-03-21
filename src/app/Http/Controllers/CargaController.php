<?php

namespace App\Http\Controllers;

use App\Interfaces\DeficitHabitacionalRepositoryInterface;
use App\Interfaces\MunicipioRepositoryInterface;
use App\Interfaces\UnidadeRepositoryInterface;
use Carbon\Carbon;

class CargaController extends Controller
{
    private MunicipioRepositoryInterface $municipioRepository;
    private UnidadeRepositoryInterface $unidadeRepository;
    private DeficitHabitacionalRepositoryInterface $defictRepository;


    public function __construct(
        MunicipioRepositoryInterface $municipioRepository,
        UnidadeRepositoryInterface $unidadeRepository,
        DeficitHabitacionalRepositoryInterface $defictRepository
    ) {
        $this->municipioRepository = $municipioRepository;
        $this->unidadeRepository = $unidadeRepository;
        $this->defictRepository = $defictRepository;
    }


    public function importData()
    {

        $this->unidadeRepository->deleteAll();
        $this->defictRepository->deleteAll();
        $this->municipioRepository->deleteAll();
        $this->importMunicipios();
        // $this->importDeficthabitacional();
        // $this->importUnidadesEducacao();
        $this->importUnidadesSaude();
    }

    private function importDeficthabitacional()
    {
        $csvSaude = 'planilhas/deficit_hab.csv';
        $data = array_map('str_getcsv', file($csvSaude));

        foreach ($data as $key => $defict) {
            if ($key > 2 && $key < count($data) - 1) {
                $dtoDefict[] =  [
                    'cod_ibge' => $this->municipioRepository->getCodeByName(strtoupper(trim($defict[0]))),
                    'adensado' => $defict[1],
                    'comodo' => $defict[2],
                    'improvisado' => $defict[3],
                    'onus' => $defict[4],
                    'rustico' => $defict[5],
                ];
            }
        }
        $this->defictRepository->store($dtoDefict);
    }

    private function importUnidadesEducacao()
    {
        $csvEducacao = 'planilhas/unidades_educacao.csv';
        $data = array_map('str_getcsv', file($csvEducacao));
        foreach ($data as $key => $unidade_educacao) {
            if ($key > 0) {
                $cod_ibge =  $this->municipioRepository->getCodeByName(mb_convert_encoding(strtoupper(trim($unidade_educacao[6])), "UTF-8", "HTML-ENTITIES"));
                if ($cod_ibge) {
                    $dtoEducacao[] =  [
                        'cd_mec' => $unidade_educacao[0],
                        'nome' => mb_convert_encoding(strtoupper(trim($unidade_educacao[1])), "UTF-8", "HTML-ENTITIES"),
                        'dep_administrativo' => trim($unidade_educacao[2]),
                        'has_convenio' => hasConvenio(mb_convert_encoding(strtoupper(trim($unidade_educacao[3])), "UTF-8", "HTML-ENTITIES")),
                        'logradouro' => mb_convert_encoding(strtoupper(trim($unidade_educacao[4])), "UTF-8", "HTML-ENTITIES"),
                        'bairro' => mb_convert_encoding(strtoupper(trim($unidade_educacao[5])), "UTF-8", "HTML-ENTITIES"),
                        'latitude' => trim($unidade_educacao[7]),
                        'longitude' => trim($unidade_educacao[8]),
                        'dt_criacao' => trim($unidade_educacao[9]),
                        'qtd_alunos_matriculados' => $unidade_educacao[10],
                        'cod_ibge' => $cod_ibge,
                        'tp_unidade' => 1,
                        'created_at' => Carbon::now()
                    ];
                }
            }
        }
        $this->unidadeRepository->insert($dtoEducacao);
    }

    private function importUnidadesSaude()
    {
        $csvSaude = 'planilhas/unidades_saude.csv';
        $data = array_map('str_getcsv', file($csvSaude));
        foreach ($data as $key => $unidade_saude) {
            if ($key > 0 && $key <= 100) {
                if ($unidade_saude[7]) {
                    $dtoSaude[] =  [
                        'cnes' => trim($unidade_saude[0]),
                        'razao_social' => mb_convert_encoding(strtoupper(trim($unidade_saude[1])), "UTF-8", "HTML-ENTITIES"),
                        'nome_fantasia' => mb_convert_encoding(strtoupper(trim($unidade_saude[2])), "UTF-8", "HTML-ENTITIES"),
                        'logradouro' => trim($unidade_saude[3]),
                        'numero' => trim($unidade_saude[4]),
                        'complemento' => trim($unidade_saude[5]),
                        'bairro' => trim($unidade_saude[6]),
                        'cep' => trim($unidade_saude[7]),
                        'telefone' => $unidade_saude[8],
                        'email' => mb_convert_encoding(strtoupper(trim($unidade_saude[9])), "UTF-8", "HTML-ENTITIES"),
                        'has_vinculo_sus' => ($unidade_saude[11] == 'NAO' ? false : true),
                        'tp_unidade_saude' => mb_convert_encoding(strtoupper(trim($unidade_saude[12])), "UTF-8", "HTML-ENTITIES"),
                        'latitude' => trim($unidade_saude[14]),
                        'longitude' => trim($unidade_saude[15]),
                        'cod_ibge' => (int) $this->municipioRepository->getByCep($unidade_saude[7]),
                        'tp_unidade' => 2,
                        'created_at' => Carbon::now()
                    ];
                }
            }
        }

        $this->unidadeRepository->insert($dtoSaude);
    }

    public function importMunicipios()
    {
        $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/52/municipios';
        $response = file_get_contents($url);
        $response = json_decode($response, true);

        foreach ($response as  $value) {
            $dto[] =  [
                'cod_ibge' => $value['id'],
                'nome' => $value['nome'],
                'created_at' => Carbon::now()
            ];
        }
        $this->municipioRepository->store($dto);
    }
}
