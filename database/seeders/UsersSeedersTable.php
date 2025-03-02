<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'admin',
            'name' => 'App Admin',
            'email' => 'app_admin@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'role' => 'event_admin',
            'name' => 'Event Admin',
            'email' => 'event_admin@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'role' => 'user',
            'name' => 'Jamal',
            'email' => 'jamal@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'role' => 'user',
            'name' => 'Apu',
            'email' => 'apu@example.com',
            'password' => Hash::make('password')
        ]);
        User::create([
            'role' => 'user',
            'name' => 'Fahim',
            'email' => 'fahim@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
