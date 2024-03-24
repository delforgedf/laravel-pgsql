<?php

namespace App\Interfaces;

interface MunicipioRepositoryInterface
{
    public function getCodeByName($name);
    public function store($data);
    public function deleteAll();
    public function getByCep($cep);
    public function getAll();
    public function getByCode($cd_ibge);
}
