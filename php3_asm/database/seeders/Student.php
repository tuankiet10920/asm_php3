<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Student extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // `id`, `name`, `image`, `birthday`, `address`,
        // `email`, `phone`, `created_at`, `updated_at`
        $start_date = strtotime("2023-01-01"); // Ngày bắt đầu
        $end_date = strtotime("2024-12-31");   // Ngày kết thúc
        for ($i = 1; $i <= 40; $i++) {
            $random_timestamp = rand($start_date, $end_date);
            $random_date = date("Y-m-d", $random_timestamp);
            DB::table('student')->insert([
                'name' => 'Student ' . $i,
                'image' => "student.png",
                'birthday' => $random_date,
                'address' => "XX street, X ward, X city",
                'email' => "student$i@gmail.com",
                'phone' => "0123123123",
                'created_at' => now(),
                'updated_at' => now(),
                'password' => Hash::make('password' . $i)
            ]);
        }
    }
}
