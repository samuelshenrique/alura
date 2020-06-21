<?php

use Alura\Banco\Service\Autenticador;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\Cpf;

require_once "autoload.php";

$autenticador = new Autenticador();

$umDiretor = new Diretor(
    'Samuel',
    new Cpf('123.456.789-10'),
    10000
);

$autenticador->login($umDiretor, '1234');