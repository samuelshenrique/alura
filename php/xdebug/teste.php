<?php

require 'outro.php';

$teste = 133921832194823053475435734895743;
var_dump($teste);
var_dump('teste');

try {
    funcao1('Um parametro');
} catch (\Throwable $ex) {
    echo $ex->getMessage() . PHP_EOL;
}