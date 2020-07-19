<?php


namespace App\Tests;


use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    private $contact;

    public function setUp()
    {
        $this->test = new Contact();
        $this->test->newContact('testFirstName', 'testLastName', 'testValidMail@gmail.com', '07.50.95.48.34', 'TestTag');
        $this->empty = new Contact();
        $this->empty->newContact('', '', '', '', '');
        $this->testInvalid = new Contact();
        $this->testInvalid->newContact('testFirstName', 'testLastName', 'testInvalidMail@gmail', '0750fts', 'TestTag');
    }

    public function testFirstNameNotEmpty(){
        $this->assertNotEmpty($this->test->getFirstName());
    }

    public function testFirstNameEmpty(){
        $this->assertEmpty($this->empty->getFirstName());
    }

    public function testFirstNameFormat(){
        $this->assertIsString($this->test->getFirstName());
    }

    public function testLastNameNotEmpty(){
        $this->assertNotEmpty($this->test->getLastName());
    }

    public function testLastNameEmpty(){
        $this->assertEmpty($this->empty->getLastName());
    }

    public function testLastNameFormat(){
        $this->assertIsString($this->test->getLastName());
    }

    public function testEmailNotEmpty(){
        $this->assertNotEmpty($this->test->getEmail());
    }

    public function testEmailEmpty(){
        $this->assertEmpty($this->empty->getEmail());
    }

    public function testEmailFormat(){
        $this->assertIsString($this->test->getEmail());
    }

    public function testEmailValid(){
        $this->assertFalse($this->test->verifEmail($this->getEmail()));//dans fonction verif return false si valide (pour être utilisé dans le controller)
    }

    public function testEmailInvalid(){
        $this->assertNotRegExp($this->testInvalid->verifEmail($this->getEmail()));
    }

    public function testTagNotEmpty(){
        $this->assertNotEmpty($this->test->getTag());
    }

    public function testTagEmpty(){
        $this->assertEmpty($this->empty->getTag());
    }

    public function testTagFormat(){
        $this->assertIsString($this->test->getTag());
    }

    public function testPhoneNumberFormat(){
        $this->assertIsString($this->test->getPhoneNumber());
    }

    public function testValidPhoneNumber(){
        $this->assertFalse($this->test->verifPhoneNumber($this->getPhoneNumber()));//dans fonction verif return false si valide (pour être utilisé dans le controller)

        $this->test->setPhoneNumber('+33323000000');
        $this->assertFalse($this->test->verifPhoneNumber($this->getPhoneNumber()));//dans fonction verif return false si valide (pour être utilisé dans le controller)

        $this->test->setPhoneNumber('03-23-00-00-00');
        $this->assertFalse($this->test->verifPhoneNumber($this->getPhoneNumber()));//dans fonction verif return false si valide (pour être utilisé dans le controller)
    }

    public function testInvalidPhoneNumber(){
        $this->assertFalse($this->testInvalid->verifPhoneNumber($this->getPhoneNumber()));//dans fonction verif return false si valide (pour être utilisé dans le controller)
    }
    }
}
