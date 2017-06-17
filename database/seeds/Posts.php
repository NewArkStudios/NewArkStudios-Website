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
            'body'=> "FUCKING ASS"
        ]);
    }
}
