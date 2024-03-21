<?php

namespace App\Interfaces;

interface UnidadeRepositoryInterface
{
    public function getall();
    public function insert($data);
    public function deleteAll();
}
