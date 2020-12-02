<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Services\Query;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class solutionTest extends TestCase
{

    public function testGetError()
    {
        $test = new Query('test',123123123);
        $resultado = $test->resolveTudo();
        $this->assertEquals('resolvendo', $resultado);
    }
/*
    public function testList()
    {
        var_dump(DB::select(
            "select operacao_gsim, operacao_ericsson, retorno, count(*) 
            from solicitacao_provisioning, 
                (select id, codigo_retorno retorno from solicitacao_provisioning_log, 
                (select id_solicitacao_provisioning id, max(id_solicitacao_provisioning_log) idlog
                from solicitacao_provisioning_log 
                where id_solicitacao_provisioning in (select id_solicitacao_provisioning from vw_gsim_solicitacao_provisioning where status = 'concluido_com_erro' )
                group by id_solicitacao_provisioning
                order by id_solicitacao_provisioning, max(id_solicitacao_provisioning_log)) logs
                where id_solicitacao_provisioning = id and id_solicitacao_provisioning_log = idlog) bla
            where id_solicitacao_provisioning = id
            group by operacao_gsim, operacao_ericsson, retorno"
        ));
    }
*/
}
