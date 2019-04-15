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
    	 factory(App\Tipo_problema::class, 0)->create()->each(function ($user) {
		
		});
         DB::table('tipo_problemas')->insert([
        'probl_tipo' => 'Hardware',
        ]);      
         DB::table('tipo_problemas')->insert([
        'probl_tipo' => 'Software',
        ]);      
         DB::table('tipo_problemas')->insert([
        'probl_tipo' => 'Rede',
        ]);
    }
}
