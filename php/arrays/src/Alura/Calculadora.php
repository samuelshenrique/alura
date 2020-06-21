<?php

namespace Alura;

class Calculadora
{
    public function calculaMedia(array $notas): ?float
    {
        $quantNotas = sizeof($notas);

        if($quantNotas > 0){
            $soma = 0;

            for($i = 0;$i < $quantNotas; $i++) {
                $soma += $notas[$i];
            }
            $media = $soma / $quantNotas;   
            return $media;
        }
        return null;

    }
}