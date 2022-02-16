<?php
use App\Http\Controllers\Controller;
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

$router->group(['middleware' => 'auth:api'], function($app)
{
    $app->get('/auth', function() {
        return \Illuminate\Support\Facades\Auth::user();
    });
    $app->get('/mail','Controller@EnvioMail');
    $app->post('/emailProcessor', 'JobProcessorController@emailProcessor');
    $app->post('/bulkEmailProcessor', 'JobProcessorController@bulkProcessorEmail');
    $app->get('/emailProcessorFailed', 'JobProcessorController@processFailed');

});


$router->post('/login','AuthController@postLogin');

