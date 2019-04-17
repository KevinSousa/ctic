<?php

use Illuminate\Database\Seeder;
use app\SublistaTipoProblema;

class SublistaTipoProblemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SublistaTipoProblema::class, 5)->create()->each(function ($user) {
        
        });
    }
}
