<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->truncate();

        $insert = [
            [
                'name' => 'BUY 10 GET 1 FREE',
                'description' => 'ซื้อเครื่องดื่มครบ 10แก้ว FREE! 1แก้ว',
                'use_points' => 10,
                'started_at' => Carbon\Carbon::minValue(),
                'ended_at' => Carbon\Carbon::maxValue(),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];
        DB::table('promotions')->insert($insert);
    }
}
