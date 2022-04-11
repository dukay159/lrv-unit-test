<?php 

namespace Tests\Unit\Repositories; 

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker; 

class PostRepositoryTest extends TestCase
{ 
    protected $postRepository; 
    public function setUp() : void 
    { 
        parent::setUp(); 
        $this->postRepository = new PostRepository(); 
    }
    public function test_create_post() 
    {
         // create data post 
        $faker = Faker::create(); 
        $postData = [ 
            'title' => $faker->sentence, 
            'content' => $faker->sentence, 
            'user_id' => \App\Models\User::factory()->create()->id, 
        ]; 
        $post = $this->postRepository->create($postData); 
        // Check post created instance of Post 
        $this->assertInstanceOf(Post::class, $post); //Hàm nãy sẽ thực hiện xác định kết quả so sánh có đúng intance mong muốn hay không
        // Check data post exists in the database 
        $this->assertDatabaseHas('posts', $postData);
    }
} 
