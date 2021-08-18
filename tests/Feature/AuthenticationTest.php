<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('key:generate');
        Artisan::call('passport:install');

        $user = User::factory()->create();
        $this->actingAs($user, 'api');
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:fresh');
    }

    /**
     * Test login failed no user
     *
     * @return void
     */
    public function testLoginFailedNoUser()
    {
        $loginData = ['email' => 'sample@test.com', 'password' => 'sample123'];

        $this->postJson('api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(404)
            ->assertJson([
                'error' => 'User does not exist'
            ]);
    }

    /**
     * Test login successful login
     *
     * @return void
     */
    public function testLoginSuccessful()
    {
        $loginData = ['email' => 'admin@gmail.com', 'password' => 'admin123'];

        $this->postJson('api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "token"
            ]);

        $this->assertAuthenticated();
    }
}
