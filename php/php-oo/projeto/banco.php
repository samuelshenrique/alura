<?php

require_once "autoload.php";

use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\Titular;


$primeirocpf = new Cpf('123.456.789-10');
$endereco = new Endereco('São Paulo', 'Jardim Apurá', 'Rua Ulisses Virgílio Ferrari', '08');

$samuel = new Titular($primeirocpf, 'Samuel Santos Henrique', $endereco);
$primeiraConta = new Conta($samuel);
$primeiraConta->depositar(300);
$primeiraConta->sacar(100); //Desejável


echo $primeiraConta->recuperaCpfTitular();
echo $primeiraConta->recuperaNomeTitular();
// var_dump($primeiraConta);

$cpfSegundaConta = new Cpf('11234567-10');
$segundaConta = new Conta(new Titular($cpfSegundaConta, 'Edileuza Pedreira', $endereco));

$cpfTerceiraConta = new Cpf('11234567-10');
$terceiraConta = new Conta(new Titular($cpfTerceiraConta, 'Edileuza Pedreira', $endereco));

// echo $primeiraConta->recuperarSaldo();
// echo PHP_EOL;
// echo $primeiraConta->recuperarNome();
// echo PHP_EOL;
// echo $primeiraConta->recuperaCpftitular();
// $primeiraConta->saldo -= 300; // Não é desejável

// echo Conta::getNumeroContas();
var_dump($primeiraConta);
?>