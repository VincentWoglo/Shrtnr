<?php
 class FunctionTest extends \PHPUnit\Framework\TestCase
 {
     /** @test LengthOfGeneratedSlug */
     public function LengthOfGeneratedSlug(){
        $Functions = new Controller\Functions;
        $GeneratedSlug = $Functions->GenerateUrlSlug("7",
         "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", "");
         $Result = strlen($GeneratedSlug);
         $this->assertSame(7, $Result);

     }
 }
?>