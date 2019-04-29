<?php

use App\Funcao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        factory(App\Funcao::class, 0)->create()->each(function ($user) {
=======
        DB::table('funcaos')->insert([
        'funcao_name' => 'Administrador'
        ]);

        factory(App\Funcao::class, 6)->create()->each(function ($user) {
>>>>>>> 0febe75bf267acfa0c7d015c64ead81432e8e477
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
