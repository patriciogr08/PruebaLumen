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

$router->group([], function () use ($router) {

    $router->group(['prefix' => 'api'], function () use ($router) {
        $router->post('login', 'Security\AuthController@login');
        $router->post('logout', 'Security\AuthController@logout');

        $router->group(['middleware' => 'auth'], function () use ($router) {
            $router->get('factura', 'FacturaController@listarFacturasDetalle');
            $router->get('factura/{id}', 'FacturaController@listarFacturaDetalle');
            $router->post('postfactura', 'FacturaController@insertar');
            $router->put('putfactura', 'FacturaController@actualizar');
            $router->delete('delfactura/{id}', 'FacturaController@eliminar');
        });
    });        
});