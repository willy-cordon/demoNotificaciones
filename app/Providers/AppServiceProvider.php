<?php

namespace App\Providers;

use App\Models\JobProcessor;
use App\Services\CallbackResponseService;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Tymon\JWTAuth\Providers\LumenServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Queue::before(function (JobProcessing $event) {
            Log::debug('BEFOREEE');
            Log::debug(json_encode($event->job->getJobId()));
//             $event->connectionName();
//             $event->job();
//             $event->job->payload();
        });

        Queue::after(function (JobProcessed $event) {

            $updateProcess = JobProcessor::query();
            $updateProcess ->where('uuid','=',$event->job->uuid());
            $updateProcess ->update(['status'=> 'Processed']);

//            $serviceCallback = new CallbackResponseService();
//            $serviceCallback->responseClient($updateProcess->id);


        });

        Queue::failing(function (JobFailed $event) {

            $updateProcess = JobProcessor::query();
            $updateProcess ->where('uuid','=',$event->job->uuid());
            $updateProcess ->update(['status'=> 'Failed']);

        });
    }
}
