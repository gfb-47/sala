<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            array('name' => 'ambiente_view', 'description' => 'Visualiza as ambientes'),
            array('name' => 'ambiente_create', 'description' => 'Cria novo ambiente'),
            array('name' => 'ambiente_edit', 'description' => 'Edita ambientes'),
            array('name' => 'ambiente_inactive', 'description' => 'Inativa ambientes'),
           
            array('name' => 'disciplina_view', 'description' => 'Visualiza disciplina'),
            array('name' => 'disciplina_create', 'description' => 'Cria disciplina'),
            array('name' => 'disciplina_edit', 'description' => 'Edita disciplina'),
            array('name' => 'disciplina_inactive', 'description' => 'Inativa disciplina'),

            array('name' => 'curso_view', 'description' => 'Visualiza curso'),
            array('name' => 'curso_create', 'description' => 'Cria curso'),
            array('name' => 'curso_edit', 'description' => 'Edita curso'),
            array('name' => 'curso_inactive', 'description' => 'Inativa curso'),

            array('name' => 'noticia_view', 'description' => 'Visualiza noticia'),
            array('name' => 'noticia_create', 'description' => 'Cria noticia'),
            array('name' => 'noticia_edit', 'description' => 'Edita noticia'),
            array('name' => 'noticia_delete', 'description' => 'Deleta noticia'),

            array('name' => 'usuario_view', 'description' => 'Visualiza usuario'),
            array('name' => 'usuario_create', 'description' => 'Cria usuario'),
            array('name' => 'usuario_edit', 'description' => 'Edita usuario'),
            array('name' => 'usuario_inactive', 'description' => 'Inativa usuario'),

            array('name' => 'motivo_view', 'description' => 'Visualiza motivo'),
            array('name' => 'motivo_create', 'description' => 'Cria motivo'),
            array('name' => 'motivo_edit', 'description' => 'Edita motivo'),
            array('name' => 'motivo_inactive', 'description' => 'Inativa motivo'),
            
            array('name' => 'adminagendamento_view', 'description' => 'Visualiza Agendamentos admin'),
            array('name' => 'adminagendamento_confirm', 'description' => 'Confirma Agendamentos admin'),
            array('name' => 'professor_pdf', 'description' => 'Visualiza Pdfs professor'),
            array('name' => 'geral_pdf', 'description' => 'Visualiza Pdfs geral'),
            
            array('name' => 'tipousuario_view', 'description' => 'Visualiza Tipo Usuario'),
            array('name' => 'tipousuario_edit', 'description' => 'Edita Tipo Usuario'),

            array('name' => 'confirmaragendamento_view', 'description' => 'Tela de Confirmação de Agendamento'),
            array('name' => 'professor_view', 'description' => 'Tela de geração de relatorio professor admin'),
            array('name' => 'geral_view', 'description' => 'Tela de geração de relatorio geral'),

            array('name' => 'tipoambiente_view', 'description' => 'Visualiza tipo ambiente'),
            array('name' => 'tipoambiente_create', 'description' => 'Cria tipo ambiente'),
            array('name' => 'tipoambiente_edit', 'description' => 'Edita tipo ambiente'),
            array('name' => 'tipoambiente_inactive', 'description' => 'Inactive Tipo ambiente'),

            array('name' => 'relatorioprofessor_user', 'description' => 'Relatório professor index'),
            array('name' => 'relatorioaluno_user', 'description' => 'Relatório aluno index'),
        ];
    }

}