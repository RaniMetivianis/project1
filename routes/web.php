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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/biodata', function() {
    return 'Nama: Rani Metivianis NIM: 185150700111025';
});
//read
$router->get('/products', 'ProductController@index');

//read by id
$router->get('/products/{id}', 'ProductController@show'); 

//post 
$router->post('/products', 'ProductController@store');

//delete
$router->delete('/products/{id}', 'ProductController@destroy');

//update
$router->put('/products/{id}', 'ProductController@update');