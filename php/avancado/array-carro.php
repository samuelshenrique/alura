<?php

$carro = [
    'FEY-8709' => [
        'marca' => 'Fiat',
        'modelo' => 'Uno'
    ],
    'CIM6308' => [
        'marca' => 'Fiat',
        'modelo' => 'Palio Weekend 95'
    ],
    'FEP2390' => [
        'marca' => 'VW',
        'modelo' => 'Golf'
    ]
];

echo "Carros cadastrados";

echo PHP_EOL;
echo PHP_EOL;

foreach($carro as $placa => $caracteristicas) {
    echo 'Placa: ' . $placa . PHP_EOL;
    echo 'Marca: ' . $caracteristicas['marca'] . PHP_EOL;
    echo 'Modelo: ' . $caracteristicas['modelo'] . PHP_EOL;

    echo PHP_EOL;
    echo PHP_EOL;
    echo PHP_EOL;
}


?>