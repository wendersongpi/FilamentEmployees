<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'nome',
    ];
    public function funcionario(){

        return $this->hasMany(Funcionario::class);    
    }
    public function estado(){

        return $this->hasMany(Estado::class);    
    }
}
