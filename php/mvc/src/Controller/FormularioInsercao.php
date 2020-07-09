<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends ControllerComHtml implements InterfaceControladorRequisicao
{
    public function __construct() 
    {

    }

    public function processaRequisicao(): void
    {

        $this->renderizaHtml(
            'cursos/formulario.php',
            [
                'titulo' => 'Novo curso'
            ]
            );
    }
}
