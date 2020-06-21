<?php

use exception\SaldoInsuficienteException;

header('Content-Type: text/html; charset=utf-8');

require 'Validacao.php';
require 'ContaCorrente.php';

$contaJoao = new ContaCorrente('João', '1212', '343477-9', 2000.0);
$contaMaria = new ContaCorrente('Maria', '1212', '343423-9', 6000.0);
$contaJose = new ContaCorrente('José', '1212', '343423-9', 6000.0);
$contaJoaoao = new ContaCorrente('Joaoao', '1234', '343423-9', 6000.0);
$contaMae = new ContaCorrente('Mae', '1234', '343423-9', 6000.0);
$contaDeme = new ContaCorrente('deme', '1212', '343423-9', 6000.0);
$contaFelipe = new ContaCorrente('Felipe', '1212', '343423-9', 6000.0);

echo 'Total de contas: ' . ContaCorrente::$totalContas;
echo '<br>';
echo 'Taxa: ' . ContaCorrente::$taxaOperacao;


echo "<pre>";
var_dump($contaMae);
echo "</pre>";

try {
    $contaMae->transferir(30000, $contaJoao);
} catch(\exception\SaldoInsuficienteException $error) {
    $contaMae->totalSaquesNaoPermitidos++;
    echo $error->getMessage();
    echo '<br>';
    echo 'Saldo em conta: ' . $error->saldo;
    echo '<br>';
    echo 'Valor do saque: ' . $error->valor;
}
 catch(Exception $error) {
    echo $error->getMessage();
}


echo '<br>';
echo 'Operações não realizadas' . ContaCorrente::$operacaoNaoRealizada;
echo '</br>';


echo "<pre>";
var_dump($contaMae);
echo "</pre>";