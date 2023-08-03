<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    
    protected $table = 'estados';

    protected $fillable = ['pais_id', 'nome'];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
    public function funcionario(){
        return $this->hasMany(Funcionario::class);
    }
    public function cidade(){
        return $this->hasMany(Cidade::class);
    }
}
