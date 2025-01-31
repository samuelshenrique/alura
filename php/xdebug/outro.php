<?php

function funcao1(string $param): never
{
    $variavelQualquer=1;
    echo $param . PHP_EOL;
    funcao2(); 
}

function funcao2(): never
{
    $variavelQualquer = 3;
    throw new \Exception('Mensagem');
}