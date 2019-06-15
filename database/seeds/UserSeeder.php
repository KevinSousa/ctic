<?php

use Illuminate\Database\Seeder;
use App\Chamado;
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
        'user_name' => 'Bertonni',
        'user_cpf' => '111111111111',
        'user_telefone' => '999999999',
        'user_siap_matricula' => 'aaa123',
        'user_imagem' => 'avatar-01.jpg',
        'user_email' => 'admin@ctic.ifpe',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '1',
        ]);        
        DB::table('users')->insert([
        'user_name' => 'Professor',
        'user_cpf' => '55555555555',
        'user_telefone' => '3333333333',
        'user_siap_matricula' => 'eee123',
        'user_imagem' => 'avatar-01.jpg',
        'user_email' => 'professor@ctic.ifpe',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '2',
        ]);
        DB::table('users')->insert([
        'user_name' => 'Aluno',
        'user_cpf' => '444444444444',
        'user_telefone' => '666666666',
        'user_siap_matricula' => 'ddd123',
        'user_imagem' => 'avatar-01.jpg',
        'user_email' => 'aluno@ctic.ifpe',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '3',
        ]);
        DB::table('users')->insert([
        'user_name' => 'Terceirizado',
        'user_cpf' => '33333333333',
        'user_telefone' => '777777777',
        'user_siap_matricula' => 'ccc123',
        'user_imagem' => 'avatar-01.jpg',
        'user_email' => 'terceirizado@ctic.ifpe',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '4',
        ]);        
        DB::table('users')->insert([
        'user_name' => 'Administrativo',
        'user_cpf' => '22222222222',
        'user_telefone' => '888888888',
        'user_siap_matricula' => 'bbb123',
        'user_imagem' => 'avatar-01.jpg',
        'user_email' => 'administrativo@ctic.ifpe',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'user_funcao'   => '5',
        ]);       
    }
    
}