<?php

namespace Tests\Unit\Http\Controller;

use App\Http\Controllers\UserController;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;
use Mockery;


//use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user, $userMock;

    // public function test_users_index_page_is_rendered_properly()
    // {
    //     $this->userMock = Mockery::mock(User::class); //tạp đối tượng userMock giả lập cả 1 class User(tuy nhiên giả lập đối tượng này không cho phép class được giả lập truy cập sử dụng các method protected.)
    //     // Truyền tham số khi khởi tạo
    //     $this->userMock = Mockery::mock('User::class, [$name, $email]'); //Mock class và chỉ định method. Tức là đối tượng giả lập chỉ có thể giả lập hành vi name và email

    // }

    // public function setUp() : void
    // {
    //     parent::setUp();
    //     $this->mockObject = Mockery::mock(User::class);

    //     $this->controller = new UserControllerTest($this->mockObject);

    // }
    
    // public function tearDown() : void
    // {

    //     Mockery::close();
    //     unset($this->controller);
    //     parent::tearDown();
    // }

    public function test_index_return_view()
    {
        $answerService = Mockery::mock(User::class);
        $controller = new UserController($answerService);
        $request = new Request();

        $view = $controller->index($request);

        $this->assertEquals('answers.index', $view->name());
    }    

}
