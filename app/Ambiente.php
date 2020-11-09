<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{

    protected $fillable = [
        'nome','termodeuso','status','tipoambiente'
    ];
    
    public function scopeInfo($query){
        return $query->select('*');
    }

    public function agendamento() {
        return $this->hasMany(Agendamento::class);
    }

    public function tipoAmbiente(){
        return $this->belongsTo(TipoAmbiente::class, 'tipoambiente');
    }
}