<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Seed roles with timestamps
        DB::table('roles')->insert([
            ['name' => 'Admin', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Content Manager', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'User', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}