<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'name',        
    ];

    public function estado(){

        return $this->beLongsTo(Estado::class);    
    }
    public function funcionario(){

        return $this->hasMany(Funcionario::class);    
    }
}
