<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // يستخدم ل اضافة داتا حقيقة على الداتا بيز
        // Query Bulider
        DB::table('users')->insert([
            'name' => 'Salahladin',
            'email' => 'salahaldin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
