<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // ── TSA3 Developer Profile (must be first) ──────────────────────
            ['username' => 'bverdera',       'full_name' => 'Brent Verdera',     'name' => 'Brent Verdera',     'email' => 'brent@example.com',   'password' => bcrypt('password')],
            // ── TSA1 / TSA2 existing users ──────────────────────────────────
            ['username' => 'admin_user',     'full_name' => 'Admin User',        'name' => 'Admin User',        'email' => 'admin@example.com',   'password' => bcrypt('password')],
            ['username' => 'jcruz',          'full_name' => 'Juan Cruz',         'name' => 'Juan Cruz',         'email' => 'juan@example.com',    'password' => bcrypt('password')],
            ['username' => 'mgarcia',        'full_name' => 'Maria Garcia',      'name' => 'Maria Garcia',      'email' => 'maria@example.com',   'password' => bcrypt('password')],
            ['username' => 'pabad',          'full_name' => 'Pedro Abad',        'name' => 'Pedro Abad',        'email' => 'pedro@example.com',   'password' => bcrypt('password')],
            ['username' => 'lbautista',      'full_name' => 'Lucia Bautista',    'name' => 'Lucia Bautista',    'email' => 'lucia@example.com',   'password' => bcrypt('password')],
            ['username' => 'mvillanueva',    'full_name' => 'Marco Villanueva',  'name' => 'Marco Villanueva',  'email' => 'marco@example.com',   'password' => bcrypt('password')],
        ];

        foreach ($users as $data) {
            User::firstOrCreate(
                ['username' => $data['username']],
                $data
            );
        }
    }
}
