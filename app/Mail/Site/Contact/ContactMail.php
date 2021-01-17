<?php

namespace App\Mail\Site\Contact;

use App\Entities\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->subject('Novo contato recebido pelo site')
            ->with(['data' => $this->contact])
            ->view('vendor.emails.site.contact.admin');
    }

}
