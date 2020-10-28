<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'data','horarioinicio','horariofim','situacao','professorresponsavel','ambiente','user','curso','disciplina','motivoutilizacao','observacao'
    ];
}
