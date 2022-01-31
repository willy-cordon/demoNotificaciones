<?php

namespace App\Jobs;

use App\Mail\TestMail;
use Illuminate\Bus\Dispatcher;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class SendEmail extends Job
{
//    use InteractsWithQueue, Queueable, SerializesModels;

    //private $content;
    private $name;
    private $sendTo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name,$sendTo)
    {
        //
        Log::debug('handle send mail2');

        //$this->content = $content;
        $this->name = $name;
        $this->sendTo = $sendTo;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Log::debug('handle send mail');
        Log::debug($this->sendTo);
        //Log::debug($this->content);
        //
//        Mail::to($sendto)->send(new TestMail($content));
        //$email = new TestMail($this->content);
        $email = new TestMail($this->name);
        Mail::to($this->sendTo)->send($email);
    }


}
