<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome','telefone','matricula'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
