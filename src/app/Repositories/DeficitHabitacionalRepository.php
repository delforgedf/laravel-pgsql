<?php

namespace App\Repositories;

use App\Interfaces\DeficitHabitacionalRepositoryInterface;
use App\Models\Deficit_Habitacional;

class DeficitHabitacionalRepository implements DeficitHabitacionalRepositoryInterface
{
    public function store($data)
    {
        return Deficit_Habitacional::insert($data);
    }

    public function deleteAll()
    {
        return Deficit_Habitacional::getQuery()->delete();
    }

    public function getDeficitByMunicipio($cod_ibge)
    {
        return  Deficit_Habitacional::where('cod_ibge', $cod_ibge)->get()->first();
    }
}
