<?php

use Illuminate\Database\Seeder;
use app\Equipamento;

class EquipamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Equipamento::class, 15)->create()->each(function ($user) {
		
		});
    }
}
