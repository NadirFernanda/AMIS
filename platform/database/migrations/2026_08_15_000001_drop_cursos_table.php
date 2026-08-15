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
        Schema::dropIfExists('cursos');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->text('descricao');
            $table->string('nivel', 50);
            $table->string('duracao', 50);
            $table->string('modalidade', 100);
            $table->string('preco_usd', 30);
            $table->string('preco_aoa', 50);
            $table->string('cor', 30);
            $table->json('topicos')->nullable();
            $table->boolean('ativo')->default(true);
            $table->boolean('destaque')->default(false);
            $table->smallInteger('ordem')->default(0);
            $table->timestamps();
        });
    }
};
