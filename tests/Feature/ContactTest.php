<?php

namespace Tests\Feature;

use App\Entities\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{

    use RefreshDatabase;

    public function testStore()
    {
        $faker = \Faker\Factory::create();
        $file = \Illuminate\Http\UploadedFile::fake()->create('test.txt');

        $response = $this->json('POST', route('contact.store'), [
            'name' => $faker->name,
            'email' => $faker->email,
            'phone' => '(51) 99284-7232',
            'file' => $file,
            'ip' => $faker->ipv4,
            'message' => 'Lorem ipsum dollor'
        ]);

        $id = $response->json('id');
        $data = Contact::where('id', $id)->get();

        $responseTest = $response->json('contact');
        $data = $data->toArray()[0];

        $this->assertEquals($responseTest, $data);
    }

    public function testIndex(){
        $testHome = $this->get('/');
        $testHome->assertStatus(200);
    }

    public function testContactList(){
        $testContacts = $this->get('/meus-contatos');
        $testContacts->assertViewHas('contacts');
        $testContacts->assertStatus(200);
    }
}
