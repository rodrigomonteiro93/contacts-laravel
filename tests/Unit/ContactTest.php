<?php

namespace Tests\Unit;

use App\Entities\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    private $contact;

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

    public function testDatesAttribute()
    {
        $dates = ['created_at', 'updated_at', 'deleted_at'];
        foreach ($dates as $date) {
            $this->assertContains($date, $this->contact->getDates());
        }
        $this->assertCount(count($dates), $this->contact->getDates());
    }

    public function testIncrementing()
    {
        $this->assertTrue($this->contact->incrementing);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->contact = new Contact();
    }
}
