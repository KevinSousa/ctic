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
        factory(App\Funcao::class, 6)->create()->each(function ($user) {
		
		});
    }
}
