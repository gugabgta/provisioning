<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Update;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class Conexao extends Controller
{
    public function whatever(Request $request){
        $id = $request->id_solicitacao;
        $whatever = new Update($id);
        $teste = $whatever->whatever();
        return view('conexao',compact('teste'));
    }
    /*
    public function model(){
        $conexao = new SolicitacaoProvisioning();
        /*$conexao->id_solicitacao_provisioning = 1;
        $conexao->save();
        return view('conexao', compact('conexao'));
    }
    */
}
