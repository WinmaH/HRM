<?php



//require_once "../application/controllers/Login.php;
//include ("../application/controllers/Login.php");
require_once __DIR__ . '/../application/controllers/Login.php';



class LoginTest extends PHPUnit_Framework_TestCase
{

    public function testLogin()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }
}