<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('consultorias', function (Blueprint $table) {
            $table->string('titulo_fr', 100)->nullable()->after('titulo_en');
            $table->string('tagline_fr', 255)->nullable()->after('tagline_en');
            $table->json('features_fr')->nullable()->after('features_en');
        });

        $translations = [
            'Básico'     => [
                'titulo_fr'   => 'Basique',
                'tagline_fr'  => 'Idéal pour les entreprises en phase initiale',
                'features_fr' => json_encode([
                    'Diagnostic technique initial',
                    'Rapport de conformité',
                    'Analyse des risques simplifiée',
                    '1 visite technique sur le terrain',
                    'Support par email 30 jours',
                ]),
            ],
            'Intermédio' => [
                'titulo_fr'   => 'Intermédiaire',
                'tagline_fr'  => 'Pour les opérations en expansion',
                'features_fr' => json_encode([
                    'Tout du Basique',
                    'Planification minière détaillée',
                    'Modélisation géologique 3D',
                    '3 visites techniques sur le terrain',
                    'Support dédié 90 jours',
                    'Atelier de transfert de connaissances',
                ]),
            ],
            'Avançado'   => [
                'titulo_fr'   => 'Avancé',
                'tagline_fr'  => 'Solution complète de bout en bout',
                'features_fr' => json_encode([
                    'Tout de l\'Intermédiaire',
                    'Optimisation complète des processus',
                    'Installation et mise en service',
                    'Visites mensuelles pendant 12 mois',
                    'Support technique dédié annuel',
                    'Formation de l\'équipe interne',
                    'Rapport d\'impact annuel',
                ]),
            ],
        ];

        foreach ($translations as $titulo => $data) {
            DB::table('consultorias')->where('titulo', $titulo)->update($data);
        }
    }

    public function down(): void
    {
        Schema::table('consultorias', function (Blueprint $table) {
            $table->dropColumn(['titulo_fr', 'tagline_fr', 'features_fr']);
        });
    }
};
