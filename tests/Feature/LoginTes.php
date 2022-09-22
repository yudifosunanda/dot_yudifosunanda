<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTes extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        // $response = $this->get('/');
        //
        // $response->assertStatus(200);

                $response = $this->postJson('/api/user', ['name' => 'Sally']);

                $response
                    ->assertStatus(201)
                    ->assertJson([
                        'created' => true,
                    ]);
    }
}
