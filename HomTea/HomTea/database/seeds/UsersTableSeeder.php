<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $insert = [
            [
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => bcrypt(123456),
                'address' => 'test',
                'tel' => '(09) 1234 5678',
                'status' => 'Active',
                'is_admin' => 2,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'name' => 'Sub Admin',
                'email' => 'sub@admin.com',
                'password' => bcrypt(123456),
                'address' => 'test',
                'tel' => '(08) 1234 5678',
                'status' => 'Active',
                'is_admin' => 1,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt(123456),
                'address' => 'test',
                'tel' => '(08) 1234 5678',
                'status' => 'Active',
                'is_admin' => 0,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()
            ]
        ];
        DB::table('users')->insert($insert);
    }
}
