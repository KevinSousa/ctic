<?php

use Illuminate\Database\Seeder;
use App\Funcao;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Funcao::class, 0)->create()->each(function ($user) {
		});
        DB::table('funcaos')->insert([
        'funcao_name' => 'Administrador',
        ]);      
         DB::table('funcaos')->insert([
        'funcao_name' => 'Professor',
        ]);      
         DB::table('funcaos')->insert([
        'funcao_name' => 'Aluno',
        ]);
         DB::table('funcaos')->insert([
        'funcao_name' => 'Terceirizado',
        ]);
         DB::table('funcaos')->insert([
        'funcao_name' => 'Administrativo',
        ]);
    }
}
