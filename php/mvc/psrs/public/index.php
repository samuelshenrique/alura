<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';


if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

// session_start();

// if(!isset($_SESSION['logado']) && stripos($caminho, 'login') === false) {
//     header('Location: /login');
// }


$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();



$classeControladora = $rotas[$caminho];


/** @var ContainerInterface $container  */
$container = require __DIR__ . '/../config/dependencies.php';

/**
 * @var RequestHandleInterface @controller
 */

$controller = $container->get($classeControladora);
$response = $controller->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
echo $response->getBody();
