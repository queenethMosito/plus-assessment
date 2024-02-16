<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 99 regular users
        User::factory()->count(99)->create()->each(function ($user) {
            // Generate a random role ID between 2 and 3
            $roleId = rand(2, 3);
            
            // Retrieve the role based on the random role ID
            $role = Role::find($roleId);
            
            // If the role is found, attach it to the user
            if ($role) {
                $user->roles()->attach($role);
            }
        });

        // Create an admin user
        $admin = User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), 
        ]);

        $adminRole = Role::where('name', 'Admin')->first();

        // Assign roles to the admin user through the UserRole model
        UserRole::create([
            'user_id' => $admin->id,
            'role_id' => $adminRole->id
        ]);
        
    }
}