<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class Query
{
    public function update($valor, $tabela, $coluna): void
    {
        DB::insert(
        "update $tabela set $coluna = $valor"
    );

    }

    public function select(string $tabela, string $coluna = "*"): void
    {
        DB::select(
        "select $coluna from $tabela"
    );

    }

    public function resolve1001($id_solicitacao){
        return DB::select(
            "update solicitacao_provisioning set status = 'executar'
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro') 
            and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = {$id_solicitacao})"
        );
    }
/*
    public function resolve13001($imsi){
        !72454
        
        if 72404;
        72403;
        72402;
    }
*/
    public function passo3(){
        
    }

    public function passo4(){
        
    }

    public function passo5(){
        
    }

    public function passo6(){
        
    }

    public function passo7(){
        
    }
}