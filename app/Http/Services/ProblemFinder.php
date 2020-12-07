<?php

namespace App\Http\Services;

use App\Http\Services\XmlDecoder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class ProblemFinder
{
    public function getProblems()
    {
        $problems = DB::select("select id_solicitacao_provisioning, xml_envio from solicitacao_provisioning where status='concluido_com_erro'");
        
        foreach($problems as $index => $problem){
            $problems[$index]->xml_envio = XmlDecoder::getElement($problem->xml_envio,'respCode');
        }
        $string = json_encode($problems);
        return $string;
    }

}