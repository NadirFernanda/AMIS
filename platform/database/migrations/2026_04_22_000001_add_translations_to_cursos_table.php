<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->string('titulo_en')->nullable()->after('titulo');
            $table->string('titulo_fr')->nullable()->after('titulo_en');
            $table->text('descricao_en')->nullable()->after('descricao');
            $table->text('descricao_fr')->nullable()->after('descricao_en');
            $table->string('nivel_en')->nullable()->after('nivel');
            $table->string('nivel_fr')->nullable()->after('nivel_en');
            $table->string('duracao_en')->nullable()->after('duracao');
            $table->string('duracao_fr')->nullable()->after('duracao_en');
            $table->string('modalidade_en')->nullable()->after('modalidade');
            $table->string('modalidade_fr')->nullable()->after('modalidade_en');
            $table->json('topicos_en')->nullable()->after('topicos');
            $table->json('topicos_fr')->nullable()->after('topicos_en');
        });

        // Pre-populate EN/FR translations
        $translations = [
            'Gestão e Planejamento de Operações Minerais' => [
                'en' => [
                    'titulo'     => 'Mining Operations Management & Planning',
                    'descricao'  => 'Management principles applied to mining operations: production planning, cost control, people management and KPI indicators.',
                    'nivel'      => 'Advanced',
                    'duracao'    => '3 months',
                    'modalidade' => 'Online / In-Person',
                    'topicos'    => ['Mine planning', 'Production control', 'People management', 'KPI indicators', 'Operational safety'],
                ],
                'fr' => [
                    'titulo'     => 'Gestion et Planification des Opérations Minières',
                    'descricao'  => 'Principes de gestion appliqués aux opérations minières : planification de la production, contrôle des coûts, gestion des personnes et indicateurs KPI.',
                    'nivel'      => 'Avancé',
                    'duracao'    => '3 mois',
                    'modalidade' => 'En Ligne / Présentiel',
                    'topicos'    => ['Planification minière', 'Contrôle de production', 'Gestion des personnes', 'Indicateurs KPI', 'Sécurité opérationnelle'],
                ],
            ],
            'Engenharia de Beneficiamento Mineral' => [
                'en' => [
                    'titulo'     => 'Mineral Processing Engineering',
                    'descricao'  => 'Physical and chemical mineral separation techniques. Design and operation of flotation, grinding and classification circuits.',
                    'nivel'      => 'Advanced',
                    'duracao'    => '3 months',
                    'modalidade' => 'In-Person (Luanda)',
                    'topicos'    => ['Crushing and grinding', 'Mineral flotation', 'Magnetic separation', 'Filtration and drying', 'Quality control'],
                ],
                'fr' => [
                    'titulo'     => 'Ingénierie de Traitement Minéral',
                    'descricao'  => 'Techniques de séparation physique et chimique des minéraux. Conception et opération de circuits de flottation, broyage et classification.',
                    'nivel'      => 'Avancé',
                    'duracao'    => '3 mois',
                    'modalidade' => 'Présentiel (Luanda)',
                    'topicos'    => ['Concassage et broyage', 'Flottation minérale', 'Séparation magnétique', 'Filtration et séchage', 'Contrôle qualité'],
                ],
            ],
            'Geoprocessamento e Modelagem 3D' => [
                'en' => [
                    'titulo'     => 'Geoprocessing and 3D Modelling',
                    'descricao'  => 'Use of modern software (Leapfrog, Vulcan, MapInfo) for geological modelling, resource estimation and mine planning.',
                    'nivel'      => 'Intermediate',
                    'duracao'    => '2 months',
                    'modalidade' => 'Online',
                    'topicos'    => ['Leapfrog Geo', '3D geological modelling', 'Resource estimation', 'Maps and GIS', 'JORC reports'],
                ],
                'fr' => [
                    'titulo'     => 'Géotraitement et Modélisation 3D',
                    'descricao'  => 'Utilisation de logiciels modernes (Leapfrog, Vulcan, MapInfo) pour la modélisation géologique, l\'estimation des ressources et la planification minière.',
                    'nivel'      => 'Intermédiaire',
                    'duracao'    => '2 mois',
                    'modalidade' => 'En Ligne',
                    'topicos'    => ['Leapfrog Geo', 'Modélisation géologique 3D', 'Estimation des ressources', 'Cartes et SIG', 'Rapports JORC'],
                ],
            ],
            'Automação e Controle de Processos Minerais' => [
                'en' => [
                    'titulo'     => 'Automation and Control of Mineral Processes',
                    'descricao'  => 'Introduction to industrial automation applied to mining: PLCs, SCADA, sensors and processing circuit control.',
                    'nivel'      => 'Intermediate',
                    'duracao'    => '2 months',
                    'modalidade' => 'Online / In-Person',
                    'topicos'    => ['PLCs and SCADA', 'Industrial instrumentation', 'Circuit control', 'Predictive maintenance', 'IoT in mining'],
                ],
                'fr' => [
                    'titulo'     => 'Automatisation et Contrôle des Procédés Miniers',
                    'descricao'  => 'Introduction à l\'automatisation industrielle appliquée à l\'exploitation minière : PLCs, SCADA, capteurs et contrôle des circuits de traitement.',
                    'nivel'      => 'Intermédiaire',
                    'duracao'    => '2 mois',
                    'modalidade' => 'En Ligne / Présentiel',
                    'topicos'    => ['PLCs et SCADA', 'Instrumentation industrielle', 'Contrôle des circuits', 'Maintenance prédictive', 'IoT en mines'],
                ],
            ],
            'Segurança e Meio Ambiente em Mineração' => [
                'en' => [
                    'titulo'     => 'Safety and Environment in Mining',
                    'descricao'  => 'Angolan legislation and international standards on OHS and the environment. Risk management, emergency plans and environmental impact.',
                    'nivel'      => 'Basic',
                    'duracao'    => '1 month',
                    'modalidade' => 'Online',
                    'topicos'    => ['Angolan OHS legislation', 'Risk assessment', 'Emergency plans', 'Environmental management', 'Licensing'],
                ],
                'fr' => [
                    'titulo'     => 'Sécurité et Environnement dans l\'Exploitation Minière',
                    'descricao'  => 'Législation angolaise et normes internationales en SST et environnement. Gestion des risques, plans d\'urgence et impact environnemental.',
                    'nivel'      => 'Débutant',
                    'duracao'    => '1 mois',
                    'modalidade' => 'En Ligne',
                    'topicos'    => ['Législation SST angolaise', 'Évaluation des risques', 'Plans d\'urgence', 'Gestion environnementale', 'Licences'],
                ],
            ],
            'Prospecção e Avaliação de Depósitos Minerais' => [
                'en' => [
                    'titulo'     => 'Mineral Deposit Prospecting and Evaluation',
                    'descricao'  => 'Geophysical, geochemical and drilling prospecting methods. Economic evaluation of deposits and resource models.',
                    'nivel'      => 'Intermediate',
                    'duracao'    => '2 months',
                    'modalidade' => 'Online / In-Person',
                    'topicos'    => ['Applied geophysics', 'Prospecting geochemistry', 'Drilling and sampling', 'Resource models', 'Economic analysis'],
                ],
                'fr' => [
                    'titulo'     => 'Prospection et Évaluation des Gisements Minéraux',
                    'descricao'  => 'Méthodes de prospection géophysique, géochimique et par forage. Évaluation économique des gisements et modèles de ressources.',
                    'nivel'      => 'Intermédiaire',
                    'duracao'    => '2 mois',
                    'modalidade' => 'En Ligne / Présentiel',
                    'topicos'    => ['Géophysique appliquée', 'Géochimie de prospection', 'Forage et échantillonnage', 'Modèles de ressources', 'Analyse économique'],
                ],
            ],
        ];

        foreach ($translations as $tituloPt => $trans) {
            $curso = DB::table('cursos')->where('titulo', $tituloPt)->first();
            if ($curso) {
                DB::table('cursos')->where('id', $curso->id)->update([
                    'titulo_en'    => $trans['en']['titulo'],
                    'titulo_fr'    => $trans['fr']['titulo'],
                    'descricao_en' => $trans['en']['descricao'],
                    'descricao_fr' => $trans['fr']['descricao'],
                    'nivel_en'     => $trans['en']['nivel'],
                    'nivel_fr'     => $trans['fr']['nivel'],
                    'duracao_en'   => $trans['en']['duracao'],
                    'duracao_fr'   => $trans['fr']['duracao'],
                    'modalidade_en'=> $trans['en']['modalidade'],
                    'modalidade_fr'=> $trans['fr']['modalidade'],
                    'topicos_en'   => json_encode($trans['en']['topicos']),
                    'topicos_fr'   => json_encode($trans['fr']['topicos']),
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn([
                'titulo_en', 'titulo_fr',
                'descricao_en', 'descricao_fr',
                'nivel_en', 'nivel_fr',
                'duracao_en', 'duracao_fr',
                'modalidade_en', 'modalidade_fr',
                'topicos_en', 'topicos_fr',
            ]);
        });
    }
};
