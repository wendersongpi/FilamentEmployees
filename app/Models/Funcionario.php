<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'primeiro_nome',
        'ultimo_nome',
        'endereco',
        'cidade_id',
        'estado_id',
        'pais_id',
        'departamento_id',
        'cep',
        'data_de_nascimento',
        'data_de_contratacao',
    ];

    public function pais(){

        return $this->belongsTo(Pais::class);    
    }
    public function estado(){

        return $this->belongsTo(Estado::class);    
    }
    public function cidade(){

        return $this->belongsTo(Cidade::class);    
    }
    public function departamento(){

        return $this->belongsTo(Departamento::class);    
    }
}
