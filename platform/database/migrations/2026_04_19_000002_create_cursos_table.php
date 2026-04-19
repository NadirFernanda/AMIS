<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->string('nivel');           // Básico | Intermédio | Avançado
            $table->string('duracao');         // "2 meses"
            $table->string('modalidade');      // Online | Presencial | Online / Presencial
            $table->string('preco_usd');       // "$2,000"
            $table->string('preco_aoa');       // "AKZ 1,600,000"
            $table->string('cor')->default('#1a3a5c');
            $table->json('topicos')->nullable();
            $table->boolean('ativo')->default(true);
            $table->unsignedSmallInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
