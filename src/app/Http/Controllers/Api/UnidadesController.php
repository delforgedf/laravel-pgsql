<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\DeficitHabitacionalRepositoryInterface;
use App\Interfaces\MunicipioRepositoryInterface;
use App\Interfaces\UnidadeRepositoryInterface;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class UnidadesController extends Controller
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


    public function getAllUnidades(Request $request)
    {

        $unidades = $this->unidadeRepository->getall($request);
        return response()->json($unidades, 200);
    }

    public function getDeficit(Request $request)
    {
        $cod_ibge = $request->query('cod_ibge');
        $deficit = $this->defictRepository->getDeficitByMunicipio($cod_ibge);
        $municipio = $this->municipioRepository->getByCode($cod_ibge);
        $unidadesEducacao = $this->unidadeRepository->getCountByMunicipio(1, $cod_ibge);
        $unidadesSaude = $this->unidadeRepository->getCountByMunicipio(2, $cod_ibge);

        $deficit['municipio'] = $municipio;
        $deficit['total_educacao'] = $unidadesEducacao;
        $deficit['total_saude'] = $unidadesSaude;
        return response()->json($deficit, 200);
    }
}
