<?php
use App\Models\Projeto;

$projetos = [
    [
        'titulo'    => 'Planeamento Mineiro — Bloco Granítico',
        'local'     => 'Lunda Norte, Angola',
        'tipo'      => 'consultoria',
        'descricao' => 'Elaboração do plano de lavra e otimização do sequenciamento de produção para uma mina de granito industrial, com levantamento topográfico e modelagem 3D do jazigo.',
        'resultado' => 'Redução de 18% nos custos operacionais de lavra no primeiro ano.',
        'foto'      => '4.jpeg',
        'cor'       => '#1a3a5c',
        'ordem'     => 1,
        'destaque'  => true,
    ],
    [
        'titulo'    => 'Formação em Segurança e Higiene Mineira',
        'local'     => 'Luanda, Angola',
        'tipo'      => 'formacao',
        'descricao' => 'Programa de formação certificada em segurança, higiene e saúde ocupacional para equipas de operação de minas, incluindo simulações de emergência e avaliação de riscos.',
        'resultado' => '120 profissionais certificados com taxa de aprovação de 92%.',
        'foto'      => '5.jpeg',
        'cor'       => '#c9922a',
        'ordem'     => 2,
        'destaque'  => true,
    ],
    [
        'titulo'    => 'Fornecimento e Comissionamento de Equipamentos',
        'local'     => 'Malanje, Angola',
        'tipo'      => 'equipamentos',
        'descricao' => 'Importação, entrega, instalação e comissionamento de equipamentos de perfuração e desmonte para exploração de minério de ferro, incluindo formação dos operadores locais.',
        'resultado' => 'Entrega e comissionamento completos em 45 dias, dentro do orçamento.',
        'foto'      => '6.jpeg',
        'cor'       => '#0d8a7d',
        'ordem'     => 3,
        'destaque'  => true,
    ],
    [
        'titulo'    => 'Modelagem Geológica 3D — Concessão Diamantífera',
        'local'     => 'Lunda Sul, Angola',
        'tipo'      => 'consultoria',
        'descricao' => 'Levantamento geofísico e elaboração de modelo geológico tridimensional de área concessional com estimativa de recursos e classificação segundo o código JORC.',
        'resultado' => 'Modelo de 80 km² entregue em 90 dias com estimativa JORC Inferred.',
        'foto'      => '7.jpeg',
        'cor'       => '#1a3a5c',
        'ordem'     => 4,
        'destaque'  => false,
    ],
    [
        'titulo'    => 'Curso de Operação de Maquinaria Pesada',
        'local'     => 'Huambo, Angola',
        'tipo'      => 'formacao',
        'descricao' => 'Formação prática em operação de escavadoras, bulldozers e camiões de grande porte para o setor mineiro, com componente teórica de manutenção preventiva.',
        'resultado' => '85% de taxa de aprovação, 68 operadores certificados.',
        'foto'      => '8.jpeg',
        'cor'       => '#c9922a',
        'ordem'     => 5,
        'destaque'  => false,
    ],
    [
        'titulo'    => 'Consultoria Ambiental e Licenciamento',
        'local'     => 'Moxico, Angola',
        'tipo'      => 'consultoria',
        'descricao' => 'Elaboração do Estudo de Impacto Ambiental e Social (EIAS) e acompanhamento do processo de licenciamento ambiental junto das entidades competentes angolanas.',
        'resultado' => 'Licença ambiental aprovada pelo MINAMB em 60 dias úteis.',
        'foto'      => '9.jpeg',
        'cor'       => '#0d8a7d',
        'ordem'     => 6,
        'destaque'  => false,
    ],
];

foreach ($projetos as $p) {
    Projeto::create($p);
}

echo "Projetos criados com sucesso!\n";
