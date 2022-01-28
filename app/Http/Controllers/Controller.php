<?php

namespace App\Http\Controllers;


use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Queue\Queue;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class Controller extends BaseController
{
   /**
     *
     * @param  Request  $request
     * @return Response
     */
    public function EnvioMail(Request $request){

        try {
            $content=$request->input('content');
            $sendto=$request->input('sendto');
           // $content='<h1>prueba enviando el contenido como html desde controller</h1>';
            /**
             * * Cola de trabajos
             */
            Mail::to($sendto)->send(new TestMail($content));
//            SendEmail::dispatch($request);
//            Queue::push(new SendEmail($request));
//            SendEmail::
//            dispatch(new SendEmail($content,$sendto));

            return response()->json(['message'=>'ok'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }

    }

}
