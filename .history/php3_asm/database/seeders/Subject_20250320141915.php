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
            DB::table('tutor')->insert([
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
                    'name' => 'Subject : ' . $i,
                    'course_duration' => 12,
                    'name_lesson' => "Lesson $i",
                    'image' => "XX street, X ward, X city",
                    'note' => "tutor$i.jpg",
                    'file' => "tutor$i@gmail.com",
                    'id_subject' => "0123123123",
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
            
        }
    }
}
