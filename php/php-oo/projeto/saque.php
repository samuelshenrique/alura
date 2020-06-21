<?php

use Alura\Banco\Modelo\Conta\{ContaCorrente, ContaPoupanca, Titular};
use Alura\Banco\Modelo\{Cpf, Endereco};

require_once "autoload.php";

$conta = new ContaCorrente(
    new Titular(
        new Cpf('123.456.789-10'),
        'Samuel',
        new Endereco('São Paulo', 'Apurá', 'Rua Ulisses virgilio', '08')
    )
);

$conta2 = new ContaPoupanca(
    new Titular(
        new Cpf('123.456.789-10'),
        'Samuel',
        new Endereco('São Paulo', 'Apurá', 'Rua Ulisses virgilio', '08')
    )
);

$conta->depositar(500);
$conta->sacar(100);

$conta2->depositar(500);
$conta2->sacar(100);

echo "Saldo conta 1: " . $conta->recuperarSaldo();
echo PHP_EOL;
echo "Saldo Conta 2: " .  $conta2->recuperarSaldo();