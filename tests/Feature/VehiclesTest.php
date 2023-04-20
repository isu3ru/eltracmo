<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehiclesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test if a vehicle can be registered for a customer
     */
    public function testAVehicleCanBeRegistered()
    {
        $response = $this->postJson(route('customer.register'), [
            'first_name' => "Isuru",
            'last_name' => "Ranawaka",
            'mobile_number' => "0712912826",
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);

        // act as the user
        $user = User::where('mobile_number', '0712912826')->first();
        $this->actingAs($user);

        // register a vehicle
        $response = $this->postJson(route('customer.vehicles.store'), [
            'title' => 'My Toyota Corolla',
            'make' => 'Toyota',
            'model' => 'Corolla',
            'edition' => 'XLI',
            'registered_year' => '2019',
            'registration_number' => 'ABC-1234',
            'current_mileage' => 10000,
            'color' => 'White',
            'remarks' => 'This is a test vehicle',
        ]);

        $response->assertStatus(201);
    }

    public function testIfCustomerVehiclesCanBeListed()
    {
        $response = $this->postJson(route('customer.register'), [
            'first_name' => "Isuru",
            'last_name' => "Ranawaka",
            'mobile_number' => "0712912826",
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);

        // act as the user
        $user = User::where('mobile_number', '0712912826')->first();
        $this->actingAs($user);

        // register 5 vehicles as an array
        $vehicles = Vehicle::factory()->count(5)->make()->toArray();

        // create each vehicle for the current user
        foreach ($vehicles as $vehicle) {
            $response = $this->postJson(route('customer.vehicles.store'), $vehicle);
            $response->assertStatus(201);
        }

        $response = $this->getJson(route('customer.vehicles.index'));

        $response->assertStatus(200);

        // test if conteins 5 elements in response
        $response->assertJsonCount(5);
    }

    public function checkIfSingleVehicleDetailsCanBeRetrieved()
    {
        # code...
    }

    public function testIfVehicleCanBeUpdated()
    {
        $response = $this->postJson(route('customer.register'), [
            'first_name' => "Isuru",
            'last_name' => "Ranawaka",
            'mobile_number' => "0712912826",
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);

        // act as the user
        $user = User::where('mobile_number', '0712912826')->first();
        $this->actingAs($user);

        // register a vehicle
        $response = $this->postJson(route('customer.vehicles.store'), [
            'title' => 'My Toyota Corolla',
            'make' => 'Toyota',
            'model' => 'Corolla',
            'edition' => 'XLI',
            'registered_year' => '2019',
            'registration_number' => 'ABC-1234',
            'current_mileage' => 10000,
            'color' => 'White',
            'remarks' => 'This is a test vehicle',
        ]);

        $response->assertStatus(201);

        $response = $this->getJson(route('customer.vehicles.index'));

        $response->assertStatus(200);

        // get the data
        $data = $response->json();

        // set new updated data
        $data['title'] = 'My Toyota Corolla XLI';
        $data['current_mileage'] = 20000;

        // check if data can be updated
        $response = $this->postJson(route('customer.vehicles.update'), $data);

        $response->assertStatus(200);

        // check if response contains the new data
        $response->assertJson([
            'title' => 'My Toyota Corolla XLI',
            'current_mileage' => 20000,
        ]);
    }

    public function testIfVehicleCanBeDeleted()
    {
        # code...
    }
}
