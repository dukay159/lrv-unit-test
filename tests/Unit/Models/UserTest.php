<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        unset($this->user);
    }

    public function test_table_name()
    {
        $this->assertEquals('users', $this->user->getTable());
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'username',
            'password',
            'name',
            'avatar',
            'email',
            'address',
            'phone_number',
            'role_id',
        ], $this->user->getFillable());
    }

    public function test_hidden()
    {
        $this->assertEquals([
            'password',
            'remember_token'
        ], $this->user->getHidden()
        );
    }
    
    protected function test_belongsTo_relation($related, $foreignKey, $ownerKey, $model, $relationName)
    {
        $relation = $model->$relationName();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf($related, $relation->getRelated());
        $this->assertEquals($ownerKey, $relation->getOwnerKeyName());
        $this->assertEquals($foreignKey, $relation->getForeignKeyName());
    }

    public function test_role_relation()
    {
        $this->test_belongsTo_relation(
            Role::class,
            'role_id',
            'id',
            $this->user,
            'role'
        );
    }
}






























