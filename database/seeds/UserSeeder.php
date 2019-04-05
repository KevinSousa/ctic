<?php

use app\Funcao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            // $user->posts()->save(factory(App\Post::class)->make());
        });
        DB::table('users')->insert([
        'user_name' => 'admin',
        'user_cpf' => '111111111111',
        'user_telefone' => '999999999',
        'user_siap_matricula' => 'aaa123',
        'user_email' => 'admin@ctic.ifpe',
        'user_password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '1',
        ]);

    }
}