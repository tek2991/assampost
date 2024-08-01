<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create time slots
        $timeSlots = [
            '10:00 AM to 10:10 AM',
            '10:10 AM to 10:20 AM',
            '10:20 AM to 10:30 AM',
            '10:30 AM to 10:40 AM',
            '10:40 AM to 10:50 AM',
            '10:50 AM to 11:00 AM',
            '11:00 AM to 11:10 AM',
            '11:10 AM to 11:20 AM',
            '11:20 AM to 11:30 AM',
            '11:30 AM to 11:40 AM',
            '11:40 AM to 11:50 AM',
            '11:50 AM to 12:00 PM',
            '12:00 PM to 12:10 PM',
            '12:10 PM to 12:20 PM',
            '12:20 PM to 12:30 PM',
            '12:30 PM to 12:40 PM',
            '12:40 PM to 12:50 PM',
            '12:50 PM to 01:00 PM',
            '01:00 PM to 01:10 PM',
            '01:10 PM to 01:20 PM',
            '01:20 PM to 01:30 PM',
            '02:00 PM to 02:10 PM',
            '02:10 PM to 02:20 PM',
            '02:20 PM to 02:30 PM',
            '02:30 PM to 02:40 PM',
            '02:40 PM to 02:50 PM',
            '02:50 PM to 03:00 PM',
        ];

        foreach ($timeSlots as $timeSlot) {
            \App\Models\TimeSlot::create([
                'time' => $timeSlot,
            ]);
        }
    }
}
