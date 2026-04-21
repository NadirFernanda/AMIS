<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('estatisticas', function (Blueprint $table) {
            $table->string('descricao_en')->nullable()->after('descricao');
            $table->string('descricao_fr')->nullable()->after('descricao_en');
        });

        $translations = [
            'Projectos Concluídos'   => ['en' => 'Completed Projects',      'fr' => 'Projets Réalisés'],
            'Cursos Certificados'    => ['en' => 'Certified Courses',        'fr' => 'Cours Certifiés'],
            'Profissionais Formados' => ['en' => 'Trained Professionals',    'fr' => 'Professionnels Formés'],
            'Países de Atuação'      => ['en' => 'Countries of Operation',   'fr' => 'Pays d\'Opération'],
        ];

        foreach ($translations as $descricaoPt => $trans) {
            DB::table('estatisticas')->where('descricao', $descricaoPt)->update([
                'descricao_en' => $trans['en'],
                'descricao_fr' => $trans['fr'],
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('estatisticas', function (Blueprint $table) {
            $table->dropColumn(['descricao_en', 'descricao_fr']);
        });
    }
};
