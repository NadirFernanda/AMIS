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
            $table->string('foto', 150)->nullable()->after('slug');
        });

        DB::table('equipa')->where('slug', 'puto-luis')->update([
            'foto' => 'fundador-puto-luis.jpeg',
        ]);

        DB::table('equipa')->where('slug', 'fernanda-goncalves')->update([
            'foto' => 'fundadora-fernanda-goncalves.png',
        ]);
    }

    public function down(): void
    {
        Schema::table('equipa', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
