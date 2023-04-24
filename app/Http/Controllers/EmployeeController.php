<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'nullable',
            'mobile_number' => [
                'nullable', 'numeric',
                'regex:/^((0)|7{1}[0-9]{1}[0-9]{7})|(\+947{1}[0-9]{1}[0-9]{7})$/i',
                'unique:employees,mobile_number'
            ],
            'email_address' => 'required|email',
        ]);

        Employee::create([
            'name' => $validated['firstname'] . ' ' . $validated['lastname'],
            'mobile_number' => $validated['mobile_number'],
            'address' => $validated['email_address'],
        ]);

        return redirect()->route('employees.view')
            ->with('success', 'New employee created successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.view')
            ->with('success', 'Employee deleted successfully.');
    }

    public function update(Employee $employee)
    {
        $employees = Employee::all();

        return view('employees.edit', compact('employee', 'employees'));
    }

    public function updateUser(Request $request, Employee $employee)
    {
        
    }
}
