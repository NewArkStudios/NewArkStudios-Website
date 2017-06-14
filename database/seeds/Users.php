<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "GummyDonut",
            'email' => "peter_hoang2@hotmail.com",
            'password' => bcrypt("123456"),
        ]);

         DB::table('users')->insert([
            'name' => "lantern77",
            'email' => "peter_hoang3@hotmail.com",
            'password' => bcrypt("123456"),
        ]);
    }
}
