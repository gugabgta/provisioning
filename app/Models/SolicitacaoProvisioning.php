<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoProvisioning extends Model
{
    protected $table = 'solicitacao_provisioning';
    const CREATED_AT = 'dt_criacao';
    public $timestamps = true;
    protected $fillable = [
       'operacao_gsim',
       'operacao_eriscsson',
       'status',
       'msisdn',
       'imsi',
       'xml_envio',
    ];

    /*public function solicitacao_detalhe(){
        $this->hasMany;
    }

    public function simcard_vinculo(){

    }*/
}
