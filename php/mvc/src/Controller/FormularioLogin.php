<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;

class FormularioLogin implements InterfaceControladorRequisicao
{
    use RenderizadorDeHtmlTrait;
    
    public function __construct()
    {

    }

    public function processaRequisicao(): void
    {
        $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login'
        ]);
    }
}