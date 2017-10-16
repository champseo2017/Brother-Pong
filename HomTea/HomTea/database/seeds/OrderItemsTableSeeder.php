<?php

use Illuminate\Database\Seeder;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->truncate();

        // $insert = [
        //     [
        //         'order_id' => 'ORDER-0000000001',
        //         'product_id' => 1,
        //         'quanlity' => 5,
        //         'price' => 6.91,
        //         'subtotal' => 34.55,
        //         'created_at' => Carbon\Carbon::now(),
        //         'updated_at' => Carbon\Carbon::now()
        //     ]
        // ];
        // DB::table('order_items')->insert($insert);
    }
}
