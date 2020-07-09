<?php

namespace Alura\Cursos\Controller;

class ControllerComHtml
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): void
    {
        extract($dados);
        ob_start();
        require __DIR__ . '/../View/' . $caminhoTemplate;
        $html = ob_get_clean();

        echo $html;
    }

    public function getRenderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require __DIR__ . '/../View/' . $caminhoTemplate;
        $html = ob_get_clean();

        return $html;
    }
}