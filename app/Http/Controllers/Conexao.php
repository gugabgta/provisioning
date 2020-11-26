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
        return view('conexao',);
    }

    public function decode(Request $request)
    {
        $problema = $_GET['textarea'];
        $idProvisioning = $_GET['idProvisioning'];

        $decode = new XmlDecoder();
        $respCode = $decode->getElement($problema,'respCode');


        $total = new Query($respCode, $idProvisioning);
        $total = $total->resolveTudo();

        return view('decode',compact('total','idProvisioning'));
    }
}
