<?php
use App\Models\Testemunho;

$testemunhos = [
    [
        'nome'    => 'Eng. Carlos Mendes',
        'cargo'   => 'Director de Operações',
        'empresa' => 'Mineira do Lobito S.A.',
        'texto'   => 'A AMIS transformou completamente os nossos processos de planeamento mineiro. Em menos de seis meses conseguimos reduzir os custos de lavra em quase 20%. Uma equipa com conhecimento técnico de nível internacional e uma capacidade de adaptação ao contexto angolano que raramente encontramos.',
        'rating'  => 5,
        'ativo'   => true,
    ],
    [
        'nome'    => 'Dra. Ana Ferreira',
        'cargo'   => 'Responsável de Formação',
        'empresa' => 'ENDIAMA E.P.',
        'texto'   => 'Os cursos da AMIS são os mais completos e práticos que encontrámos no mercado angolano. Os nossos técnicos voltaram completamente transformados, com ferramentas reais para aplicar no dia a dia. Recomendamos sem hesitação a qualquer empresa do sector.',
        'rating'  => 5,
        'ativo'   => true,
    ],
    [
        'nome'    => 'Eng. João Neto',
        'cargo'   => 'CEO',
        'empresa' => 'Grupo Mineiro Austral',
        'texto'   => 'Parceiros de confiança para qualquer desafio técnico. O processo de fornecimento e comissionamento dos equipamentos foi impecável — sem atrasos, dentro do orçamento e com toda a documentação em ordem. É o tipo de profissionalismo que precisamos em Angola.',
        'rating'  => 5,
        'ativo'   => true,
    ],
];

foreach ($testemunhos as $d) {
    Testemunho::create($d);
}

echo "Testemunhos criados com sucesso!\n";
