<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class movieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('movies')->insert([
            'title'        => 'Movie 1',
            'category_id'  => 1, 
            'theater_id'   => 1, 
            'date'         => '2025-10-01',
            'description'  => 'demo',
            'price'        => 120.00,
            'total_seats'  => 120,
            'status'       => 'active',
            'image'        => 'upload/1759317426_test_pic1749480794937_badged_1759208412551.webp', 
            'show_timings' => json_encode([
                "10:00 AM",
                "01:00 PM",
                "04:00 PM",
                "07:00 PM",
                "09:00 PM"
            ]),
            'created_at'   => '2025-10-01 10:01:15',
            'updated_at'   => '2025-10-01 11:17:06',
        ]);
    }
}
