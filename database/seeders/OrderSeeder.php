<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'guest_id' => 2,
            'room_id' => 2,
            'start_date' => '2024-05-30',
            'end_date' => '2024-06-02',
            'total_price' => 1050000
        ]);
    }
}
