<?php

require 'outro.php';

$variavel = 123712894725984359319282958340534503495034823423;
$variavel2 = 'teste';
var_dump($variavel);
var_dump($variavel2);

try {
    funcao1('outro');
} catch (\Throwable $ex) {
    echo $ex->getMessage();
}