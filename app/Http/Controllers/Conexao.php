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
    public function decode(Request $request)
    {
        if(!isset($_GET['textarea'])){
            return view('conexao/conexao');
        }

        $xml = $_GET['textarea'];
        $idProvisioning = $_GET['idProvisioning'];

        $decode = new XmlDecoder();
        $respCode = $decode->getElement($xml,'respCode');

        $total = new Query($respCode, $idProvisioning);
        $total = $total->resolveTudo();
        
        return view('conexao/conexao',compact('total','idProvisioning', 'respCode', 'xml'));    
        
    }
}
