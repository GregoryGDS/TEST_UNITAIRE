<?php
// namespace Test;

use PHPUnit\Framework\TestCase;

include 'User.php';

class UserTest extends TestCase
{
    private $testValid;
    private $testInvalid;
    private $testInvalidEmail;
    private $testInvalidPrenom;
    private $testInvalidNom;
    private $testInvalidAge;

    
    public function setUp():void{
        $this->testValid = new User('testValNom', 'testValPrenom', 'testVal@gmail.com', 30);
        $this->testInvalid = new User('testInValNom', 'testInValPrenom', 'testInValMail', 12);
        $this->testInvalidEmail = new User( 'invalNom', 'invalPrenom','inVal', 13);
        $this->testInvalidPrenom = new User( 'invalNom', '','inVal@gmail.com', 13);
        $this->testInvalidNom = new User( '', 'invalPrenom','inVal@gmail.com', 13);
        $this->testInvalidAge = new User( 'invalNom', 'invalPrenom','inVal@gmail.com', 9);
    }
    
    public function testValid(){
        $this->assertTrue($this->testValid->isValid());
    }

    public function testInvalid(){
        
        $this->assertTrue($this->testInvalid->isValid());
    }

    public function testEmailValid(){
        $this->assertNotEmpty($this->testValid->getEmail());
    }

    public function testPrenomValid(){
        $this->assertNotEmpty($this->testValid->getPrenom());
    }

    public function testNomValid(){
        $this->assertNotEmpty($this->testValid->getNom());
    }

    public function testAgeValid(){
        $this->assertLessThan($this->testValid->getAge(), 13);
    }



    public function testEmailInvalid(){
        $this->assertNotEmpty($this->testInvalidEmail->getEmail());
    }

    public function testPrenomInvalid(){
        $this->assertNotEmpty($this->testInvalidPrenom->getPrenom());
    }

    public function testNomInvalid(){
        $this->assertNotEmpty($this->testInvalidNom->getNom());
    }

    public function testAgeInvalid(){   
        $this->assertLessThan($this->testInvalidAge->getAge(), 13);
    }
}