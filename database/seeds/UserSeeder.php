<?php

use app\Funcao;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use App\Chamado;
=======
use Illuminate\Support\Facades\DB;

>>>>>>> 0febe75bf267acfa0c7d015c64ead81432e8e477
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 10)->create()->each(function ($user) {
        });
        DB::table('users')->insert([
<<<<<<< HEAD
        'user_name' => 'Bertonni',
=======
        'user_name' => 'admin',
>>>>>>> 0febe75bf267acfa0c7d015c64ead81432e8e477
        'user_cpf' => '111111111111',
        'user_telefone' => '999999999',
        'user_siap_matricula' => 'aaa123',
        'user_email' => 'admin@ctic.ifpe',
<<<<<<< HEAD
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '1',
        ]);        
        DB::table('users')->insert([
        'user_name' => 'Usuario',
        'user_cpf' => '22222222222',
        'user_telefone' => '888888888',
        'user_siap_matricula' => 'bbb123',
        'user_email' => 'user@ctic.ifpe',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '2',
        ]);
=======
        'user_password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '1',
        ]);

>>>>>>> 0febe75bf267acfa0c7d015c64ead81432e8e477
    }
    
}