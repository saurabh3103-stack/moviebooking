<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class TheaterAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager_id = DB::table('users')->insertGetId([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'manager',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('theaters')->insert([
            'name' => 'Theatre 1',
            'manager_name' => 'Theatre 1 Manager',
            'manager_id' => $manager_id,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
