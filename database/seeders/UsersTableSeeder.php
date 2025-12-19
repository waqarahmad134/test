<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create Police
        DB::table('users')->insert([
            'name' => 'Police',
            'email' => 'police@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'police',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create prosecution
        DB::table('users')->insert([
            'name' => 'Prosecution',
            'email' => 'pro@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'prosecution',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Clerk prosecution
        DB::table('users')->insert([
            'name' => 'Clerk',
            'email' => 'clerk@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'clerk',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create prosecution
        DB::table('users')->insert([
            'name' => 'Court',
            'email' => 'court@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'court',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
