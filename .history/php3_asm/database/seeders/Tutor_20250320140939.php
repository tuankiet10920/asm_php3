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
        for ($i=1; $i <= 40; $i++) { 
            DB::table('tutor')->insert([
                'name' => '1 : ' . $i,
                'birthday' => "degree$i.jpg",
                'education_level' => "degree$i.jpg",
                'address' => "degree$i.jpg",
                'image' => "degree$i.jpg",
                'email' => "degree$i.jpg",
                'phone' => "degree$i.jpg",
                'momo_acc_num' => "degree$i.jpg",
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
