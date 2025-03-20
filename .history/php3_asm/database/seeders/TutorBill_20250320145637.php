<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutorBill extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // `id`, `fee`, `total`, `status`, 
        // `payment_method`, `created_at`, `updated_at`, `id_tutor`, `id_class`
        for ($i=1; $i <= 20; $i++) { 
            DB::table('student')->insert([
                'point' => rand(10, 100),
                'fee' => "Content Feedback $i",
                'total' => now(),
                'status' => rand(1000000, 5000000),
                'payment_method' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'id_tutor' => $i,
                'id_class' => $i,
            ]);
        }
    }
}
