<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo','contudo','user_id','imagem'
    ];
    
    public function scopeInfo($query){
        return $query->select('*');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
