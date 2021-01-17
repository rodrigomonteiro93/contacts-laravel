<?php

namespace Tests\Unit;

use App\Entities\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testData()
    {
        $contact = new Contact();

        $expected = [
            'name',
            'email',
            'phone',
            'file',
            'message',
            'ip'
        ];

        $arrayCompare = array_diff($expected, $contact->getFillable());

        $this->assertEquals(0, count($arrayCompare));

    }
}
