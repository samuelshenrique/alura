<?php

use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;

require 'autoload.php';

$conta = new ContaCorrente(
    new Titular(
        new CPF('469.650.188-44'),
        'Samuel Santos Henrique',
        new Endereco('São Paulo', 'Jardim Apurá', 'Rua Ulisses Virgilio Ferrari', '8')
    )
);

try {
    $conta->deposita(-100);
} catch(InvalidArgumentException $e) {
    echo 'Valor a depositar precisa ser positivo';
}