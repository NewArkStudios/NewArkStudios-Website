<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

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
            'first_name' => "Peter",
            'last_name' => "Hoang",
            'activated' => true,
            'email' => "bob2@hotmail.com",
            'password' => bcrypt("123456"),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => "lantern77",
            'first_name' => "Bobt",
            'last_name' => "Marley",
            'email' => "peter_hoang3@hotmail.com",
            'password' => bcrypt("123456"),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => "firefox",
            'first_name' => "Bobt",
            'last_name' => "Marley",
            'email' => "lantern77@hotmail.com",
            'password' => bcrypt("123456"),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => "bannedguy",
            'first_name' => "basd",
            'last_name' => "Guyi",
            'email' => "bannedguy@hotmail.com",
            'password' => bcrypt("123456"),
            'banned' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => "suspendedguy",
            'first_name' => "bad",
            'last_name' => "guy",
            'email' => "suspendedguy@hotmail.com",
            'password' => bcrypt("123456"),
            'banned' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'suspended_till' => Carbon::createFromDate(2018, 6, 26),
        ]);
    }
}
