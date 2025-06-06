<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Formacao;
use Alura\Armazenamento\Helper\HtmlViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercaoFormacao implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private EntityRepository $formacoesRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->formacoesRepository = $entityManager->getRepository(Formacao::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $formacao = new Formacao();
        $titulo = 'Cadastrar Formação';
        $html = $this->getHtmlFromTemplate('formacoes/formulario.php', compact('titulo', 'formacao'));
        return new Response(200, [], $html);
    }
}