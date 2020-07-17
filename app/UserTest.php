<?php
// namespace Test;

use PHPUnit\Framework\TestCase;

include 'User.php';

class UserTest extends TestCase
{
    private $testValid;
    private $testInvalid;

    public function testValid(){
        $this->testValid = new User('testValNom', 'testValPrenom', 'testVal@gmail.com', 30);
        $this->assertTrue($this->testValid->isValid());
    }

    public function testInvalid(){
        $this->testInvalid = new User('testInValNom', 'testInValPrenom', 'testInValMail', 12);
        $this->assertTrue($this->testInvalid->isValid());
    }

    public function testEmailValid(){
        $this->testValid = new User('testValNom', 'testValPrenom', 'testVal@gmail.com', 30);
        $this->assertNotEmpty($this->testValid->getEmail());
    }

    public function testPrenomValid(){
        $this->testValid = new User('testValNom', 'testValPrenom', 'testVal@gmail.com', 30);
        $this->assertNotEmpty($this->testValid->getPrenom());
    }

    public function testNomValid(){
        $this->testValid = new User('testValNom', 'testValPrenom', 'testVal@gmail.com', 30);
        $this->assertNotEmpty($this->testValid->getNom());
    }

    public function testAgeValid(){
        $this->testValid = new User('testValNom', 'testValPrenom', 'testVal@gmail.com', 30);
        $this->assertLessThan($this->testValid->getAge(), 13);
    }



    public function testEmailInvalid(){
        $this->testInvalid = new User( 'invalNom', 'invalPrenom','inVal', 13);
        $this->assertNotEmpty($this->testInvalid->getEmail());
    }

    public function testPrenomInvalid(){
        $this->testInvalid = new User( 'invalNom', '','inVal@gmail.com', 13);
        $this->assertNotEmpty($this->testInvalid->getPrenom());
    }

    public function testNomInvalid(){
        $this->testInvalid = new User( '', 'invalPrenom','inVal@gmail.com', 13);
        $this->assertNotEmpty($this->testInvalid->getNom());
    }

    public function testAgeInvalid(){
        $this->testInvalid = new User( 'invalNom', 'invalPrenom','inVal@gmail.com', 9);
        $this->assertLessThan($this->testInvalid->getAge(), 13);
    }
}