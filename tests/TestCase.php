<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}


// $table->id();
// $table->string('name');
// $table->string('username');
// $table->integer('role_id');
// $table->string('phone');
// $table->string('email')->unique();
// $table->string('password');
// $table->string('gender');
// $table->boolean('is_active');
// $table->timestamps();

// 'name',
// 'username',
// 'role_id',
// 'phone',
// 'email',
// 'gender',
// 'is_active',
// 'password',
