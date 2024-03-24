<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\MunicipioRepositoryInterface;

class HomeController extends Controller
{
    private MunicipioRepositoryInterface $municipioRepository;



    public function __construct(
        MunicipioRepositoryInterface $municipioRepository,

    ) {
        $this->municipioRepository = $municipioRepository;
    }


    public function index()
    {
        $municipios = $this->municipioRepository->getAll();
        return view("home", ["municipios" => $municipios]);
    }
}
