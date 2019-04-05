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
        DB::table('funcaos')->insert([
        'funcao_name' => 'Administrador'
        ]);

        factory(App\Funcao::class, 6)->create()->each(function ($user) {
		});
    }
}
