<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(FuncaoSeeder::class);
         $this->call(UsersSeeder::class);
         $this->call(SalaSeeder::class);
         $this->call(EquipamentoSeeder::class);
    }
}
