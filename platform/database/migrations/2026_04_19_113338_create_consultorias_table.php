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
        Schema::create('consultorias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->string('tagline', 255);
            $table->text('descricao')->nullable();
            $table->string('preco_usd', 30);
            $table->string('preco_aoa', 50);
            $table->string('cor', 30)->default('#1a3a5c');
            $table->boolean('destaque')->default(false);
            $table->json('features');
            $table->boolean('ativo')->default(true);
            $table->smallInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultorias');
    }
};
