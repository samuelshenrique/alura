<?php

//Aprendendo e melhorando arrays associativos

$conta1 = [
    'titular' => "Samuel",
    'saldo' => 1000
];

$conta2 = [
    'titular' => 'Luciano',
    'saldo' => 1500
];

$conta3 = [
    'titular' => 'Raphael',
    'saldo' => 2000
];

$contasCorrentes = [$conta1, $conta2, $conta3];


$contasCorrentes2 = [
    [
        'titular' => "Samuel",
        'saldo' => 1000
    ],
    [
        'titular' => 'Luciano',
        'saldo' => 1500
    ],
    [
        'titular' => 'Raphael',
        'saldo' => 2000
    ]
];

echo 'quantidade de contas no banco 1:' . count($contasCorrentes) . PHP_EOL . PHP_EOL;

$contasCorrentes[] = [
    'titular' => 'Leda',
    'saldo' => 2500
];

echo "conta 2" . PHP_EOL;
foreach($contasCorrentes2 as $valor=>$conta) {
    echo $valor . '=>' . $conta['titular'] . PHP_EOL;
}

echo PHP_EOL . "conta 1" . PHP_EOL;


foreach($contasCorrentes as $conta) {
    echo $conta['titular'] . PHP_EOL;
}



?>