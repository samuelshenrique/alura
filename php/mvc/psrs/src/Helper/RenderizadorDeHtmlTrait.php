<?php

namespace Alura\Cursos\Helper;

trait RenderizadorDeHtmlTrait
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): void
    {
        extract($dados);
        ob_start();
        require __DIR__ . '/../View/' . $caminhoTemplate;
        $html = ob_get_clean();

        echo $html;
    }
}