<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login()
    {

        $response = $this->postJson('/api/login', ['email' => 'admin@gmail.com','password'=>'admin'])
        ->assertOk();

        $this->assertArrayHasKey('token',$response->json());
    }

    public function test_email_not_found_or_pass_wrong()
    {

      $response = $this->postJson('/api/login', ['email' => 'wrongemail','password'=>'admin'])
      ->assertUnauthorized();

    }
}
