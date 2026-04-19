<?php
use App\Models\Equipamento;

$items = [
    [
        'titulo' => 'Sondagem e Perfuração',
        'descricao' => 'Equipamentos de core drilling e percussão para prospeção geológica.',
        'icon_svg' => 'M12 3v1m0 16v1M3 12h1m16 0h1m-1.636-7.364l-.707.707M6.343 17.657l-.707.707M20.364 17.657l-.707-.707M6.343 6.343l-.707-.707',
        'ordem' => 1,
    ],
    [
        'titulo' => 'Processamento Mineral',
        'descricao' => 'Moínhos, classificadores, células de flotação e circuitos completos.',
        'icon_svg' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
        'ordem' => 2,
    ],
    [
        'titulo' => 'Monitorização Geotécnica',
        'descricao' => 'Sensores, dataloggers e sistemas de alerta precoce para taludes.',
        'icon_svg' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
        'ordem' => 3,
    ],
    [
        'titulo' => 'Laboratório Analítico',
        'descricao' => 'Espectrômetros, analisadores XRF e equipamentos de caracterização.',
        'icon_svg' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
        'ordem' => 4,
    ],
];

foreach ($items as $item) {
    Equipamento::create(array_merge($item, ['ativo' => true]));
}

echo "Equipamentos criados com sucesso!\n";
