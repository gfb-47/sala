<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    
    protected $fillable = [
        'nome',
    ];

    public function scopeInfo($query){
        return $query->select('*');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
