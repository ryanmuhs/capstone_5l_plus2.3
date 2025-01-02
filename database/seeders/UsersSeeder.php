<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin 1',
                'username' => 'admin1',
                'email' => 'admin1@siam.com',
                'role' => 'admin',
                'password' => Hash::make('admin1pass')
            ],
            [
                'name' => 'Staf 1',
                'username' => 'staf1',
                'email' => 'staf1@siam.com',
                'role' => 'staf',
                'password' => Hash::make('staf1pass')
            ],
        ]);
    }
}
