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
        DB::table('equipamentos')->insert([
        'equip_tipo' => 1,
        'equip_marca' => 'Hp',
        'equip_tombamento' => 9543154,
        ]);
        DB::table('equipamentos')->insert([
        'equip_tipo' => 1,
        'equip_marca' => 'Samsung',
        'equip_tombamento' => 0,
        ]);
    }
}
