<?php

namespace App\Repositories;

use App\Interfaces\MunicipioRepositoryInterface;
use App\Models\Municipios;

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
        $url = 'https://viacep.com.br/ws/' . $cep . '/json/';
        $response = file_get_contents($url);
        $response = json_decode($response, true);
        return $response['ibge'];
    }
}
