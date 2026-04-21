<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projectos', function (Blueprint $table) {
            $table->string('titulo_en')->nullable()->after('titulo');
            $table->string('titulo_fr')->nullable()->after('titulo_en');
            $table->text('descricao_en')->nullable()->after('descricao');
            $table->text('descricao_fr')->nullable()->after('descricao_en');
            $table->string('resultado_en')->nullable()->after('resultado');
            $table->string('resultado_fr')->nullable()->after('resultado_en');
        });

        $translations = [
            'Planeamento Mineiro — Bloco Granítico' => [
                'en' => [
                    'titulo'    => 'Mining Planning — Granite Block',
                    'descricao' => 'Development of the mine plan and optimisation of the production sequencing for an industrial granite mine, with topographic survey and 3D modelling of the deposit.',
                    'resultado' => '18% reduction in mining operating costs in the first year.',
                ],
                'fr' => [
                    'titulo'    => 'Planification Minière — Bloc Granitique',
                    'descricao' => 'Élaboration du plan de mine et optimisation du séquencement de production pour une mine de granit industriel, avec levé topographique et modélisation 3D du gisement.',
                    'resultado' => 'Réduction de 18% des coûts opérationnels miniers au cours de la première année.',
                ],
            ],
            'Formação em Segurança e Higiene Mineira' => [
                'en' => [
                    'titulo'    => 'Mining Safety and Hygiene Training',
                    'descricao' => 'Certified training programme in safety, hygiene and occupational health for mine operation teams, including emergency simulations and risk assessment.',
                    'resultado' => '120 certified professionals with a 92% pass rate.',
                ],
                'fr' => [
                    'titulo'    => 'Formation en Sécurité et Hygiène Minière',
                    'descricao' => 'Programme de formation certifiée en sécurité, hygiène et santé au travail pour les équipes d\'exploitation minière, incluant des simulations d\'urgence et l\'évaluation des risques.',
                    'resultado' => '120 professionnels certifiés avec un taux de réussite de 92%.',
                ],
            ],
            'Fornecimento e Comissionamento de Equipamentos' => [
                'en' => [
                    'titulo'    => 'Equipment Supply and Commissioning',
                    'descricao' => 'Import, delivery, installation and commissioning of drilling and blasting equipment for iron ore exploration, including training of local operators.',
                    'resultado' => 'Full delivery and commissioning in 45 days, within budget.',
                ],
                'fr' => [
                    'titulo'    => 'Fourniture et Mise en Service d\'Équipements',
                    'descricao' => 'Importation, livraison, installation et mise en service d\'équipements de forage et de sautage pour l\'exploration de minerai de fer, incluant la formation des opérateurs locaux.',
                    'resultado' => 'Livraison et mise en service complètes en 45 jours, dans les délais et le budget.',
                ],
            ],
            'Modelagem Geológica 3D — Concessão Diamantífera' => [
                'en' => [
                    'titulo'    => '3D Geological Modelling — Diamond Concession',
                    'descricao' => 'Geophysical survey and 3D geological modelling of a concession area with resource estimation and classification according to the JORC code.',
                    'resultado' => '80 km² model delivered in 90 days with JORC Inferred resource estimate.',
                ],
                'fr' => [
                    'titulo'    => 'Modélisation Géologique 3D — Concession Diamantifère',
                    'descricao' => 'Levé géophysique et modélisation géologique tridimensionnelle d\'une zone de concession avec estimation des ressources et classification selon le code JORC.',
                    'resultado' => 'Modèle de 80 km² livré en 90 jours avec une estimation JORC Inferred.',
                ],
            ],
            'Curso de Operação de Maquinaria Pesada' => [
                'en' => [
                    'titulo'    => 'Heavy Machinery Operation Course',
                    'descricao' => 'Practical training in the operation of excavators, bulldozers and large trucks for the mining sector, with a theoretical component on preventive maintenance.',
                    'resultado' => '85% pass rate, 68 certified operators.',
                ],
                'fr' => [
                    'titulo'    => 'Cours d\'Exploitation d\'Engins Lourds',
                    'descricao' => 'Formation pratique à l\'exploitation d\'excavatrices, bulldozers et camions de grande capacité pour le secteur minier, avec une composante théorique sur la maintenance préventive.',
                    'resultado' => 'Taux de réussite de 85%, 68 opérateurs certifiés.',
                ],
            ],
            'Consultoria Ambiental e Licenciamento' => [
                'en' => [
                    'titulo'    => 'Environmental Consultancy and Licensing',
                    'descricao' => 'Preparation of the Environmental and Social Impact Assessment (ESIA) and support throughout the environmental licensing process with the relevant Angolan authorities.',
                    'resultado' => 'Environmental licence approved by MINAMB in 60 working days.',
                ],
                'fr' => [
                    'titulo'    => 'Conseil Environnemental et Licences',
                    'descricao' => 'Élaboration de l\'Étude d\'Impact Environnemental et Social (EIES) et accompagnement du processus de licence environnementale auprès des entités compétentes angolaises.',
                    'resultado' => 'Licence environnementale approuvée par le MINAMB en 60 jours ouvrables.',
                ],
            ],
        ];

        foreach ($translations as $tituloPt => $trans) {
            $projecto = DB::table('projectos')->where('titulo', $tituloPt)->first();
            if ($projecto) {
                DB::table('projectos')->where('id', $projecto->id)->update([
                    'titulo_en'    => $trans['en']['titulo'],
                    'titulo_fr'    => $trans['fr']['titulo'],
                    'descricao_en' => $trans['en']['descricao'],
                    'descricao_fr' => $trans['fr']['descricao'],
                    'resultado_en' => $trans['en']['resultado'],
                    'resultado_fr' => $trans['fr']['resultado'],
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('projectos', function (Blueprint $table) {
            $table->dropColumn([
                'titulo_en', 'titulo_fr',
                'descricao_en', 'descricao_fr',
                'resultado_en', 'resultado_fr',
            ]);
        });
    }
};
