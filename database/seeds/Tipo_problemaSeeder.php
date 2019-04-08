<?php

use Illuminate\Database\Seeder;
use App\Tipo_problema;
class Tipo_problemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 factory(App\Tipo_problema::class, 1)->create()->each(function ($user) {
		
		});
    }
}
