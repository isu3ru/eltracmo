<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CustomerAuthTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * Test if the customer can register
     */
    public function testIfACustomerCanRegister()
    {
        $response = $this->postJson('/api/customer/register', [
            'name' => "Isuru Ranawaka",
            'email' => "isu3ru@gmail.com",
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);
    }

    /**
     * Test if the customer can login
     */
    public function testIfACustomerCanLogIn()
    {
        // create new user
        User::create([
            'name' => 'Isuru Ranawaka',
            'email' => 'isu3ru@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // check if the user exists
        $response = $this->postJson('/api/customer/login', [
            'email' => 'isu3ru@gmail.com',
            'password' => 'password',
        ]);

        // check if the response is OK
        $response->assertStatus(200);

        // check if token is present
        $response->assertSee('token');
    }

    /**
     * Test if the customer can get the user details
     */
    public function testIfACustomerCanGetTheUserDetails()
    {
        // create new user
        User::create([
            'name' => 'Isuru Ranawaka',
            'email' => 'isu3ru@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // check if the user exists
        $response = $this->postJson('/api/customer/login', [
            'email' => 'isu3ru@gmail.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertSee('token');

        $token = $response->json('token');

        // get the user details
        $user = $this->getJson('/api/customer/user', headers: [
            'Authorization' => 'Bearer ' . $token
        ]);

        $user->assertStatus(200)
            ->assertJson([
                'name' => 'Isuru Ranawaka',
                'email' => 'isu3ru@gmail.com',
            ]);
    }

    /**
     * Test if the customer can logout
     */
    public function testIfACustomerCanLogOut()
    {
        // create new user
        $user = User::create([
            'name' => 'Isuru Ranawaka',
            'email' => 'isu3ru@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // check if the user exists
        $response = $this->postJson('/api/customer/login', [
            'email' => 'isu3ru@gmail.com',
            'password' => 'password',
        ]);
        $token = $response->json('token');

        // logout the user
        $response = $this->postjson('/api/customer/logout', headers: [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertJson([
            'message' => 'Successfully logged out'
        ]);

        // assert if user does not have tokens after logged out
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $user->id,
        ]);
    }

    /**
     * Test if a customer cannot access without a token
     */
    public function testIfACustomerCannotAccessWithoutAToken()
    {
        // get the user details
        $response = $this->getJson('/api/customer/user');

        // check if the response code is 401
        $response->assertStatus(401);
    }
}
