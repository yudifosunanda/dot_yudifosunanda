<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
// use PHPUnit\Framework\TestCase;


class GetDataTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_data_province()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                          ->withSession(['banned' => false])
                          ->get('/');

        $response = $this->getJson('/api/search/provinces/1');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    public function test_get_data_city()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                          ->withSession(['banned' => false])
                          ->get('/');

        $response = $this->getJson('/api/search/cities/1');

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
