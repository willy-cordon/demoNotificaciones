<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\Models\JobProcessor;
use App\Services\AbstractServices\Service;
use Illuminate\Support\Facades\Artisan;
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
        $content=$request['content'];
        $sendTo=$request['email'];
        /**
         * * Register Job
         */
        dispatch(new SendEmail($content,$sendTo));

    }

    public function bulkProcessEmail($request)
    {
        $convertRequest = collect($request);
        $convertRequest->each(function($job){
            /**
             * * Register Job
             */
            dispatch(new SendEmail($job->content,$job->sendTo));
        });
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
