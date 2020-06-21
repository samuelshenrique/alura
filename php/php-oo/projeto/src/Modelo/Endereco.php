<?php

namespace Alura\Banco\Modelo;

/**
 * @property-read string $rua
 * @property-read string $cidade
 * @property-read string $bairro
 * @property-read string $numero
 */

final class Endereco {

    use AcessoPropriedades;
    
    private $cidade;
    private $bairro;
    private $rua;
    private $numero;

    public function __construct(string $cidade, string $bairro, string $rua, string $numero)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }
    
    public function __toString(): string
    {
        return "{$this->rua}, {$this->numero}, {$this->bairro}, {$this->cidade}";
    }

    public function __set($nomeAtributo, $valor)
    {
        $metodo = 'set' . ucfirst($nomeAtributo);
        $this->$metodo($valor);
    }


    final public function getCidade():string
    {
        return $this->cidade;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }


    public function getRua(): string
    {
        return $this->rua;
    }

    public function getNumero():string
    {
        return $this->numero;
    }
}

?>