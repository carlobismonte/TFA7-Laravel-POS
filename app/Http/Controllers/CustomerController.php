<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display all customers
    public function index()
    {
        $customers = Customer::all();

        return view('customers', compact('customers'));
    }

    // Display the Create Customer form
    public function create()
    {
        return view('customers-create');
    }

    // Save a new customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Customer::create($validated);

        return redirect('/customers')
            ->with('success', 'Customer created successfully!');
    }

    
    // Display the Edit Customer form
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers-edit', compact('customer'));
    }

    // Update an existing customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $customer->update($validated);

        return redirect('/customers')
            ->with('success', 'Customer updated successfully!');
    }

}
