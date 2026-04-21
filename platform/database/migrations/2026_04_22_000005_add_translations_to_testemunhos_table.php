<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testemunhos', function (Blueprint $table) {
            $table->string('cargo_en', 100)->nullable()->after('cargo');
            $table->string('cargo_fr', 100)->nullable()->after('cargo_en');
            $table->text('texto_en')->nullable()->after('texto');
            $table->text('texto_fr')->nullable()->after('texto_en');
        });
    }

    public function down(): void
    {
        Schema::table('testemunhos', function (Blueprint $table) {
            $table->dropColumn(['cargo_en', 'cargo_fr', 'texto_en', 'texto_fr']);
        });
    }
};
