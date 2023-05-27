<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('admins')->insert([
            'name' => 'Admin User',
            'email' => 'alrighttech@gmail.com',
            'password' => Hash::make('alright@123'),
        ]);
    }
}
