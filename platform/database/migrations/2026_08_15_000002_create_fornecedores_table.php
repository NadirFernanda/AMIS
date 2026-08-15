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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome_empresa', 150);
            $table->string('pais', 100);
            $table->string('cidade', 100)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('telefone', 50)->nullable();
            $table->text('descricao');
            $table->text('descricao_en')->nullable();
            $table->text('descricao_fr')->nullable();
            $table->string('cor', 30)->default('#1a3a5c');
            $table->smallInteger('ordem')->default(0);
            $table->boolean('ativo')->default(true);
            $table->boolean('destaque')->default(false);
            $table->timestamps();
        });

        Schema::create('equipamento_fornecedor', function (Blueprint $table) {
            $table->foreignId('fornecedor_id')->constrained('fornecedores')->cascadeOnDelete();
            $table->foreignId('equipamento_id')->constrained('equipamentos')->cascadeOnDelete();
            $table->primary(['fornecedor_id', 'equipamento_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamento_fornecedor');
        Schema::dropIfExists('fornecedores');
    }
};
