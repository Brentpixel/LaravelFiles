<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            ['id' => 1, 'name' => 'Alice Santos',   'email' => 'alice@example.com',   'phone' => '09171234567', 'city' => 'Manila'],
            ['id' => 2, 'name' => 'Bob Reyes',      'email' => 'bob@example.com',     'phone' => '09181234567', 'city' => 'Cebu'],
            ['id' => 3, 'name' => 'Carol Dela Cruz', 'email' => 'carol@example.com',  'phone' => '09191234567', 'city' => 'Davao'],
            ['id' => 4, 'name' => 'David Lim',      'email' => 'david@example.com',   'phone' => '09201234567', 'city' => 'Quezon City'],
            ['id' => 5, 'name' => 'Eva Mendoza',    'email' => 'eva@example.com',     'phone' => '09211234567', 'city' => 'Makati'],
            ['id' => 6, 'name' => 'Frank Torres',   'email' => 'frank@example.com',   'phone' => '09221234567', 'city' => 'Pasig'],
        ];

        return view('customers', compact('customers'));
    }
}
