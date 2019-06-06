<?php

use Illuminate\Database\Seeder;
use app\SublistaTipoProblema;

class SublistaTipoProblemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\SublistaTipoProblema::class, 5)->create()->each(function ($user) {
        // });

        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 1,
            'sub_nome' => 'Hd',
        ]);  
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 1,
            'sub_nome' => 'Formatação',
        ]); 
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 1,
            'sub_nome' => 'Memória',
        ]);  
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 2,
            'sub_nome' => 'Problema ao ligar',
        ]);  
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 2,
            'sub_nome' => 'Vírus',
        ]);  
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 2,
            'sub_nome' => 'Reinstalação de Programas',
        ]);  
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 2,
            'sub_nome' => 'Reinstalação do Sistema Operacional',
        ]);  
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 3,
            'sub_nome' => 'Problema de conexão',
        ]); 
        DB::table('sublista_tipo_problemas')->insert([
            'sub_probl' => 3,
            'sub_nome' => 'Rede Indisponível',
        ]); 

    }
}
