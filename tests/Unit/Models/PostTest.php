<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase; 
    public function test_post_be_longs_to_user() 
    { 

    // Dùng factory để tạo user và post 
    $user = \App\Models\User::factory()->create(); 
    $post = \App\Models\Post::factory()->create(['user_id' => $user->id]); 
    
    // Check foreign key 
    $this->assertEquals('user_id', $post->user()->getForeignKeyName()); 
    
    // Check instance of beLongsTo 
    $this->assertInstanceOf(BelongsTo::class, $post->user()); 
    // Check instance of User 
    $this->assertInstanceOf(User::class, $post->user); 
    }
}
