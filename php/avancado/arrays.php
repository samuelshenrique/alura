<?php

$array1 = array(20, 10, 15, 35, 40, 55);
$array2 = [20, 12, 17, 37, 43, 59];

for($i=0; $i < count($array1); $i++) {
    echo $array1[$i] . PHP_EOL;
}

echo PHP_EOL . "Deu certo o primeiro array" . PHP_EOL;

for ($i=0; $i < count($array2); $i++) {
    echo $array2[$i] . PHP_EOL;
}

echo PHP_EOL . "Deu certo o segundo array" . PHP_EOL;

?>