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
            '09:00 AM to 09:15 AM',
            '09:15 AM to 09:30 AM',
            '09:30 AM to 09:45 AM',
            '09:45 AM to 10:00 AM',
            '10:00 AM to 10:15 AM',
            '10:15 AM to 10:30 AM',
            '10:30 AM to 10:45 AM',
            '10:45 AM to 11:00 AM',
            '11:00 AM to 11:15 AM',
            '11:15 AM to 11:30 AM',
            '11:30 AM to 11:45 AM',
            '11:45 AM to 12:00 PM',
            '12:00 PM to 12:15 PM',
            '12:15 PM to 12:30 PM',
            '12:30 PM to 12:45 PM',
            '12:45 PM to 01:00 PM',
            '01:00 PM to 01:15 PM',
            '01:15 PM to 01:30 PM',
            '01:30 PM to 01:45 PM',
            '01:45 PM to 02:00 PM',
            '02:00 PM to 02:15 PM',
            '02:15 PM to 02:30 PM',
            '02:30 PM to 02:45 PM',
            '02:45 PM to 03:00 PM',
            '03:00 PM to 03:15 PM',
            '03:15 PM to 03:30 PM',
            '03:30 PM to 03:45 PM',
            '03:45 PM to 04:00 PM',
            '04:00 PM to 04:15 PM',
            '04:15 PM to 04:30 PM',
            '04:30 PM to 04:45 PM',
            '04:45 PM to 05:00 PM',
        ];

        foreach ($timeSlots as $timeSlot) {
            \App\Models\TimeSlot::create([
                'time' => $timeSlot,
            ]);
        }
    }
}
