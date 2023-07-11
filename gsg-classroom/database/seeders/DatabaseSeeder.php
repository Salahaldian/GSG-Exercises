<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // استخدام ملفات الفاكتوري الي عملتها
        \App\Models\User::factory(10)->create();

        // ما زبط
        // \App\Models\Topic::factory(5)->create([
        //     'classroom_id' => '1'
        // ]);

        // عمل فاكتوري مع تحديد بعض البيانات ع حسب ما انا بدي ، يعني بعض الملفات ما رح ياخدها من الملفا الاساسي الي عملته
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // UserSeeder::class
            // ClassroomSeeder::class // ما زبط
        ]);
    }
}
