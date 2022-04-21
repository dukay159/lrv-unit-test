<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_database()
    {
        $this->assertDatabaseHas('users', [
            'email'=>'admin@gmail.com1'
        ]);
    }
}
