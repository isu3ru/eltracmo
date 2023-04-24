<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Get customer profile
     */
    public function getProfileByCurrentUser(Request $request)
    {
        $loggedInUser = $request->user();
        return response()->json(CustomerResource::make($loggedInUser->customer));
    }

    /**
     * Update customer profile
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'address' => 'nullable|string',
        ]);

        // get the customer
        $customer = $request->user()->customer;

        $data = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'address' => $validated['address'],
        ];

        // get photo
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            // save photo
            $data['photo'] = $photo->store('public/customer');
        }

        // update customer
        $customer->update($data);

        $customer->user()->update([
            'email' => $validated['email'],
        ]);

        return response()->json([
            'message' => 'Successfully updated customer profile!',
            'status' => 'success',
        ]);
    }

    /**
     * Collects the data for the customer to download
     * store the data in a file in the storage folder
     * and provide a link to download the data
     */
    public function downloadInformation()
    {
        # code...
    }

    /**
     * Receive customer account delete request
     */
    public function deleteAccount()
    {
    }

    /**
     * admin customer register
     *
     * @return void
     */
    public function view()
    {
        return view('customers.index');
    }
}
