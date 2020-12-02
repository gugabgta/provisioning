<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class dbConnectionTest extends TestCase
{
    public $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:cai3="http://schemas.ericsson.com/cai3g1.2/" xmlns:ns="http://schemas.ericsson.com/ema/UserProvisioning/TIMHSSEPS/1.0/"><soapenv:Header><cai3:SequenceId/><cai3:TransactionId/><cai3:SessionId>%s</cai3:SessionId></soapenv:Header><soapenv:Body><cai3:Create><cai3:MOType>TIMHSSEPS@http://schemas.ericsson.com/ema/UserProvisioning/TIMHSSEPS/1.0/</cai3:MOType><cai3:MOId><ns:msisdn>5519953280507</ns:msisdn><ns:imsi>724549000050957</ns:imsi></cai3:MOId><cai3:MOAttributes><ns:createSubscription imsi="724549000050957" msisdn="5519953280507"><ns:msisdn>5519953280507</ns:msisdn><ns:imsi>724549000050957</ns:imsi><ns:hssEps><ns:msisdn>5519953280507</ns:msisdn><ns:imsi>724549000050957</ns:imsi><ns:epsIndividualDefaultContextId>1</ns:epsIndividualDefaultContextId><ns:epsIndividualContextId>1</ns:epsIndividualContextId><ns:epsIndividualContextId>496,DEF</ns:epsIndividualContextId></ns:hssEps><ns:copyHlr>1</ns:copyHlr></ns:createSubscription></cai3:MOAttributes></cai3:Create></soapenv:Body></soapenv:Envelope>';

    public function testCreate()
    {
        $this->assertEquals(DB::table('solicitacao_provisioning')->insert([
            'id_solicitacao_provisioning' => '2349768', 
            'id_solicitacao_detalhe' => 0,
            'operacao_gsim' => 'migracao_tim',
            'operacao_ericsson' => 'hss_create',
            'status' => 'finalizado',
            'dt_criacao' => new \DateTimeImmutable('now'),
            'dt_agendamento' => new \DateTimeImmutable('+10 days'),
            'dt_cancelamento' => null,
            'id_simcard_vinculo' => 2349768,
            'msisdn' => 5519953286969,
            //'ismi' => 724549000056969,
            'xml_envio' => $this->xml,
            'dt_conclusao' => new \DateTimeImmutable('+20 days'),
            'id_simcard' => 2349768
        ]),1);
    }

    public function testRead()
    {
    
        $this->assertDatabaseHas('solicitacao_provisioning',[
            'id_solicitacao_provisioning' => '2349768'
            ]);

    }
/*
    public function testUpdate()
    {
        $this->assertEquals(DB::table('solicitacao_provisioning')
        ->where('id_solicitacao_provisioning', '2349768')
        ->update(['operacao_gsim' => 'apagar_em_breve']),1);
    }

    public function testDelete()
    {
        $this->assertEquals(DB::table('solicitacao_provisioning')->where(
            'id_solicitacao_provisioning', '=', '2349768')->delete(),1);
    }
*/

}
