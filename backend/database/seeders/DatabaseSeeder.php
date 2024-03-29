<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $roles = [
            [
                'name'=>"STUDENT",
                'slug'=>'student'
            ],
            [
                'name' => "Admin",
                'slug' => 'admin'
            ]
            ];
        foreach ($roles as $key => $role) {
            Role::create($role);
        }
        $Users = [
            [
                'name' => 'rohan',
                'email' => 'rohan@example.com',
                'role_id'=>1
            ],
            [
                'name' => 'aakash',
                'email' => 'aakash@example.com',
                'role_id' => 1
            ],
            [
                'name' => 'mukesh',
                'email' => 'mukesh@example.com',
                'role_id' => 1
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                 'role_id'=>2,
                'password' => bcrypt('password@test') // Assuming you want to hash the password
            ]
            ];
            foreach($Users as $key => $user) {
            User::create($user);
        }

    }
}
