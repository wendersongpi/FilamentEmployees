<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado_id',
        'nome',        
    ];

    public function estado(){

        return $this->beLongsTo(Estado::class);    
    }
    public function funcionario(){

        return $this->hasMany(Funcionario::class);    
    }
}
