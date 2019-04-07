<?php

use Illuminate\Database\Seeder;
use App\Chamado;
class ChamadoSeeder extends Seeder
{
	 public function run()
    {
        //
        factory(App\Chamado::class, 5)->create()->each(function ($chamado) {
            // $user->posts()->save(factory(App\Post::class)->make());
        });
    }

}	