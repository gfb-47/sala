<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function scopeInfo($query){
        return $query->select('*');
    }
}
