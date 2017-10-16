<?php

use Illuminate\Database\Seeder;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_us')->truncate();

        $insert = [
            [
                'name' => 'ร้านชานมไข่มุกหอมที',
                'description' => 'ศูนย์เทคโนโลยี นิคมอุตสาหกรรมไฮเทค 99 ม.5 ต.บ้านเลน อ.บางปะอิน จ.พระนครศรีอยุธยา 13160',
                'tel' => '(09) 2575 7524',
                'email' => 'pao7402@windowslive.com',
                'opening_times' => 'วันจันทร์-เสาร์ 7.30-18.00 น.',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];
        DB::table('contact_us')->insert($insert);
    }
}
