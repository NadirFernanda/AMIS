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
            $table->string('titulo_en', 150)->nullable()->after('titulo');
            $table->text('descricao_en')->nullable()->after('descricao');
        });

        // Pre-populate EN translations for the 4 seeded equipment categories
        $translations = [
            'Sondagem e Perfuração'    => [
                'titulo_en'    => 'Drilling & Boring',
                'descricao_en' => 'Core drilling and percussion equipment for geological prospecting.',
            ],
            'Processamento Mineral'    => [
                'titulo_en'    => 'Mineral Processing',
                'descricao_en' => 'Mills, classifiers, flotation cells and complete circuits.',
            ],
            'Monitorização Geotécnica' => [
                'titulo_en'    => 'Geotechnical Monitoring',
                'descricao_en' => 'Sensors, dataloggers and early warning systems for slopes.',
            ],
            'Laboratório Analítico'    => [
                'titulo_en'    => 'Analytical Laboratory',
                'descricao_en' => 'Spectrometers, XRF analysers and characterisation equipment.',
            ],
        ];

        foreach ($translations as $titulo => $data) {
            DB::table('equipamentos')->where('titulo', $titulo)->update($data);
        }
    }

    public function down(): void
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropColumn(['titulo_en', 'descricao_en']);
        });
    }
};
