<?php

namespace App\Repositories;

use App\Interfaces\MunicipioRepositoryInterface;
use App\Models\Municipios;
use Illuminate\Support\Facades\Http;

class MunicipioRepository implements MunicipioRepositoryInterface
{
    public function getCodeByName($name)
    {
        $result =  Municipios::where('nome', 'ILIKE', "%{$name}%")->value('cod_ibge');
        return $result;
    }

    public function store($data)
    {
        return Municipios::insert($data);
    }

    public function deleteAll()
    {
        return Municipios::getQuery()->delete();
    }

    public function getByCep($cep)
    {
        $response = Http::get("https://opencep.com/v1/$cep.json")->json();
        return isset($response['ibge']) ? $response['ibge'] : false;
    }
}
