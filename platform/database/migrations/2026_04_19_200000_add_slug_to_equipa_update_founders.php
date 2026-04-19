<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('equipa', function (Blueprint $table) {
            $table->string('slug', 100)->nullable()->after('nome');
        });

        // Update Engº Puto Luís
        DB::table('equipa')->where('nome', 'like', '%Puto%')->update([
            'slug'  => 'puto-luis',
            'cargo' => 'Co-Fundador',
        ]);

        // Update Fernanda: fix surname + cargo
        DB::table('equipa')->where('nome', 'like', '%Fernanda%')->update([
            'nome'  => 'Engª Fernanda Gonçalves',
            'slug'  => 'fernanda-goncalves',
            'cargo' => 'Co-Fundadora',
        ]);
    }

    public function down(): void
    {
        DB::table('equipa')->where('slug', 'puto-luis')->update(['cargo' => 'CEO & Co-Fundador']);
        DB::table('equipa')->where('slug', 'fernanda-goncalves')->update([
            'nome'  => 'Engª Fernanda Amorim',
            'cargo' => 'COO & Co-Fundadora',
        ]);

        Schema::table('equipa', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
