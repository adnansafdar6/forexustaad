<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'role_id' => 1,
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'email_verified_at' => carbon::now(),
                'password' => Hash::make('12345678')
            ],
            [
                'role_id' => 2,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => carbon::now(),
                'password' => Hash::make('12345678')
            ],
        ]);
    }
}
