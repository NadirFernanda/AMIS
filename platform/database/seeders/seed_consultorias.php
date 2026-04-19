<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$now = Carbon::now();

$pacotes = [
    [
        'titulo'    => 'Básico',
        'tagline'   => 'Ideal para empresas em fase inicial',
        'descricao' => null,
        'preco_usd' => '$15,000',
        'preco_aoa' => 'AKZ 12,000,000',
        'cor'       => '#1a3a5c',
        'destaque'  => 0,
        'features'  => json_encode([
            'Diagnóstico técnico inicial',
            'Relatório de conformidade',
            'Análise de risco simplificada',
            '1 visita técnica ao terreno',
            'Suporte por email 30 dias',
        ]),
        'ativo'      => 1,
        'ordem'      => 1,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'titulo'    => 'Intermédio',
        'tagline'   => 'Para operações em expansão',
        'descricao' => null,
        'preco_usd' => '$35,000',
        'preco_aoa' => 'AKZ 28,000,000',
        'cor'       => '#c9922a',
        'destaque'  => 1,
        'features'  => json_encode([
            'Tudo do Básico',
            'Planeamento mineiro detalhado',
            'Modelagem geológica 3D',
            '3 visitas técnicas ao terreno',
            'Suporte dedicado 90 dias',
            'Workshop de transferência de conhecimento',
        ]),
        'ativo'      => 1,
        'ordem'      => 2,
        'created_at' => $now,
        'updated_at' => $now,
    ],
    [
        'titulo'    => 'Avançado',
        'tagline'   => 'Solução completa end-to-end',
        'descricao' => null,
        'preco_usd' => '$75,000',
        'preco_aoa' => 'AKZ 60,000,000',
        'cor'       => '#0d8a7d',
        'destaque'  => 0,
        'features'  => json_encode([
            'Tudo do Intermédio',
            'Optimização de processos completa',
            'Instalação e comissionamento',
            'Visitas mensais por 12 meses',
            'Suporte técnico dedicado anual',
            'Formação da equipa interna',
            'Relatório de impacto anual',
        ]),
        'ativo'      => 1,
        'ordem'      => 3,
        'created_at' => $now,
        'updated_at' => $now,
    ],
];

DB::table('consultorias')->insert($pacotes);
echo DB::table('consultorias')->count() . ' pacotes de consultoria inseridos';
