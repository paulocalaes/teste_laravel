<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoController@lista'); //define rota, chama o controller Produto e a função lista

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+'); //define rota, chama o controller Produto e a função mostra passando a variavel id

Route::get('/produtos/novo', 'ProdutoController@novo'); //define rota, chama o controller Produto e a função novo
Route::post('/produtos/adiciona', 'ProdutoController@adiciona'); //define rota, chama o controller Produto e a função novo
Route::get('/produtos/json', 'ProdutoController@listaJson'); //define rota, chama o controller Produto e a função lista
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/produtos/editar/{id}', 'ProdutoController@editar')->where('id', '[0-9]+');
Route::post('/produtos/edita/{id}', 'ProdutoController@edita'); //define rota, chama o controller Produto 

Route::get('home', 'HomeController@index');
/*Route::controllers([
'auth' => 'Auth\LoginController',
//'password' => 'Auth\PasswordController',
]);*/
Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::get('/login', 'LoginController@login');