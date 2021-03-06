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
  return 'hello world';
});

// $router->get('/transactions', 'DataController@getAll');
//
// $router->get('customer/{id}', 'DataController@getByCustomerId');

$router->group(['prefix' => 'transaction'], function () use ($router) {
  $router->get('customer',  ['uses' =>'DataController@getAll']);

  $router->get('customer/{id}', ['uses' => 'DataController@getByCustomerId']);

});
