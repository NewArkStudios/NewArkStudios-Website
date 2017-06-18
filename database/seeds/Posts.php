<?php

use Illuminate\Database\Seeder;

class Posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert([
            'id' => 1,
            'user_id' => "1",
            'category_id' => 1,
            'slug' => "Fuck",
            'title' => "Fuck",
            'closed' => false,
            'body'=> "FUCKING ASS",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'id' => 2,
            'user_id' => "2",
            'category_id' => 1,
            'slug' => "Hey_this_is_a_post",
            'title' => "Hey this is a post",
            'closed' => false,
            'body'=> "Justing testing a post for the body",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
