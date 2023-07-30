<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pais_id')->constrained()->cascadeOnDelete();
            $table->foreignId('estado_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cidade_id')->constrained()->cascadeOnDelete();
            $table->foreignId('departamento_id')->constrained()->cascadeOnDelete();
            $table->string('primeiro_nome');
            $table->string('ultimo_nome');
            $table->string('endereco');
            $table->char('cep');
            $table->date('data_de_nascimento');
            $table->date('data_de_contratacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
