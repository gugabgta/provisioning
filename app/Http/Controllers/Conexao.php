<?php

namespace App\Http\Controllers;

use App\Http\Services\Query;
use Illuminate\Http\Request;
use App\Http\Services\Select;
use App\Http\Services\XmlDecoder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class Conexao extends Controller
{
    public function view()
    {
        return view('conexao/conexao');
    }

    public function decode(Request $request)
    {
        $columns = array('id_solicitacao_provisioning', 'xml_envio', 'operacao_gsim');
        $problems = new Select($columns);
        $problems = $problems->getProblems();
        sleep(rand(1,3));
        return $problems;
    }

    public function resolve(Request $request){
        $requestBody = $_POST['body'];
        $problema = $requestBody['problema'];
        $id = $requestBody['idSolicitacao'];
        $solver = new Query($problema, $id);
        $msg = $solver->resolveTudo();
        
        return $msg;
    }
}
