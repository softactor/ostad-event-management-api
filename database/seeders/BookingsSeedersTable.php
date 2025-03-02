<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingsSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_id' => 3,
            'event_id' => 1,
            'ticket_qty' => 2,
            'ticket_price' => 500,
            'status' => 'pending',
        ]);
        Booking::create([
            'user_id' => 4,
            'event_id' => 2,
            'ticket_qty' => 3,
            'ticket_price' => 2100,
            'status' => 'pending',
        ]);
        Booking::create([
            'user_id' => 4,
            'event_id' => 2,
            'ticket_qty' => 4,
            'ticket_price' => 2800,
            'status' => 'pending',
        ]);
        Booking::create([
            'user_id' => 5,
            'event_id' => 3,
            'ticket_qty' => 1,
            'ticket_price' => 3000,
            'status' => 'confirmed',
        ]);
    }
}
