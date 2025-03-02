<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsSeedersTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'Event 1',
            'descriptions' => 'Event 1 des',
            'start_time' => now()->addDays(7),
            'end_time' => now()->addDays(7)->addHours(5),
        ]);
        Event::create([
            'title' => 'Event 2',
            'descriptions' => 'Event 2 des',
            'start_time' => now()->addDays(8),
            'end_time' => now()->addDays(8)->addHours(5),
        ]);
        Event::create([
            'title' => 'Event 3',
            'descriptions' => 'Event 3 des',
            'start_time' => now()->addDays(9),
            'end_time' => now()->addDays(9)->addHours(5),
        ]);
    }
}
