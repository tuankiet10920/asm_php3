<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentClass extends Seeder
{
    /**
     * Run the database seeds.
     */
    // `id`, `point`, `feedback_content`, `feedback_time`, 
    // `class_opener`, `payment_total`, 
    // `payment_time`, `created_at`, `updated_at`, `id_student`, `id_class`
    public function run(): void
    {
        for ($i=1; $i <= 20; $i++) { 
            DB::table('student')->insert([
                'point' => rand(10, 100),
                'feedback_content' => "Content Feedback $i",
                'feedback_time' => now(),
                'payment_total' => rand(1000000, 5000000),
                'payment_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'id_student' => $i,
                'id_class' => $i,
            ]);
        }
    }
}
