<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            ['full_name' => 'Alice Santos',    'email' => 'alice.santos@example.com',    'phone' => '09171234567'],
            ['full_name' => 'Bob Reyes',       'email' => 'bob.reyes@example.com',       'phone' => '09181234568'],
            ['full_name' => 'Carol Dela Cruz', 'email' => 'carol.delacruz@example.com',  'phone' => '09191234569'],
            ['full_name' => 'David Lim',       'email' => 'david.lim@example.com',       'phone' => '09201234570'],
            ['full_name' => 'Eva Mendoza',     'email' => 'eva.mendoza@example.com',     'phone' => '09211234571'],
            ['full_name' => 'Frank Torres',    'email' => 'frank.torres@example.com',    'phone' => '09221234572'],
        ];

        foreach ($customers as $data) {
            Customer::firstOrCreate(['email' => $data['email']], $data);
        }
    }
}
