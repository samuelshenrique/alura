<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {

});

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie'); 
Route::post('/series/criar', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

Route::get('/entrar', 'EntrarController@index')
    ->name('login');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('registrar', 'RegistroController@store');

Route::get('/logout', 'EntrarController@logout');

Route::get('/buscarSeriesEmJson', function () {
    return \App\Serie::all();
});