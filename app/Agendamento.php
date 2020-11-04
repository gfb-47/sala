<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'data','horarioinicio','horariofim','situacao','professorresponsavel','ambiente','user','curso','disciplina','motivoutilizacao','observacao'
    ];
    public function scopeInfo($query){
        return $query->select('*');
    }

    public function ambientes() {
        return $this->belongsTo(Ambiente::class, 'ambiente');
    }
    public function motivos() {
        return $this->belongsTo(MotivoUtilizacao::class, 'motivoutilizacao');
    }
    public function allStatus() {
        return [
            1=> 'Pendente', 'Confirmado', 'Cancelado', 'Finalizado'
        ];
    }
    public function getSituacao() {
        return $this->allStatus()[$this->situacao];
    }
}
