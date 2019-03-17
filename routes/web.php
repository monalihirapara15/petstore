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

$router->group(['prefix' => 'api'], function () use ($router) {
	
  $router->get('pets',  ['uses' => 'PetController@showAllPets']);
  $router->get('pets/{id}', ['uses' => 'PetController@showOnePet']);
  $router->post('pets', ['uses' => 'PetController@create']);
  $router->delete('pets/{id}', ['uses' => 'PetController@delete']);
  $router->put('pets/{id}', ['uses' => 'PetController@update']);
});