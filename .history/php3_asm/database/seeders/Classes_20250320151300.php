<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Classes extends Seeder
{
    /**
     * Run the database seeds.
     */
    // `id`, `time_start`, `status`, `qty_students`, 
    // `created_at`, `updated_at`, `id_type`, `id_subject`, `id_tutor`
    public function run(): void
    {
        for ($i=1; $i <= 30; $i++) { 
            DB::table('class')->insert([
                'time_start' => now(),
                'status' => 0,
                'qty_students' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'id_type' => rand(1, 4),
                'id_subject' => rand(1, 5),
                'id_tutor' => $i,
            ]);
        }
    }
}
