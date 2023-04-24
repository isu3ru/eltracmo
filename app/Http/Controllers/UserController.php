<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'nullable',
            'mobile_number' => [
                'nullable', 'numeric',
                'regex:/^((0)|7{1}[0-9]{1}[0-9]{7})|(\+947{1}[0-9]{1}[0-9]{7})$/i',
                'unique:users,mobile_number'
            ],
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'email_address' => 'required|email',
            'address' => 'nullable',
        ]);

        $user = User::create([
            'name' => $validated['firstname'] . ' ' . $validated['lastname'],
            'mobile_number' => $validated['mobile_number'],
            'password' => Hash::make($validated['password']),  
            'email' => $validated['email_address'],
            'address' => $validated['address'], //no db column for address
        ]);

        return redirect()->route('users.view')
            ->with('success', 'New user created successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.view')
            ->with('success', 'User account deleted successfully.');
    }

    public function update(User $user)
    {
        $users = User::all();

        return view('users.edit', compact('user', 'users'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'nullable',
            'mobile_number' => [
                'nullable', 'numeric',
                'regex:/^((0)|7{1}[0-9]{1}[0-9]{7})|(\+947{1}[0-9]{1}[0-9]{7})$/i',
                'unique:users,mobile_number'
            ],
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'email_address' => 'required|email',
            'address' => 'nullable',
        ]);

        $user->update([
            'name' => $validated['firstname'] . ' ' . $validated['lastname'],
            'mobile_number' => $validated['mobile_number'],
            'password' => Hash::make($validated['password']),  
            'email' => $validated['email_address'],
            'address' => $validated['address'], //no db column for address
        ]);

        return redirect()->route('users.view')
            ->with('success', 'User updated successfully.');
    }
}
