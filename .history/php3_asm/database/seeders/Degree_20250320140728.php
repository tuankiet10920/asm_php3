<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Degree extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 20; $i++) { 
            DB::table('type_class')->insert([
                'name' => '1 : ' . $i,
                'image' => "degree$i.jpg",
                'created_at' => now(),
                'updated_at' => now(),
                'id_tutor' => $i
            ]);
        }
    }
}
