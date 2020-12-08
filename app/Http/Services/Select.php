<?php

namespace App\Http\Services;

use App\Http\Services\XmlDecoder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SolicitacaoProvisioning;

class Select
{
    protected $column;

    public function __construct($column)
    {
        $this->column = $column;
    }
    
    public function getProblems()
    {
        $problems = DB::select("select " . $this->arrayToString() . " from solicitacao_provisioning where status='concluido_com_erro'");
        //$problems = DB::select("select id_solicitacao_provisioning, xml_envio from solicitacao_provisioning where status='concluido_com_erro'");
        foreach($problems as $index => $problem){
            $problems[$index]->xml_envio = XmlDecoder::getElement($problem->xml_envio,'respCode');
        }

        $string = json_encode($problems);
        return $string;
    }

    private function arrayToString(){
        return implode(',',$this->column);
    }
}
