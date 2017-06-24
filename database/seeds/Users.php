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
            'email' => "peter_hoang2@hotmail.com",
            'password' => bcrypt("123456"),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => "lantern77",
            'email' => "peter_hoang3@hotmail.com",
            'password' => bcrypt("123456"),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => "firefox",
            'email' => "lantern77@hotmail.com",
            'password' => bcrypt("123456"),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => "bannedguy",
            'email' => "bannedguy@hotmail.com",
            'password' => bcrypt("123456"),
            'banned' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
