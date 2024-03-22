<?php

namespace App\Jobs;

use App\Interfaces\MunicipioRepositoryInterface;
use App\Interfaces\UnidadeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertUnidade implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $unidade;


    /**
     * Create a new job instance.
     */
    public function __construct(
        $unidade

    ) {
        $this->unidade = $unidade;
    }

    /**
     * Execute the job.
     */
    public function handle(MunicipioRepositoryInterface $municipioRepository, UnidadeRepositoryInterface $unidadeRepository): void
    {
        $cod_ibge = $municipioRepository->getByCep($this->unidade[7]);
        if ($cod_ibge) {
            $dtoSaude =  [
                'cnes' => trim($this->unidade[0]),
                'razao_social' => mb_convert_encoding(strtoupper(trim($this->unidade[1])), "UTF-8", "HTML-ENTITIES"),
                'nome_fantasia' => mb_convert_encoding(strtoupper(trim($this->unidade[2])), "UTF-8", "HTML-ENTITIES"),
                'logradouro' => trim($this->unidade[3]),
                'numero' => trim($this->unidade[4]),
                'complemento' => trim($this->unidade[5]),
                'bairro' => trim($this->unidade[6]),
                'cep' => trim($this->unidade[7]),
                'telefone' => $this->unidade[8],
                'email' => mb_convert_encoding(strtoupper(trim($this->unidade[9])), "UTF-8", "HTML-ENTITIES"),
                'has_vinculo_sus' => ($this->unidade[11] == 'NAO' ? false : true),
                'tp_unidade_saude' => mb_convert_encoding(strtoupper(trim($this->unidade[12])), "UTF-8", "HTML-ENTITIES"),
                'latitude' => trim($this->unidade[14]),
                'longitude' => trim($this->unidade[15]),
                'cod_ibge' => (int) $cod_ibge,
                'tp_unidade' => 2,
                'created_at' => Carbon::now()
            ];
            $unidadeRepository->insert($dtoSaude);
        }
    }
}
