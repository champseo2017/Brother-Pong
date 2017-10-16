<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->truncate();

        // $insert = [
        //     [
        //         'id' => 'ORDER-0000000001',
        //         'user_id' => 1,
        //         'price' => 34.55,
        //         'created_at' => Carbon\Carbon::now(),
        //         'updated_at' => Carbon\Carbon::now()
        //     ]
        // ];
        // DB::table('orders')->insert($insert);
    }
}
