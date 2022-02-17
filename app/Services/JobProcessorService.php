<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\Models\JobProcessor;
use App\Models\User;
use App\Services\AbstractServices\Service;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class JobProcessorService
 * @package App\Services
 */
class JobProcessorService extends Service
{
    protected function setModel(): void
    {
        $this->model = JobProcessor::class;
    }


    public function processEmail($request)
    {
        //Todo: recibir mails de copia (bcc)
        $title=$request['title'];
        $name=$request['name'];
        $sendTo=$request['email'];
        $subject=$request['subject'];




        /**
         * * Register Job
         */
        dispatch(new SendEmail($name,$sendTo,$subject,$title));

        $create = $this->model::create([
            'title'=>$title,
            'status'=>'processing'
        ]);
        $create->data = $request;
        $create->save();

    }

    public function bulkProcessEmail($request): array
    {


        $convertRequest = collect($request);
        $arr = [];
        $convertRequest->each(function($job) use(&$arr){

            $create = JobProcessor::create([
                'title'=>$job['title'],
                'status'=>'processing'
            ]);
            $create->data = $job;
            $create->user()->associate(User::find(Auth::id()))->save();
            /**
             * * Register Job
             * ? ->onQueue('priority')
             * ?  php artisan queue:work --queue=high (para ejecutar las prioridades declaradas)
             */
            dispatch(new SendEmail($job['bodyEmail'],$job['email'],$job['subject'],$job['title'],$create->id));

            $arr[$job['title']][] ='successful process';


        });
        return $arr;
    }

    public function pushedBackQueue():void
    {
        /**
         * ! Back job failed
         * * Execute from cron Job
         */
        Artisan::call('queue:retry all');
        Log::info('has been pushed back to the queue!');
    }
}
