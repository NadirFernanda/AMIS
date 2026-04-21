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
            $table->string('titulo_en', 100)->nullable()->after('titulo');
            $table->string('tagline_en', 255)->nullable()->after('tagline');
            $table->json('features_en')->nullable()->after('features');
        });

        // Pre-populate EN translations for the 3 seeded packages
        $translations = [
            'Básico'     => [
                'titulo_en'   => 'Basic',
                'tagline_en'  => 'Ideal for companies in the initial phase',
                'features_en' => json_encode([
                    'Initial technical diagnosis',
                    'Compliance report',
                    'Simplified risk analysis',
                    '1 technical field visit',
                    'Email support for 30 days',
                ]),
            ],
            'Intermédio' => [
                'titulo_en'   => 'Intermediate',
                'tagline_en'  => 'For expanding operations',
                'features_en' => json_encode([
                    'Everything in Basic',
                    'Detailed mining planning',
                    '3D geological modelling',
                    '3 technical field visits',
                    'Dedicated support for 90 days',
                    'Knowledge transfer workshop',
                ]),
            ],
            'Avançado'   => [
                'titulo_en'   => 'Advanced',
                'tagline_en'  => 'Complete end-to-end solution',
                'features_en' => json_encode([
                    'Everything in Intermediate',
                    'Complete process optimisation',
                    'Installation and commissioning',
                    'Monthly visits for 12 months',
                    'Annual dedicated technical support',
                    'Internal team training',
                    'Annual impact report',
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
            $table->dropColumn(['titulo_en', 'tagline_en', 'features_en']);
        });
    }
};
