<?php

use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Service\ControladorDeBonificacoes;
use Alura\Banco\Modelo\Funcionario\{Gerente, Diretor, Desenvolvedor, EditorVideo};



require_once 'autoload.php';

$umFuncionario = new Desenvolvedor(
    'Samuel Santos Henrique',
    new Cpf('123.456.789-10'),
    1000
);

$umFuncionario->sobeDeNivel();

$umGerente = new Gerente(
    'Patricia',
    new Cpf('321.456.789-10'),
    3000
);

$umDiretor = new Diretor(
    'Patricia',
    new Cpf('321.456.789-10'),
    5000
);

$umEditor = new EditorVideo(
    'Ailisom',
    new Cpf('456.789.765-20'),
    4000
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umGerente);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umEditor);

echo $controlador->getTotalBonificacoes();

// echo $umFuncionario->getSalario();

// echo $umFuncionario->calculaBonificacao();