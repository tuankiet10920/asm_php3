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
        for ($i=2; $i <= 20; $i++) { 
            $status = rand(0, 1);
            if($status === 1){
                $total = rand(1000000, 10000000);
            }else{
                $total = 0;
            }
            DB::table('tutor_bill')->insert([
                'fee' => 10,
                'total' => $total,
                'status' => $status,
                'payment_method' => 'MOMO',
                'created_at' => now(),
                'updated_at' => now(),
                'id_tutor' => $i,
                'id_class' => $i,
            ]);
        }
    }
}
