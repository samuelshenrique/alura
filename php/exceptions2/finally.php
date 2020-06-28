<?php

try {
    echo "Executando" . PHP_EOL;
    throw new Exception('Exceção aqui');
} catch(Throwable $e) {
    echo 'Caindo no catch' . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
} finally {
    echo 'Finally' . PHP_EOL;
}