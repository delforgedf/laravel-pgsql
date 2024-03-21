<?php

namespace App\Repositories;

use App\Interfaces\UnidadeRepositoryInterface;
use App\Models\Unidades;

class UnidadeRepository implements UnidadeRepositoryInterface
{
    public function getAll()
    {
        $result =  Unidades::all();
        return $result;
    }

    public function insert($data)
    {
        Unidades::insert($data);
    }

    public function deleteAll()
    {
        Unidades::getQuery()->delete();
    }
}
