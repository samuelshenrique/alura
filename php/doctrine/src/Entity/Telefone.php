<?php

namespace Alura\Doctrine\Entity;

/**
 * @Entity
 */


class Telefone
{
    /**
     * @id
     * @GeneratedValue
     * @Column(type="integer")
     */

     private $id;
     /**
      * @Column(type="string")
      */
     private string $numero;
     /**
      * @ManyToOne(targetEntity="Aluno")
      */
     private $aluno;


     public function getId(): int
     {
        return $this->id;
     }

     public function getNumero(): string
     {
        return $this->numero;
     }

     public function setId(int $id): void
     {
         $this->id = $id;
     }

     public function setNumero($numero): void
     {
         $this->numero = $numero;
     }

     public function setAluno(Aluno $aluno): void
     {
         $this->aluno = $aluno;
     }

     public function getAluno(): Aluno
     {
         return $this->aluno;
     }
}