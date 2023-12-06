<?php

namespace Alura\Solid\Model;

class AluraLive implements Pontuavel
{
    public function recuperarPontuacao(): int
    {
        return 50;
    }
}