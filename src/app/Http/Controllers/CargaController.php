<?php

namespace App\Http\Controllers;

use App\Interfaces\DeficitHabitacionalRepositoryInterface;
use App\Interfaces\MunicipioRepositoryInterface;
use App\Interfaces\UnidadeRepositoryInterface;
use App\Jobs\InsertUnidade;
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
        $this->importDeficthabitacional();
        $this->importUnidadesEducacao();
        // $this->importUnidadesSaude();
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
        $csvEducacao = 'planilhas/new_unidades_educacao.csv';
        $data = array_map('str_getcsv', file($csvEducacao));
        foreach ($data as $key => $unidade_educacao) {
            if ($key > 0) {
                $cod_ibge =  $this->municipioRepository->getCodeByName(strtoupper(trim($unidade_educacao[4])));
                if ($cod_ibge) {
                    // $latitude = substr($unidade_educacao[7], 0, 4);
                    // $longitude = substr($unidade_educacao[8], 0, 4);
                    // $latitude2 =  substr($unidade_educacao[7], 5, -1);
                    // $longitude2 = substr($unidade_educacao[8], 5, -1);
                    // $latitude = $latitude . str_replace(".", "", $latitude2);
                    // $longitude = $longitude .  str_replace(".", "", $longitude2);

                    $dtoEducacao[] =  [
                        'cd_mec' => $unidade_educacao[2],
                        'nome' => strtoupper(trim($unidade_educacao[1])),
                        'dep_administrativo' => trim($unidade_educacao[7]),
                        'has_convenio' => hasConvenio(trim($unidade_educacao[12])),
                        'logradouro' => strtoupper(trim($unidade_educacao[8])),
                        // 'bairro' => strtoupper(trim($unidade_educacao[5])),
                        'latitude' => $unidade_educacao[17],
                        'longitude' => $unidade_educacao[18],
                        // 'dt_criacao' => trim($unidade_educacao[9]),
                        'qtd_alunos_matriculados' => $unidade_educacao[14],
                        'cod_ibge' => $cod_ibge,
                        'tp_unidade' => 1,
                        'created_at' => Carbon::now()
                    ];
                } else {
                    echo $unidade_educacao[4] . "<br>";
                }
            } else {
                // dd($unidade_educacao);
            }
        }
        $this->unidadeRepository->insert($dtoEducacao);
        echo "<p>" . count($dtoEducacao) . " unidades de educação importadas </p><br>";
    }

    public function importUnidadesSaude()
    {
        $csvSaude = 'planilhas/unidades_saude.csv';
        $data = array_map('str_getcsv', file($csvSaude));
        $i = 0;
        foreach ($data as $key => $unidade_saude) {
            if ($key > 0) {
                if ($unidade_saude[7]) {
                    dispatch(new InsertUnidade($unidade_saude));
                }
            }
        }
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
