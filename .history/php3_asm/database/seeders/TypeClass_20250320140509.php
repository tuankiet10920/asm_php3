<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeClass extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= 4; $i++) { 
            DB::table('type_class')->insert([
                'name' => '1 : ' . $i,
                'price' => 1000000 * $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
