<?php
use App\Models\Membro;

Membro::create([
    'nome'           => 'Engº MSc Puto Luís',
    'slug'           => 'puto-luis',
    'cargo'          => 'Co-Fundador',
    'especializacao' => 'Engenharia de Minas',
    'bio'            => 'Mestre em Engenharia de Minas pela Universidade de Pesquisas e Tecnologia de Moscovo (MISIS). Experiência em operações de mineração em grandes grupos internacionais incluindo PHOSAGRO. Especialista em planeamento mineiro e otimização de processos de lavra.',
    'tags'           => ['Engenharia de Minas', 'Planeamento Mineiro', 'PHOSAGRO', 'MISIS Moscovo'],
    'cor'            => '#c9922a',
    'ordem'          => 1,
    'ativo'          => true,
]);

Membro::create([
    'nome'           => 'Engª Fernanda Gonçalves',
    'slug'           => 'fernanda-goncalves',
    'cargo'          => 'Co-Fundadora',
    'especializacao' => 'Informática & Geologia',
    'bio'            => 'Especialista em integração de tecnologias digitais com geociências. Responsável pela plataforma digital da AMIS, sistemas de gestão de projetos e desenvolvimento de soluções de software para análise e modelagem geológica.',
    'tags'           => ['Tecnologia', 'Geologia', 'Transformação Digital', 'Gestão de Operações'],
    'cor'            => '#0d8a7d',
    'ordem'          => 2,
    'ativo'          => true,
]);

echo "Equipa criada com sucesso!\n";
