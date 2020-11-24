<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Agendamento extends Model
{

    use Filterable;
    
    protected $fillable = [
        'data','horainicio','horafim','situacao','professorresponsavel','ambiente','user','disciplina','motivoutilizacao','observacao'
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

    public function disciplinas() {
        return $this->belongsTo(Disciplina::class, 'disciplina');
    }

    public function professores() {
        return $this->belongsTo(Pessoa::class, 'professorresponsavel');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user');
    }

    public function allStatus() {
        return [
            1=> 'Pendente', 'Confirmado', 'Cancelado', 'Finalizado'
        ];
    }
    public function getSituacao() {
        return $this->allStatus()[$this->situacao];
    }

    public function modelFilter()
    {
        return $this->provideFilter(ModelFilters\AgendamentosFilter::class);
    }
}
