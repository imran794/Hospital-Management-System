<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'MD.Admin',
            'usertype' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456789),
        ]);


        DB::table('users')->insert([
            'name' => 'MD.User',
            'usertype' => 0,
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456789),
        ]);
    }
}
