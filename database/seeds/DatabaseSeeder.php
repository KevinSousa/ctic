<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
         $this->call(FuncaoSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(SalaSeeder::class);
         $this->call(Tipo_equipamentoSeeder::class);
         $this->call(EquipamentoSeeder::class);
         $this->call(ChamadoSeeder::class);
         $this->call(Tipo_problemaSeeder::class);
    }
}
