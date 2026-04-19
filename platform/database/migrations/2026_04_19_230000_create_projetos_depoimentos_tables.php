<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('local', 100)->nullable();
            $table->enum('tipo', ['consultoria', 'formacao', 'equipamentos'])->default('consultoria');
            $table->text('descricao');
            $table->string('resultado', 250)->nullable(); // key metric
            $table->string('foto', 150)->nullable();
            $table->string('cor', 30)->default('#1a3a5c');
            $table->smallInteger('ordem')->default(0);
            $table->boolean('destaque')->default(false);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });

        Schema::create('depoimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cargo', 100);
            $table->string('empresa', 100);
            $table->text('texto');
            $table->tinyInteger('rating')->default(5);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('depoimentos');
        Schema::dropIfExists('projetos');
    }
};
