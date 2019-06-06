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
$number = 6;
        for ($i=1; $i < $number; $i++) {
            DB::table('salas')->insert([ 
                'sala_identificacao' => $i,
                'sala_andar' => 'BLOCO A',
            ]);
        }
        for ($i=1; $i < $number; $i++) { 
            DB::table('salas')->insert([ 
                'sala_identificacao' => $i,
                'sala_andar' => 'BLOCO B',
            ]);
        }
        for ($i=1; $i < $number; $i++) { 
            DB::table('salas')->insert([ 
                'sala_identificacao' => $i,
                'sala_andar' => 'BLOCO C',
            ]);
        }

		// });
    }
}
