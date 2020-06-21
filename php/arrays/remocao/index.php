<?php declare(strict_types=1);

use Alura\Arrays\Remocao\ArrayUtils;

require_once 'autoload.php';

$correntistas_e_compras = [
    "Giovani",
    "João",
    12,
    "Maria",
    25,
    "Luís",
    "Luisa",
    "12"
];

echo "<pre>";
var_dump($correntistas_e_compras);
echo "</pre>";

ArrayUtils::remover("12", $correntistas_e_compras);

echo "<pre>";
var_dump($correntistas_e_compras);
echo "</pre>";