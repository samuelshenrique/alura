<?php

function funcao1()
{
    echo 'Entrei na função 1' . PHP_EOL;
    try {
        funcao2();
    } catch (Throwable $problema) {
        echo $problema->getMessage() . PHP_EOL;
        echo $problema->getLine() . PHP_EOL;
        echo $problema->getTraceAsString() . PHP_EOL;
    }
    echo 'Saindo da função 1' . PHP_EOL;
}

function funcao2()
{
    echo 'Entrei na função 2' . PHP_EOL;
    
    for ($i = 1; $i <= 5; $i++) {
        echo $i . PHP_EOL;
    }
    echo 'Saindo da função 2' . PHP_EOL;
}



echo 'Iniciando o programa principal' . PHP_EOL;
try {
    funcao1();
} catch(RuntimeException $e) {
    echo $e->getMessage() . PHP_EOL;
    echo 'Código erro: ' . $e->getCode() . PHP_EOL;
}
echo 'Finalizando o programa principal' . PHP_EOL;
