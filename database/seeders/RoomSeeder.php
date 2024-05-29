<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            'price' => 350000,
            'status' => "available",
            'category_id' => 1
            // 'price' => 350000,
            // 'status' => "available",
            // 'category_id' => 1
            // 'price' => 350000,
            // 'status' => "available",
            // 'category_id' => 1
        ]);
    }
}
