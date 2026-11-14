<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of all customers.
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customers_create');
    }

    /**
     * Store a newly created customer in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', 'unique:customers,email'],
            'phone'     => ['nullable', 'string', 'max:30'],
        ]);

        Customer::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone ?? '',
        ]);

        return redirect()->route('customers')
                         ->with('success', 'Customer created successfully.');
    }

    /**
     * Show the form for editing an existing customer.
     */
    public function edit(Customer $customer)
    {
        return view('customers_edit', compact('customer'));
    }

    /**
     * Update the specified customer in the database.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', 'max:255', "unique:customers,email,{$customer->id}"],
            'phone'     => ['nullable', 'string', 'max:30'],
        ]);

        $customer->update([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone ?? $customer->phone,
        ]);

        return redirect()->route('customers')
                         ->with('success', 'Customer updated successfully.');
    }
}
