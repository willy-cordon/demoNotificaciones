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

$router->get('/test', function () use ($router) {
    return response(
        [
            [  "title"=>"Notificacion Success",

                "name"=>"Aprobacion de licencia2",

                "email"=>"cordonwilly24@gmail.com",

                "subject"=>"Prueba de notificaciones"],
            [ "title"=>"Notificacion Success",

                "name"=>"Aprobacion de licencia2",

                "email"=>"cordonwilly24@gmail.com",

                "subject"=>"Prueba de notificaciones"
            ]
        ]
       );
});

$router->get('/mail','Controller@EnvioMail');
$router->post('/emailProcessor', 'JobProcessorController@emailProcessor');
$router->post('/bulkEmailProcessor', 'JobProcessorController@bulkProcessorEmail');
$router->get('/emailProcessorFailed', 'JobProcessorController@processFailed');
