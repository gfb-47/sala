<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pessoa;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pessoa = Pessoa::create([
            'nome' => 'Unitins',
            'telefone' => '(00) 00000-0000',
            'matricula' => '2000010100000000'
        ]);

        User::create([
            'name' => 'Unitins',
            'email' => 'email@unitins.com.br',
            'password' => bcrypt('unitins2020'),
            'cpf' => '000.000.000-00',
            'pessoa_id' => $pessoa->id,
            'tipo_usuario' => 1
        ]);
    }
}
