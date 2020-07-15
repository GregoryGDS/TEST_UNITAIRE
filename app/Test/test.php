<?php

include 'calculatrice/calculatrice.php';

class Test
{
    private $test;

    public function setUp() {
        $this->test = new calculeruler(25, 5);
    }

    public function testAdd(){
        $this->assertEquals(3, $this->test->add());
    }

    public function testSub(){
        $this->assertEquals(12, $this->test->sub());
    }

    public function testMul(){
        $this->assertEquals(10, $this->test->mul());
    }

    public function testDiv(){
        $this->assertEquals(5, $this->test->div());
    }

}