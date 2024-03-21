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
}
