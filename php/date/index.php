<?php

$inicio = new DateTime('2022-11-21');
$intervalo = new DateInterval('P4Y');
$fim = new DateTime('2042-11-21');
$date = new DatePeriod($inicio, $intervalo, $fim);

foreach($date as $data) {
    echo $data->format('d/m/Y') . PHP_EOL;
}
