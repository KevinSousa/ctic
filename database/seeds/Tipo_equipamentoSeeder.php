<?php

use Illuminate\Database\Seeder;
use app\Tipo_equipamento;

class Tipo_equipamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tipo_equipamento::class, 0)->create()->each(function ($user) {
            // $user->posts()->save(factory(App\Post::class)->make());
        });
		 DB::table('tipo_equipamentos')->insert([
        'tipo_nome' => 'Computador',
        ]);		 
		 DB::table('tipo_equipamentos')->insert([
        'tipo_nome' => 'Mouse',
        ]);		 
		 DB::table('tipo_equipamentos')->insert([
        'tipo_nome' => 'Teclado',
        ]);
         DB::table('tipo_equipamentos')->insert([
        'tipo_nome' => 'Access Point',
        ]);
        DB::table('tipo_equipamentos')->insert([
        'tipo_nome' => 'Projetor',
        ]);
        DB::table('tipo_equipamentos')->insert([
        'tipo_nome' => 'No break',
        ]);

    }
}
