<?php

use Alura\Banco\Modelo\Endereco;

require_once "autoload.php";

$umEndereco = new Endereco(
    'Bahia',
    'Jardim Apurá',
    'rua Ulisses Virgilio Ferrari',
    '8'
);

$outroEndereco = new Endereco(
    'São Paulo',
    'Bela Vista',
    'Avenida Paulista',
    '100'
);

echo $umEndereco->bairro . PHP_EOL . PHP_EOL;

echo $umEndereco->bairro;

echo $umEndereco->bairro . PHP_EOL . PHP_EOL;