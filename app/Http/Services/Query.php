<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class Query
{

    private $id_solicitacao;
    private $problema;

    public function __construct($problema, $id_solicitacao){
        $this->problema = $problema;
        $this->id_solicitacao = $id_solicitacao;
    }

    public function resolveTudo(){
        switch($this->problema){
            case 1001: 
                return $this->resolve1001();
                break;
        }
    }

    private function resolve1001(){
        return DB::select(
            "update solicitacao_provisioning set status = 'executar'
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning
            from solicitacao_provisioning 
            where status = 'concluido_com_erro') 
            and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
    }

    private function getImsi(){
        return DB::table('solicitacao_provisioning')
                     ->select('imsi')
                     ->where('id_solicitacao_provisioning', '=', $this->id_solicitacao)
                     ->get();
    }
/*
    public function select(string $tabela, string $coluna = "*"): void
    {
        DB::select(
        "select $coluna from $tabela"
    );
    }

    public function resolve13001($imsi){
        !72454
        
        if 72404;
        72403;
        72402;
    }

*/
}