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
    private $bodyEmail;
    private $sendTo;
    private $subject;
    private $title;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($bodyEmail,$sendTo,$subject,$title)
    {

        $this->bodyEmail = $bodyEmail;
        $this->sendTo = $sendTo;
        $this->subject = $subject;
        $this->title = $title;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        $email = new TestMail($this->bodyEmail,$this->subject,$this->title);
        Mail::to($this->sendTo)->send($email);

    }


}
