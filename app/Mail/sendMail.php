<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Jobs\CustomerJob;
use Illuminate\Contracts\Queue\ShouldBeUnique;


class sendMail extends Mailable 
{
    use  SerializesModels;
    public $name;
    public $phone;
    public $email;
    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$phone,$email,$comment)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->email);
        return $this->markdown('mail');
        
    }
}
