<?php

namespace Tests\Feature;

use App\Entities\Contact;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\Console\Input\Input;
use Tests\TestCase;

class ContactTest extends TestCase
{

    use DatabaseTransactions;

    public function testCreateUser()
    {
        Contact::create([
            'name' => 'Rodrigo monteiro',
            'email' => 'rodrigomonteirodesenv@gmail.com',
            'phone' => '(51) 99284-7232',
            'file' => 'nomedoarquivo.pdf',
            'ip' => '127.0.0.1',
            'message' => 'Lorem ipsum dollor'
        ]);
        $this->assertDatabaseHas('contacts', ['name' => 'Rodrigo monteiro']);
    }

    public function testViews(){
        $testHome = $this->get('/');
        $testHome->assertStatus(200);

        $testContacts = $this->get('/meus-contatos');
        $testContacts->assertViewHas('contacts');
        $testContacts->assertStatus(200);
    }
}
