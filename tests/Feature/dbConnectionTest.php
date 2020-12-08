<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class dbConnectionTest extends TestCase
{
    public $xml1001 = 'b"<?xml version=\"1.0\" encoding=\"UTF-8\"?><S:Envelope xmlns:S="a"><ema:a xmlns:ema="a"><ema:respCode>1001</ema:respCode></ema:a></S:Envelope>"';
    public $xml1002 = 'b"<?xml version=\"1.0\" encoding=\"UTF-8\"?><S:Envelope xmlns:S="a"><ema:a xmlns:ema="a"><ema:respCode>1002</ema:respCode></ema:a></S:Envelope>"';
    public $xml13 = 'b"<?xml version=\"1.0\" encoding=\"UTF-8\"?><S:Envelope xmlns:S="a"><ema:a xmlns:ema="a"><ema:respCode>13</ema:respCode></ema:a></S:Envelope>"';
    public $xml14 = 'b"<?xml version=\"1.0\" encoding=\"UTF-8\"?><S:Envelope xmlns:S="a"><ema:a xmlns:ema="a"><ema:respCode>14</ema:respCode></ema:a></S:Envelope>"';

    public function testCreate()
    {
        $this->assertEquals(DB::table('solicitacao_provisioning')->insert([
            'id_solicitacao_provisioning' => '2349768', 
            'id_solicitacao_detalhe' => 0,
            'operacao_gsim' => 'migracao_tim',
            'operacao_ericsson' => 'hss_create',
            'status' => 'concluido_com_erro',
            'dt_criacao' => new \DateTimeImmutable('now'),
            'dt_agendamento' => new \DateTimeImmutable('+10 days'),
            'dt_cancelamento' => null,
            'id_simcard_vinculo' => 2349768,
            'msisdn' => 5519953286969,
            //'ismi' => 724549000056969,
            'xml_envio' => $this->xml14,
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


}
