<?php

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


#  Rutas del modulo types

$router->get('/types', [
    'as' => 'types.index',
    'uses' => 'TypeController@index',
]);

$router->post('/types', [
    'as' => 'Types.create',
    'uses' => 'TypeController@create'
]);

$router->put('/types/{id}',[
    'as' => 'Types.update',
    'uses' => 'TypeController@update'
]);

$router->delete('/types/{id}', [
    'as' => 'Types.delete',
    'uses' => 'TypeController@delete'
]);

# Rutas del modulo car

$router->get('/cars',[
    'as' => 'cars.index',
    'uses' => 'CarController@index'
]);

$router->post('/cars',[
    'as' => 'cars.create',
    'uses' => 'CarController@create'
]);

$router->put('/cars/{id}',[
    'as' => 'cars.update',
    'uses' => 'CarController@update'
]);

$router->delete('/cars/{id}',[
    'as' => 'cars.delete',
    'uses' => 'CarController@delete'
]);