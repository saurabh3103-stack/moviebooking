<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MovieCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movie_categories')->insert([
            ['name' => '2D Movies','created_at' => now(),'updated_at' => now()],
            ['name' => '3D Movies','created_at' => now(),'updated_at' => now()],
            ['name' => '4DX','created_at' => now(),'updated_at' => now()]
        ]);
    }
}
