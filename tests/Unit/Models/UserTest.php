<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Role;
use App\Models\BorrowedBook;
use App\Models\Like;
use App\Models\Rate;
use App\Models\Comment;

class UserTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User(); 
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->user = null; 
    }

    public function test_table_name()
    {
        $this->assertEquals('users', $this->user->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'name', 
            'email', 
            'password',
            'phone_number',
            'avatar',
            'role_id',
        ], $this->user->getFillable());
    }

    public function test_hidden()
    {
        $this->assertEquals([
            'password', 
            'remember_token',
        ], $this->user->getHidden());
    }

    public function test_user_beLongsTo_role()
    {
        $relation = $this->user->role();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Role::class, $relation->getRelated());
        $this->assertEquals($this->user->getKeyName(), $relation->getOwnerKeyName());
        $this->assertEquals('role_id', $relation->getForeignKeyName());
    }

    public function test_user_has_many_borrowedBooks()
    {
        $relation = $this->user->borrowedBooks();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(BorrowedBook::class, $relation->getRelated());
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }

    public function test_user_has_many_likes()
    {
        $relation = $this->user->likes();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Like::class, $relation->getRelated());
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }

    public function test_user_has_many_rates()
    {
        $relation = $this->user->rates();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Rate::class, $relation->getRelated());
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }

    public function test_user_has_many_comments()
    {
        $relation = $this->user->comments();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Comment::class, $relation->getRelated());
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }
}
