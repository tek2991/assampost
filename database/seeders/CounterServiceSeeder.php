<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CounterServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create counter services
        $counterServices = [
            'Savings Bank',
            'AADHAAR',
            'Postal Life Insurance',
        ];

        foreach ($counterServices as $counterService) {
            \App\Models\CounterService::create([
                'name' => $counterService,
            ]);
        }
    }
}
