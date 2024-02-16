<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('permissions')->insert([
            ['name' => 'View Admin Dashboard', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Administer Users', 'created_at' => $now, 'updated_at' => $now],
        ]);

        
    }
}