<?php

namespace App\Interfaces;

interface DeficitHabitacionalRepositoryInterface
{
    public function store($data);
    public function deleteAll();
}
