<?php

use Illuminate\Database\Seeder;
use App\Tipo_problema;
class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sala::class, 2)->create()->each(function ($user) {


		});
    }
}
