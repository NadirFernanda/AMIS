<?php
use App\Models\Estatistica;

$stats = [
    ['chave' => 'projetos',       'valor' => '50+',  'descricao' => 'Projetos Concluídos',    'ordem' => 1],
    ['chave' => 'cursos',         'valor' => '6',    'descricao' => 'Cursos Certificados',     'ordem' => 2],
    ['chave' => 'profissionais',  'valor' => '200+', 'descricao' => 'Profissionais Formados',  'ordem' => 3],
    ['chave' => 'paises',         'valor' => '4',    'descricao' => 'Países de Atuação',       'ordem' => 4],
];

foreach ($stats as $stat) {
    Estatistica::create($stat);
}

echo "Estatísticas criadas com sucesso!\n";
