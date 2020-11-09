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
            'nome' => 'Administrador',          
        ]);

        TipoUsuario::create([
            'nome' => 'Aluno',          
        ]);

        TipoUsuario::create([
            'nome' => 'Colaborador',          
        ]);

        TipoUsuario::create([
            'nome' => 'Professor',          
        ]);
    }
}
