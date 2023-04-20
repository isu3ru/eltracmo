<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerProfileTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testIfCustomerProfileCanBeRetrieved()
    {
        // create new user
        $user = User::factory()->create();

        // create customer for the user
        $user->customer()->create(
            [
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'mobile_number' => $this->faker->numerify('##########'),
                'address' => $this->faker->address,
            ]
        );

        // act as the new user
        $this->actingAs($user);

        // get the customer profile
        $response = $this->get(route('customer.profile.get'));
        $response->assertOk();
    }

    /**
     * Test if the customer can update the profile
     */
    public function testIfCustomerProfileCanBeUpdated()
    {
        // create user and act as the user
        $user = User::factory()->create();
        // create customer for the user
        $user->customer()->create(
            [
                'first_name' => 'Isuru',
                'last_name' => 'Ranawaka',
                'address' => 'Kurunegala',
            ]
        );

        // act as the new user
        $this->actingAs($user);

        // test if the customer can update the profile
        $newData = [
            'first_name' => 'Bryan',
            'last_name' => 'Adams',
            'address' => 'Toronto',
            'email' => 'bryan@bryanadams.com',
        ];

        $response = $this->post(route('customer.profile.update'), $newData);

        // assert that the response is ok
        $response->assertStatus(200);

        // get the customer profile
        $response = $this->get(route('customer.profile.get'));
        // check if response has changed details
        $response->assertJsonFragment($newData);
    }
}
