<?php

namespace App\Repositories;

use App\Interfaces\UnidadeRepositoryInterface;
use App\Models\Unidades;
use Illuminate\Support\Facades\DB;

class UnidadeRepository implements UnidadeRepositoryInterface
{
    public function getAll($request)
    {
        $tp_unidade = $request->query('tp_unidade');
        $cod_ibge = $request->query('cod_ibge');

        $result = DB::table('unidades as u');

        if (isset($tp_unidade)) {
            $result->where('tp_unidade', $tp_unidade);
        }

        if (isset($cod_ibge)) {
            $result->where('cod_ibge', $cod_ibge);
        } else {
            $result->where('cod_ibge', '5201405');
        }
        return     $result->get();
    }

    public function insert($data)
    {
        return Unidades::insert($data);
    }

    public function deleteAll()
    {
        return Unidades::getQuery()->delete();
    }

    public function getCountByMunicipio($tp_unidade, $cod_ibge)
    {
        return Unidades::where('tp_unidade', $tp_unidade)
            ->where('cod_ibge', $cod_ibge)
            ->where('latitude', '!=', '')
            ->where('longitude', '!=', '')
            ->count();
    }
}
