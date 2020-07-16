<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    private EntityManagerInterface $entityManager;
    private $repositorioCursos;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos = $this->entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryStrings = $request->getQueryParams();

        $id = filter_var($queryStrings['id'], FILTER_VALIDATE_INT);

        if(is_null($id) || $id === false) {
            return new Response('302', ['Location' => '/listar-cursos']);
        }

        $curso = $this->repositorioCursos->find($id);

        $html = $this->renderizaHtml(
            'cursos/formulario.php',
            [
                'curso' => $curso,
                'titulo' => 'Alterar curso ' . $curso->getDescricao()
            ]
            );

        return new Response('200', [], $html);
        
    }
}