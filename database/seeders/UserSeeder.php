<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data user 1
        DB::table('users')->insert([
            'first_name' => 'Ahmad',
            'last_name' => 'Albab',
            'email' => 'ahmadalbab@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make()
            'role' => 'admin',
            'phone' => '0123456789',
            'status' => 'active'
        ]);

        // Sample data user 2
        DB::table('users')->insert([
            'first_name' => 'Upin',
            'last_name' => 'Ipin',
            'email' => 'upinipin@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make()
            'role' => 'user',
            'phone' => '01987654321',
            'status' => 'active'
        ]);

        // Sample data user 3
        DB::table('users')->insert([
            'first_name' => 'Siti',
            'last_name' => 'Sifir',
            'email' => 'sitisifir@gmail.com',
            'password' => bcrypt('pass123'), // Hash::make()
            'role' => 'user',
            'phone' => '01321456987',
            'status' => 'pending'
        ]);
    }
}
