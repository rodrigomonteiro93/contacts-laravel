<?php

namespace App\Jobs;

use App\Mail\Site\Contact\ContactClientMail;
use App\Mail\Site\Contact\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class contact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $contact;

    //limit tentativas
    public $tries = 3;

    public function __construct(\App\Entities\Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //email admin
        Mail::to(env('MAIL_FROM_ADDRESS'))->queue(new ContactMail($this->contact));
        //email client
        return Mail::to($this->contact)->queue(new ContactClientMail($this->contact));
    }
}
