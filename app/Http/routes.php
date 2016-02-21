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

use App\Services\Contracts\TwitterContract;

$app->get('/', function () use ($app) {
    return $app->version();
});
$app->group(['prefix' => 'admin'], function () use ($app) {
  $app->get('users', function ()    {
    // Matches The "/admin/users" URL
  });
});

$app->group(['prefix' => 'word', 'namespace' => 'App\Http\Controllers'], function() use ($app) {
  $app->get('/', 'Controller@word');
  $app->get('category/{category}', 'Controller@word');
  $app->get('feed/{feed}', 'Controller@word');
});

$app->group(['prefix' => 'feed/{feed}', 'namespace' => 'App\Http\Controllers'], function() use ($app) {
  $app->get('/word', 'Controller@word');
  $app->get('/words', 'Controller@word');
  $app->get('/words/{count}', 'Controller@word');
  $app->get('/sentence', 'Controller@word');
  $app->get('/sentences', 'Controller@word');
  $app->get('/sentences{count}', 'Controller@word');
  $app->get('/paragraph', 'Controller@word');
  $app->get('/paragraphs', 'Controller@word');
});

$app->get('/testTwitter', 'Controller@testTwitter');
