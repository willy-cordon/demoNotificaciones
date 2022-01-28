<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            Mail::to($sendto)->send(new TestMail($content));
           
            return response()->json(['message'=>'ok'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
       
    }

}
