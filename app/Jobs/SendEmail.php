<?php

namespace App\Jobs;

use App\Mail\TestMail;
use App\Models\JobProcessor;
use Illuminate\Bus\Dispatcher;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;


class SendEmail extends Job
{
//    use InteractsWithQueue, Queueable, SerializesModels;

    //private $content;
    private $bodyEmail;
    private $sendTo;
    private $subject;
    private $title;
    private $idProcess;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($bodyEmail,$sendTo,$subject,$title,$idUser)
    {

        $this->bodyEmail = $bodyEmail;
        $this->sendTo = $sendTo;
        $this->subject = $subject;
        $this->title = $title;
        $this->idProcess = $idUser;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
         * * Update Process for uuid
         */
        $updateProcess = JobProcessor::query();
        $updateProcess ->where('id','=',$this->idProcess);
        $updateProcess ->update(['uuid'=>$this->job->uuid()]);

        /**
         * ! Todo manejar los intentos de cada proceso
         */

        $email = new TestMail($this->bodyEmail,$this->subject,$this->title);
        Mail::to($this->sendTo)->send($email);

    }

    public function failed(\Exception  $e)
    {
//        Log::debug('fallo el handle');
//        Log::debug($e);
//        Log::debug($this->job->getQueue());

    }


}
