<?php

use Alura\ArrayUtils;

require_once "../remocao/ArrayUtils.php";

$correntistas = [
    'Giovanni',
    'João',
    'Maria',
    'Luis',
    'Luisa',
    'Rafael'
];

$correntistasNaoPagantes = [
    'Luis',
    'Luisa',
    'Rafael'
];

// Função que pega a diferença entre dois arrays e cria um novo array com a diferença entre eles.
// $correntistasPagantes = array_diff($correntistas, $correntistasNaoPagantes);


echo "<pre>";
// var_dump($correntistasPagantes);
echo "<pre>";

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000
];

//Combina os valores dos arrays, sendo o primeiro array com o nome da chave e o segundo array como valor da chave. Um a um.
$relacionados = array_combine($correntistas, $saldos);

$relacionados['Samuel'] = 5000;

echo "<pre>";
var_dump($relacionados);
echo "<pre>";

foreach($relacionados as $titular=>$saldo) {
    echo "Titular: " . $titular;
    echo '<br>';
    echo 'Saldo: ' . $saldo;
    echo '<br>';
    echo '<br>';
}

//verifica se chave existe dentro do array. Retorna bool
if(array_key_exists("João", $relacionados)) {
    echo "O saldo do Joao é:" . $relacionados["João"];
} else {
    echo "Correntista não encontrado";
}

//chamando método static para verificar quais pessoas ganham mais de 3k. return array
$correntistasRicos = ArrayUtils::searchPessoas(3000, $relacionados);


echo '<pre>';
var_dump($correntistasRicos);
echo '</pre>';
