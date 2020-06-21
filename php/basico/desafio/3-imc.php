<?php

$altura = 1.80;
$peso = 80;

$imc = $peso / ($altura ** 2);

echo $imc . PHP_EOL;

if($imc < 18.5) {
    echo "Abaixo do peso" . PHP_EOL;
} else if($imc >= 18.5 && $imc < 25) {
    echo "Peso normal" . PHP_EOL;
} else if($imc > 25) {
    echo "Acima do peso" . PHP_EOL;
}

?>