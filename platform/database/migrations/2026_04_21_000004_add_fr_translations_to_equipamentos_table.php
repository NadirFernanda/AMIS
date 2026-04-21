<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->string('titulo_fr', 150)->nullable()->after('titulo_en');
            $table->text('descricao_fr')->nullable()->after('descricao_en');
        });

        $translations = [
            'Sondagem e Perfuração'    => [
                'titulo_fr'    => 'Forage et Perforation',
                'descricao_fr' => 'Équipements de carottage et de percussion pour la prospection géologique.',
            ],
            'Processamento Mineral'    => [
                'titulo_fr'    => 'Traitement Minéral',
                'descricao_fr' => 'Broyeurs, classificateurs, cellules de flottation et circuits complets.',
            ],
            'Monitorização Geotécnica' => [
                'titulo_fr'    => 'Surveillance Géotechnique',
                'descricao_fr' => 'Capteurs, enregistreurs de données et systèmes d\'alerte précoce pour les pentes.',
            ],
            'Laboratório Analítico'    => [
                'titulo_fr'    => 'Laboratoire Analytique',
                'descricao_fr' => 'Spectromètres, analyseurs XRF et équipements de caractérisation.',
            ],
        ];

        foreach ($translations as $titulo => $data) {
            DB::table('equipamentos')->where('titulo', $titulo)->update($data);
        }
    }

    public function down(): void
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropColumn(['titulo_fr', 'descricao_fr']);
        });
    }
};
