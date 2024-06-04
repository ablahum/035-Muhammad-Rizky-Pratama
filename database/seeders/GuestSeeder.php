<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guests')->insert([
            // 'name' => 'ujang',
            // 'origin' => 'bandung',
            // 'phone' => '082123456789',
            // 'name' => 'solihin',
            // 'origin' => 'garut',
            // 'phone' => '089876543210',
            'name' => 'tatang',
            'origin' => 'tasik',
            'phone' => '081122334455',
        ]);
    }
}
