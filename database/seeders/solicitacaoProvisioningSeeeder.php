<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\solicitacao_provisioning;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('solicitacao_provisioning')->insert([
            'id_solicitacao_detalhe' => Str::random(10),
            'operacao_gsim' => Str::random(10).'@gmail.com',
            'operacao_ericsson' => Hash::make('password'),
        ]);
        
    }
}

/*
'id_solicitacao_provisioning',
        'id_solicitacao_detalhe',
        'operacao_gsim',
        'operacao_ericsson',
        'status',
        'id_simcard_vinculo',
        'msisdn',
        'imsi',
        'xml_envio',
        'id_simcard'*/