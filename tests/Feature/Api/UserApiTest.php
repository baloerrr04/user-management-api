<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function testDeleteUserViaApi()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }


    public function testCreateUserValidationFails()
    {
        $invalidUserData = [
            'name' => '', // Empty name
            'email' => 'invalid-email',
            'age' => 'not a number'
        ];

        $response = $this->postJson('/api/users', $invalidUserData);

        $response
            ->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonStructure([
                'success',
                'message',
                'errors' => [
                    'name',
                    'email',
                    'age'
                ]
            ]);
    }

    public function testCreateUserWithDuplicateEmail()
    {
        // Create a user first
        $existingUser = User::factory()->create([
            'email' => 'existing@example.com'
        ]);

        // Try to create another user with same email
        $userData = [
            'name' => 'Another User',
            'email' => 'existing@example.com',
            'age' => 30
        ];

        $response = $this->postJson('/api/users', $userData);

        $response
            ->assertStatus(422)
            ->assertJson([
                'success' => false,
                'message' => 'Validation failed'
            ])
            ->assertJsonStructure([
                'success',
                'message',
                'errors' => [
                    'email'
                ]
            ]);
    }

    public function testGetSpecificUserViaApi()
    {
        $user = User::factory()->create();

        $response = $this->getJson("/api/users/{$user->id}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'User retrieved successfully'
            ])
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'name',
                    'email',
                    'age'
                ]
            ])
            ->assertJsonFragment([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'age' => $user->age
            ]);
    }

    public function testGetNonExistentUser()
    {
        $nonExistentId = 'non-existent-uuid';

        $response = $this->getJson("/api/users/{$nonExistentId}");

        $response
            ->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => 'User not found'
            ]);
    }
}