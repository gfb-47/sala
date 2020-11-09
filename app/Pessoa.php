<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome','telefone','matricula','cpf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
