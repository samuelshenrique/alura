<?php

function funcao1(string $param): never
{
    $variavelQualquer = 1;
    echo $param;

    funcao2();
}

function funcao2(): never
{
    $variavelQualquer = 2;
    throw new Exception('mensagem qualquer');
}