<?php

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000
];

foreach($saldos as $saldo) {
    echo "O saldo é:" . $saldo;
    echo "<br/>";   
}

// echo "<pre>";
// var_dump($saldos);

sort($saldos);

// var_dump($saldos);

// echo "</pre>";

echo "O menor saldo é: " . $saldos[0];