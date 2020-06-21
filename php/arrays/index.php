<?php

use Alura\Calculadora;

require_once 'autoload.php';

$notas = [9, 3, 10, 5, 10, 8];

$calc = new Calculadora();

$media = $calc->calculaMedia($notas);

if($media === null) {
    echo "Média não pode ser calculada";
} else {
    echo "Média: " . $media;
}



