<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Formacao;
use Alura\Armazenamento\Helper\HtmlViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicaoFormacao implements RequestHandlerInterface
{
    use HtmlViewTrait;

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $formacao = $this->entityManager->find(Formacao::class, $request->getQueryParams()['id']);
    
        $titulo = 'Editar Formação';
        $html = $this->getHtmlFromTemplate('formacoes/formulario.php', compact('titulo', 'formacao'));

        return new Response(200, [], $html);
    }
}