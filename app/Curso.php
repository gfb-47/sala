<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome','ativo'
    ];

    public function scopeInfo($query){
        return $query->select('*');
    }
}
