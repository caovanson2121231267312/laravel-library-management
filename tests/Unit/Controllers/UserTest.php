<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;
use App\Repositories\User\UserRepositoryInterface;
use Faker\Factory as Faker;
use Mockery;

class UserTest extends TestCase
{
    protected $faker;
    protected $userMock;
    protected $userController;

    public function setUp(): void
    {
        $this->userMock = Mockery::mock(UserRepositoryInterface::class);
        $this->userController = new UserController($this->userMock);
        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->userController);
        Mockery::close();
        parent::tearDown();
    }

    public function test_index_function()
    {
        $this->userMock
            ->shouldReceive('getUser')
            ->once()
            ->andReturn(new Collection);

        $result = $this->userController->index();
        $data = $result->getData();

        $this->assertIsArray($data);
        $this->assertEquals('admin.user.index', $result->getName());
        $this->assertArrayHasKey('users', $data);
    }

    public function test_store_function()
    {
        $this->faker = Faker::create();

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'password' => Hash::make('password'),
            'role_id' => config('const.user'),
        ];

        $this->userMock
            ->shouldReceive('create')
            ->once()
            ->andReturn(true);

        $request = new UserRequest($data);
        $result = $this->userController->store($request);

        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertArrayHasKey('success_title', $result->getSession()->all());
        $this->assertEquals(route('users.index'), $result->headers->get('Location'));
    }

    public function test_update_function()
    {
        $data = [
            'role_id' => config('const.admin')
        ];

        $this->userMock
            ->shouldReceive('update')
            ->once()
            ->andReturn(true);
            
        $request = new Request($data);
        $result = $this->userController->update($request, config('const.test'));

        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('users.index'), $result->headers->get('Location'));
        $this->assertArrayHasKey('success_title', $result->getSession()->all());
    }

    public function test_update_function_fail()
    {
        $data = [
            'role_id' => config('const.admin')
        ];

        $this->userMock
            ->shouldReceive('update')
            ->once()
            ->andThrow(new ModelNotFoundException);

        $request = new Request($data);
        $result = $this->userController->update($request, config('const.test'));
        $view = $result->getName();

        $this->assertEquals('errors.404', $view);;
    }

    public function test_destroy_function()
    {
        $this->userMock
            ->shouldReceive('delete')
            ->with(config('const.test'))
            ->once()
            ->andReturn(true);

        $result = $this->userController->destroy(config('const.test'));

        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('users.index'), $result->headers->get('Location'));
        $this->assertArrayHasKey('success_title', $result->getSession()->all());
    }

    public function test_destroy_function_fail()
    {
        $this->userMock
            ->shouldReceive('delete')
            ->with(config('const.test'))
            ->once()
            ->andThrow(new ModelNotFoundException);

        $result = $this->userController->destroy(config('const.test'));
        
        $this->assertEquals('errors.404', $result->getName());
    }
}
