<?php

namespace App\Jobs;

use App\Mail\TestMail;
use Illuminate\Bus\Dispatcher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $content;
    protected $sendTo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content,$sendTo)
    {
        //
        $this->content = $content;
        $this->sendTo = $sendTo;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new TestMail($this->content);
        Mail::to($this->sendTo)->send($email);
    }


}
