<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('key:generate');
        Artisan::call('passport:install');

        $user = User::find(1);
        $this->actingAs($user, 'api');
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:fresh');
    }

    /**
     * Test Auth user profile data
     *
     * @return void
     */
    public function testProfileData()
    {
        $response = $this->getJson('/api/me');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'firstname',
                'lastname',
                'phone',
                'email',
                'is_active',
                'role_id',
                'role'
            ]);
    }

    /**
     * Test Update Profile Success
     *
     * @return void
     */
    public function testUpdateProfile()
    {
        $profileData = [
            'id' => 1,
            'firstname' => 'Default Updated',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0722123456',
            'role_id' => '1',
            'is_active' => '1'
        ];

        $response = $this->putJson('/api/profile', $profileData);

        $response
            ->assertStatus(200)
            ->assertJson([
                'msg' => 'Profile updated'
            ]);
    }

    /**
     * Test Update Profile Validation Error
     *
     * @return void
     */
    public function testUpdateProfileValidationError()
    {
        $response = $this->putJson('/api/profile', ['firstname' => $this->faker->firstname]);

        $response->assertStatus(422);
    }

    /**
     * Test Change Password Success
     *
     * @return void
     */
    public function testChangePassword()
    {
        $response = $this->postJson('/api/changepassword', [
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'new_password' => 'admin1234',
            'confirm_password' => 'admin1234'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'msg' => 'Password changed'
            ]);
    }

    /**
     * Test Change Password Validation Error
     *
     * @return void
     */
    public function testChangePasswordValidationError()
    {
        $response = $this->postJson('/api/changepassword', ['password' => 'admin123']);

        $response->assertStatus(422);
    }
}
