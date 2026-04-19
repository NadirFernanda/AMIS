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
        Schema::create('equipa', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('cargo', 100);
            $table->string('especializacao', 100)->nullable();
            $table->text('bio');
            $table->json('tags')->nullable();
            $table->string('cor', 30)->default('#1a3a5c');
            $table->smallInteger('ordem')->default(0);
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipa');
    }
};
