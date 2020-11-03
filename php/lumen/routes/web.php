<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/**
 * @var Router $router
 */

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(
    [
        'prefix' => 'api',
        'middleware' => 'autenticador'  
    ],
    function () use ($router) {
        //series
        $router->get('series', 'SeriesController@index');
        $router->get('series/{id}', 'SeriesController@show');
        $router->post('series', 'SeriesController@store');
        $router->put('series/{id}', 'SeriesController@update');
        $router->delete('series/{id}', 'SeriesController@destroy');
        $router->get('series/{serieId}/episodios', 'EpisodiosController@buscaPorSerie');
        
        //episodios
        $router->get('episodios', 'EpisodiosController@index');
        $router->get('episodios/{id}', 'EpisodiosController@show');
        $router->post('episodios', 'EpisodiosController@store');
        $router->put('episodios/{id}', 'EpisodiosController@update');
        $router->delete('episodios/{id}', 'EpisodiosController@destroy');
        
        //auth
    }
);


$router->get('/api/login', 'TokenController@gerarToken');

