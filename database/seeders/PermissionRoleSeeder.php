<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Carbon\Carbon;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create Admin role
         $adminRole = Role::firstOrCreate(['name' => 'Admin']);

         // Retrieve or create all permissions
         $permissions = Permission::all();

         $now = Carbon::now();
 
         // Assign all permissions to the Admin role
         $permissionsIds = $permissions->pluck('id')->toArray();
         $adminRole->permissions()->sync(
            array_fill_keys($permissionsIds, ['created_at' => $now, 'updated_at' => $now])
        );
 
         // Create Content Manager role 
         $contentManagerRole = Role::firstOrCreate(['name' => 'Content Manager']);

         // Assign 'View Admin Dashboard' permission to the Content Manager role
         $viewAdminDashboardPermission = Permission::where('name', 'View Admin Dashboard')->first();
         $contentManagerRole->permissions()->sync([$viewAdminDashboardPermission->id => ['created_at' => $now, 'updated_at' => $now]]);

    }
}