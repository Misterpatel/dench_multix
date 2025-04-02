<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'One',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password'),
                'mobile_no' => '8707702713',
                'role' => '1',
                'created_by' => '1',
                'updated_by' => '1',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
        
    }
}
