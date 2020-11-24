<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class Update
{
    private $id_solicitacao;

    public function __construct($id_solicitacao){

        $this->id_solicitacao = $id_solicitacao;
    }

    public function whatever(){
        $conexao = DB::insert(
        "update solicitacao_provisioning set status = 'concluido_com_sucesso'
        where id_solicitacao_provisioning = $this->id_solicitacao");
        return $this->id_solicitacao;
    }
}