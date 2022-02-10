<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    //private $content;
    public $bodyEmail;
    public $subject;
    public $title;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bodyEmail,$subject,$title)
    {
        //$this->content=$content;
        $this->bodyEmail=$bodyEmail;
        $this->subject=$subject;
        $this->title=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): TestMail
    {
        //TODO: recibe html
        return $this->subject($this->subject)
                    ->html($this->bodyEmail);
//                    ->view('emails.mail')
//                    ->with([
//                        'title'   => $this->title,
//                        'bodyEmail'    => $this->name,
//                        'subject' => $this->subject
//                        //'content' =>$this->content
//                    ]);
    }
}
