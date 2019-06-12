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
        // factory(App\Sala::class, 1)->create()->each(function ($user) {
            DB::table('salas')->insert([ 
                'sala_identificacao' => 2,
                'sala_andar' => 'BLOCO B',
            ]);           
            DB::table('salas')->insert([ 
                'sala_identificacao' => 10,
                'sala_andar' => 'BLOCO B',
            ]);
		// });
    }
}
