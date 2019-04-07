<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
         $this->call(FuncaoSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(SalaSeeder::class);
         $this->call(ChamadoSeeder::class);
         $this->call(EquipamentoSeeder::class);
         $this->call(ChamadoSeeder::class);

    }
}
