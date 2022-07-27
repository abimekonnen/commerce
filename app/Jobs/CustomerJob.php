<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\sendMail;

class CustomerJob 
{
    use Dispatchable,  SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $name;
    public $phone;
    public $email;
    public $comment;

    public function __construct($name,$phone,$email,$comment)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('info@amedegebeya.com')->send(new sendMail('1','2','3','4'));
       
    }
}
