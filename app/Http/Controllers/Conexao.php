<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Query;
use App\Http\Services\XmlDecoder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class Conexao extends Controller
{
    public function view(Request $request){
        $id = $request->id_solicitacao;
        $whatever = new Query();
        return view('conexao',);
    }

    public function decode(Request $request)
    {
        $textarea = $_GET['textarea'];
        $decode = new XmlDecoder();
        $respCode = $decode->getRespcode($textarea);
        $total = new Query();
        $total = $total->resolve1001('724031218049725');
        /*
        passo2();
        passo3();
        passo4();
        passo5();
        passo6();
        passo7();
        */
        return view('decode',compact('total'));
    }
}
