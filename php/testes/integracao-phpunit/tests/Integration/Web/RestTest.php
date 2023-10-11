<?php

namespace Alura\Tests\Integration\Web;

use PHPUnit\Framework\TestCase;

class RestTest extends TestCase
{
    public function testApiRestDeveRetornarArrayDeLeiloes()
    {
        $resposta = file_get_contents('http://127.0.0.1:8080/rest.php');

        $this->assertStringContainsString('200 OK', $http_response_header[0]);
        $this->assertIsArray(json_decode($resposta));
    }
}