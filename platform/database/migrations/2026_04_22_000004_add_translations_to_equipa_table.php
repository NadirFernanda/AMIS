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
            $table->string('cargo_en')->nullable()->after('cargo');
            $table->string('cargo_fr')->nullable()->after('cargo_en');
            $table->string('especializacao_en')->nullable()->after('especializacao');
            $table->string('especializacao_fr')->nullable()->after('especializacao_en');
            $table->text('bio_en')->nullable()->after('bio');
            $table->text('bio_fr')->nullable()->after('bio_en');
        });

        $translations = [
            'puto-luis' => [
                'en' => [
                    'cargo'         => 'Co-Founder',
                    'especializacao'=> 'Mining Engineering',
                    'bio'           => 'Master in Mining Engineering from the Moscow University of Science and Technology (MISIS). Experience in mining operations at major international groups including PHOSAGRO. Specialist in mine planning and mining process optimisation.',
                ],
                'fr' => [
                    'cargo'         => 'Co-Fondateur',
                    'especializacao'=> 'Ingénierie Minière',
                    'bio'           => 'Maître en Ingénierie Minière de l\'Université des Sciences et Technologies de Moscou (MISIS). Expérience dans les opérations minières au sein de grands groupes internationaux dont PHOSAGRO. Spécialiste en planification minière et optimisation des processus d\'extraction.',
                ],
            ],
            'fernanda-goncalves' => [
                'en' => [
                    'cargo'         => 'Co-Founder',
                    'especializacao'=> 'IT & Geology',
                    'bio'           => 'Specialist in integrating digital technologies with geosciences. Responsible for the AMIS digital platform, project management systems and development of software solutions for geological analysis and modelling.',
                ],
                'fr' => [
                    'cargo'         => 'Co-Fondatrice',
                    'especializacao'=> 'Informatique & Géologie',
                    'bio'           => 'Spécialiste en intégration des technologies numériques avec les géosciences. Responsable de la plateforme numérique AMIS, des systèmes de gestion de projets et du développement de solutions logicielles pour l\'analyse et la modélisation géologique.',
                ],
            ],
        ];

        foreach ($translations as $slug => $trans) {
            $membro = DB::table('equipa')->where('slug', $slug)->first();
            if ($membro) {
                DB::table('equipa')->where('id', $membro->id)->update([
                    'cargo_en'         => $trans['en']['cargo'],
                    'cargo_fr'         => $trans['fr']['cargo'],
                    'especializacao_en'=> $trans['en']['especializacao'],
                    'especializacao_fr'=> $trans['fr']['especializacao'],
                    'bio_en'           => $trans['en']['bio'],
                    'bio_fr'           => $trans['fr']['bio'],
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('equipa', function (Blueprint $table) {
            $table->dropColumn([
                'cargo_en', 'cargo_fr',
                'especializacao_en', 'especializacao_fr',
                'bio_en', 'bio_fr',
            ]);
        });
    }
};
