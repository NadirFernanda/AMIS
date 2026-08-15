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
        Schema::table('mensagens', function (Blueprint $table) {
            $table->foreignId('fornecedor_id')->nullable()->after('empresa')
                  ->constrained('fornecedores')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mensagens', function (Blueprint $table) {
            $table->dropConstrainedForeignId('fornecedor_id');
        });
    }
};
