<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;

class FormularioInsercao implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;
    
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
