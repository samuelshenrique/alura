<?php

namespace Alura\Cursos\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Logout implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $resposta = new Response('302', ['Location' => '/login']);

        if(!isset($_SESSION['logado'])) {
            return $resposta;
        }

        session_destroy();
        return $resposta;
    }
}