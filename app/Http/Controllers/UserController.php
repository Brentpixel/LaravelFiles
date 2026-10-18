<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['id' => 1, 'name' => 'Admin User',    'email' => 'admin@example.com',    'role' => 'Administrator', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Juan Cruz',     'email' => 'juan@example.com',     'role' => 'Editor',        'status' => 'Active'],
            ['id' => 3, 'name' => 'Maria Garcia',  'email' => 'maria@example.com',    'role' => 'Viewer',        'status' => 'Inactive'],
            ['id' => 4, 'name' => 'Pedro Abad',    'email' => 'pedro@example.com',    'role' => 'Editor',        'status' => 'Active'],
            ['id' => 5, 'name' => 'Lucia Bautista','email' => 'lucia@example.com',    'role' => 'Viewer',        'status' => 'Active'],
            ['id' => 6, 'name' => 'Marco Villanueva','email' => 'marco@example.com',  'role' => 'Moderator',     'status' => 'Inactive'],
        ];

        return view('users', compact('users'));
    }
}
