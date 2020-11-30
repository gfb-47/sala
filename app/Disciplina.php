<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
        'nome','ativo', 'curso_id'
    ];

    public function scopeInfo($query){
        return $query->select('*');
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}
