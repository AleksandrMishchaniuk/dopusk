<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    public function testLogin()
    {
        $user = factory(App\Models\User::class)->create();
        $this   ->route('GET', 'login');
        $this   ->type($user->email, 'email')
                ->type($user->password, 'password')
                ->press('Sign In')
                ->seePageIs('/');
    }
}
