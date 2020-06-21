<?php

namespace Alura\Banco\Modelo;

interface Autenticavel {
    public function Autenticar(string $senha): bool;
}