<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Past Events (before 2025-12-14)
        Event::create([
            'title' => 'Past Concert',
            'description' => 'Rock concert recap',
            'date' => '2025-12-01',
            'time' => '20:00:00',
            'location' => 'City Hall'
        ]);
        Event::create([
            'title' => 'Past Workshop',
            'description' => 'Coding workshop held',
            'date' => '2025-12-10',
            'time' => '14:00:00',
            'location' => 'Online'
        ]);
        Event::create([
            'title' => 'Past Meetup',
            'description' => 'Tech meetup summary',
            'date' => '2025-12-12',
            'location' => 'Downtown'
        ]);

        // Today’s Events (2025-12-14)
        Event::create([
            'title' => 'Today Seminar',
            'description' => 'AI seminar today',
            'date' => '2025-12-14',
            'time' => '10:00:00',
            'location' => 'University'
        ]);
        Event::create([
            'title' => 'Today Party',
            'description' => 'Holiday party tonight',
            'date' => '2025-12-14',
            'time' => '19:00:00',
            'location' => 'Club XYZ'
        ]);
        Event::create([
            'title' => 'Today Demo',
            'description' => 'Product demo session',
            'date' => '2025-12-14',
            'location' => 'Office'
        ]);

        // Future Events (after 2025-12-14)
        Event::create([
            'title' => 'Future Conference',
            'description' => 'Tech conference upcoming',
            'date' => '2025-12-20',
            'time' => '09:00:00',
            'location' => 'Convention Center'
        ]);
        Event::create([
            'title' => 'Future Webinar',
            'description' => 'Online webinar next week',
            'date' => '2025-12-21',
            'time' => '16:00:00',
            'location' => 'Virtual'
        ]);
        Event::create([
            'title' => 'Future Gala',
            'description' => 'Annual gala event',
            'date' => '2025-12-25',
            'time' => '18:00:00',
            'location' => 'Grand Hotel'
        ]);
    }
}
