<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsUser::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'gander' => 'Male',
            'birth' => now(),
            'country' => 'Indonesia',
            'role' => 'admin'
        ]);
        ModelsUser::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('customer'),
            'gander' => 'Female',
            'birth' => now(),
            'country' => 'Indonesia'
        ]);
    }
}
