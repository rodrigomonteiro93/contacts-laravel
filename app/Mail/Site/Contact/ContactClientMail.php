<?php

namespace App\Mail\Site\Contact;

use App\Entities\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactClientMail extends Mailable
{

    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        $subject = "Obrigado pelo contato";

        return $this->subject($subject)
            ->with([
                'data' => $this->contact
            ])
            ->view('vendor.emails.site.contact.client');
    }

}
