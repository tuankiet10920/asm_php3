<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Subject extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // `id`, `name`, `course_duration`, `name_lesson`, 
        // `image`, `note`, `file`, `id_subject`, `created_at`, `updated_at`
        for ($i=1; $i <= 5; $i++) {
            $name = "Subject $i";
            $course_duration = 12;
            $image = "subject$i.jpg";
            DB::table('subject')->insert([
                'name' => $name,
                'course_duration' => $course_duration,
                'name_lesson' => "",
                'image' => $image,
                'note' => "",
                'file' => "",
                'id_subject' => "",
                'created_at' => now(),
                'updated_at' => now()
            ]);
            for ($j=1; $j <= 20; $j++) { 
                DB::table('tutor')->insert([
                    'name' => $name,
                    'course_duration' => $course_duration,
                    'name_lesson' => "Lesson $j",
                    'image' => $image,
                    'note' => "Note $j",
                    'file' => "tailieu$j",
                    'id_subject' => $i,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            
        }
    }
}
