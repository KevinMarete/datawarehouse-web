<?php

namespace Tests\Feature;

use App\Models\County;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;

use Tests\TestCase;

class CountyTest extends TestCase
{
    use RefreshDatabase;

    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user, 'api');
    }

    public function tearDown(): void
    {
        Artisan::call('migrate:fresh');
    }

    /**
     * Test required fields when adding county
     *
     * @return void
     */
    public function testRequiredFieldsAddingCounty()
    {
        $this->json('POST', 'api/county', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                ]
            ]);
    }

    /**
     * Test county added successfully
     *
     * @return void
     */
    public function testCountyAddedSuccessfully()
    {
        $countyData = [
            'name' => 'Nairobi',
        ];

        $this->postJson('api/county', $countyData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                "name" => "Nairobi"
            ]);
    }

    /**
     * Test county listed successfully
     *
     * @return void
     */
    public function testCountyListedSuccessfully()
    {
        County::factory()->create([
            'name' => 'Mombasa'
        ]);

        $this->json('GET', 'api/county', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                [
                    "id" => 1,
                    "name" => "Nairobi",
                ],
                [
                    "id" => 2,
                    "name" => "Mombasa",
                ]
            ]);
    }

    /**
     * Test county retrieved successfully
     *
     * @return void
     */
    public function testCountyRetrievedSuccessfully()
    {
        $this->json('GET', 'api/county/1', [], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Nairobi',
            ]);
    }

    /**
     * Test county updated successfully
     *
     * @return void
     */
    public function testCountyUpdatedSuccessfully()
    {
        $payload = [
            'name' => 'Nairobi Updated',
        ];

        $this->putJson('api/county/1', $payload, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Nairobi Updated'
            ]);
    }

    /**
     * Test county deleted successfully
     *
     * @return void
     */
    public function testCountyDeletedSuccessfully()
    {
        $this->json('DELETE', 'api/county/1', [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
