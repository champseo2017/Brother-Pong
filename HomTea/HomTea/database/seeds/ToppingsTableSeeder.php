<?php

use Illuminate\Database\Seeder;

class ToppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toppings')->truncate();

        $insert = [
            [
                'name' => 'Topping1',
                'status' => 'in-use',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'name' => 'Topping2',
                'status' => 'in-use',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'name' => 'Topping3',
                'status' => 'in-use',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];
        DB::table('toppings')->insert($insert);
    }
}
