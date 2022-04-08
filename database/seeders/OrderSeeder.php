<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql2')->table('orders')->insert([
            'id' => 'P0001',
            'total_price' => '10.00',
            'table_no' => '1',
            'status' => '1',
            'created_at' => '2022-03-29 04:29:18',
            'updated_at' => '2022-03-29 04:29:18' 
        ]);
    }
}
