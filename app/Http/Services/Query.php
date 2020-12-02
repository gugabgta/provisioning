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
            case 13:
                return $this->resolve13();
            case 14:
                return $this->resolve14();
            case 27:
                return $this->resolve27();
            case 709:
                return $this->resolve709();
            case 1001:
                return $this->resolve1001();
            case 1002:                
                return $this->resolve1002();    
            case 2003:
                return $this->resolve2003();
            case 3007:
                return $this->resolve3007();
            case 4099:
                return $this->resolve4099();
            case 6000:                
                return $this->resolve6000();    
            case 10446:
                return $this->resolve10446();
            case 11000:
                return $this->resolve11000();
            case 311014:
                return $this->resolve311014();
            case 312014:
                return $this->resolve312014();
            case 'test':
                return $this->resolveTest();
        }
    }

    private function resolve13()
    {
        DB::update(
            "update solicitacao_provisioning set status = 'concluido_com_sucesso' 
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro')
              and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return 'Erro 13 Necessario reportar pra tim, tabela atualizada';
    }

    private function resolve14()
    {
        DB::update(
            "update solicitacao_provisioning set status = 'concluido_com_sucesso' 
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro')
              and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return 'Erro 14 "troca de msisdn" Necessario reportar pra tim, tabela atualizada';
    }

    private function resolve27()
    {
        /*nao esquece desse aqui */
        return 'Erro 27';
    }

    private function resolve709()
    {
        DB::update(
            "update solicitacao_provisioning set status = 'executar' 
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro')
              and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return 'Erro 709 "executar novamente, verificação manual", tabela atualizada';
    }

    private function resolve1001(){
        DB::update(
            "update solicitacao_provisioning set status = 'executar'
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning
            from solicitacao_provisioning 
            where status = 'concluido_com_erro') 
            and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return "resolvido 1001, tabela atualizado";
    }

    private function resolve1002()
    {
        DB::update(
            "update solicitacao_provisioning set status = 'executar' 
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro')
              and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return 'Erro 1002 "executar novamente", tabela atualizada';
    }

    private function resolve2003()
    {
        //voltar nesse aqui tambem
        return 'sem solução até entao';
    }

    private function resolve3007()
    {
        return "I'm a teapot";
    }

    private function resolve4099()
    {
        DB::update(
            "update solicitacao_provisioning set status = 'concluido_com_sucesso' 
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro')
              and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return 'Erro 4009 "notificar tim", tabela atualizada';
    }

    private function resolve6000()
    {
        return 'erro no deadlock';
    }

    private function resolve10446()
    {
        DB::update(
            "update solicitacao_provisioning set status = 'executar' 
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro')
              and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return 'Erro 10446 "erro no batchjob", tabela atualizada';
    }

    private function resolve11000()
    {
        DB::update(
            "update solicitacao_provisioning set status = 'executar' 
            where id_solicitacao_provisioning in (
            select id_solicitacao_provisioning 
            from solicitacao_provisioning 
            where status = 'concluido_com_erro')
              and id_solicitacao_detalhe in ( 
            select id_solicitacao_detalhe from solicitacao_detalhe where id_solicitacao = $this->id_solicitacao)"
        );
        return 'Erro 11000 "NOT ACCEPTED COMMAND RESTRICTED DURING DUMP", tabela atualizada';
    }

    private function resolve311014()
    {
        return 'Necessario verificação humana... por enquanto';
    }

    private function resolve312014()
    {
        return 'incluir :COPYHLR,1 no final do comando de CREATE.';
    }

    private function getImsi(){
        return DB::table('solicitacao_provisioning')
                    ->select('imsi')
                    ->where('id_solicitacao_provisioning', '=', $this->id_solicitacao)
                    ->get();
    }

    public function resolveTest()
    {
        return 'resolvendo';
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
