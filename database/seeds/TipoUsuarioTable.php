<?php

use Illuminate\Database\Seeder;
use App\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUsuario::create([
            'nome' => 'Administrador(a)',          
        ]);

        TipoUsuario::create([
            'nome' => 'Aluno(a)',          
        ]);

        TipoUsuario::create([
            'nome' => 'Colaborador(a)',          
        ]);

        TipoUsuario::create([
            'nome' => 'Professor(a)',          
        ]);
    }
}
