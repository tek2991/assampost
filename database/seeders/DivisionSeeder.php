<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = [
            'Dibrugarh',
            'Darrang',
            'Nagaon',
            'Nalbari',
            'Goalpara',
            'Guwahati',
            'Tinsukia',
            'Cachar',
            'Sibsagar',
            'RMS GH',
            'RMS S',
            'NESD Ghy',
            'PSD Ghy',
            'RO Dibrugarh',
            'MMS Ghy',
            'PTC Ghy',
            'DA (P)',
            'GPO',
            'PCD Ghy',
            'CO Ghy',
        ];

        $insert_data = [];

        foreach ($divisions as $division) {
            $insert_data[] = [
                'name' => $division,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('divisions')->insert($insert_data);
    }
}
