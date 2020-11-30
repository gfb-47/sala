<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoUtilizacao extends Model
{

    protected $table = 'motivos_utilizacao';

    protected $fillable = [
        'motivo','ativo'
    ];

    public function scopeInfo($query){
        return $query->select('*');
    }
}
