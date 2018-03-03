<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 3/1/2018
 * Time: 1:07 PM
 */

require_once "../application/third_party/phpwebdriver/WebDriver.php";
require_once "../application/third_party/phpwebdriver/WebDriverBase.php";
require_once "../application/third_party/phpwebdriver/WebDriverException.php";
require_once "../application/third_party/phpwebdriver/WebDriverResponseStatus.php";
require_once "../application/third_party/phpwebdriver/WebElement.php";

class LoginTest extends PHPUnit_Framework_TestCase
{


    public function testEmpty()
    {


        $webdriver=new WebDriver("localhost","4444");
         $webdriver->connect("firefox");
         $webdriver->get("http://google.com");

         $element=$webdriver->findElementBy(LocatorStrategy::name,"q");
         if($element){
             $element->sendKeys(array("php webdriver"));
         }
             $element->submit();




    }
}