<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tutor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // `id`, `name`, `birthday`, `education_level`, `address`, `image`, 
        // `email`, `phone`, `momo_acc_num`, `created_at`, `updated_at`
        $start_date = strtotime("2023-01-01"); // Ngày bắt đầu
        $end_date = strtotime("2024-12-31");   // Ngày kết thúc
        for ($i=1; $i <= 40; $i++) { 
            $random_timestamp = rand($start_date, $end_date);
            $random_date = date("Y-m-d", $random_timestamp); // Ví dụ định dạng YYYY-MM-DD
            DB::table('tutor')->insert([
                'name' => 'Tutor ' . $i,
                'birthday' => $random_date,
                'education_level' => "12/12",
                'address' => "XX street, X ward, X city",
                'image' => "tutor$i.jpg",
                'email' => "tutor$i@gmail.com",
                'phone' => "0123123123",
                'momo_acc_num' => "0123123123",
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
