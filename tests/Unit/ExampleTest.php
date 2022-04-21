<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_has_user()
{
    $users = new User(['Lena', 'Misa', 'Leona']);
    $this->assertTrue($users->has('Lena'));
    $this->assertFalse($users->has('Minh Minh'));
}

    public function test_equal_empty()
    {
        $name1 = " "; 
        $name2 = "Duc Anh"; 
        
        $this->assertEquals($name1, $name2); 
        $this->assertEmpty($name1);
    }

    public function test_contain_cars()
    {
        $cars = ['Audi', 'Maybach', 'BMW'];
         
        $this->assertCount(3, $cars);
        $this->assertContains('Maybach', $cars);
    }


}
