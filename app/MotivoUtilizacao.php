<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoUtilizacao extends Model
{
    protected $fillable = [
        'motivo',
    ];

    public function scopeInfo($query){
        return $query->select('*');
    }
}
