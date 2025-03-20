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
        $arr_sub = [3, 24, 45, 66, 87];
        for ($i=1; $i <= 30; $i++) {
            $index = rand(0, 4);
            DB::table('class')->insert([
                'time_start' => now(),
                'status' => 0,
                'qty_students' => 3,
                'created_at' => now(),
                'updated_at' => now(),
                'id_type' => rand(1, 4),
                'id_subject' => $arr_sub[$index],
                'id_tutor' => $i,
            ]);
        }
    }
}
