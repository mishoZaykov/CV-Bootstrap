<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCreation()
    {
        $userData = [
            'name' => 'Test1',
            'email' => 'test1@abv.bg',
            'phone_number' => '1234567890',
            'password' => 'password123',
        ];

        $response = $this->post(route('admin.user.store'), $userData);

        $response->assertStatus(302);
    }

    public function testUserUpdate()
    {
        $user = User::factory()->create([
            'name' => 'Test2',
            'email' => 'test2@abv.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('password123'),
        ]);

        $userData = [
            'name' => 'Test3',
            'email' => 'test3@abv.com',
            'phone_number' => '9876543210',
            'password' => 'newpassword123',
        ];

        $response = $this->post(route('admin.user.update', ['id' => $user->id]), $userData);

        $response->assertStatus(302);
    }


    public function testUserEdit()
    {
        $user = User::factory()->create([
            'name' => 'Test4',
            'email' => 'test4@abv.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('password123'),
        ]);

        $userData = [
            'name' => 'Test5',
            'email' => 'test5@abv.com',
            'phone_number' => '9876543210',
            'password' => 'newpassword123',
        ];

        $response = $this->get(route('admin.user.update', ['id' => $user->id]), $userData);

        $response->assertStatus(302);
    }

    public function testUserDeletion()
    {
        $user = User::factory()->create([
            'name' => 'Test6',
            'email' => 'test6@abv.com',
            'phone_number' => '1234567890',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->get(route('admin.user.destroy', ['id' => $user->id]));

        $response->assertStatus(302);
    }
}
