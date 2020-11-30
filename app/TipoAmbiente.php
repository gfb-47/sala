<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAmbiente extends Model
{
    
    protected $fillable = [
        'nome','ativo','status'
    ];
    
    public function scopeInfo($query){
        return $query->select('*');
    }
    
    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class);
    }
}
