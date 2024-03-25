<?php

namespace App\Interfaces;

interface UnidadeRepositoryInterface
{
    public function getall($request);
    public function insert($data);
    public function deleteAll();
    public function getCountByMunicipio($tp_unidade, $cod_ibge);
}
