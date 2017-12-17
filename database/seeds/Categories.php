<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'name' => 'General',
            'slug' => 'General',
            'description' => 'Information that is general, can be about anything that does not have a category',
            'image' => 'img/icon/general.png',
        ]);

        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'Foldrum',
            'slug' => 'Foldrum',
            'description' => 'Everything Foldrum, strategies, questions, fanart',
            'image' => '/img/foldrum/foldrum_icon.png',
        ]);

        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'Bug Reports',
            'slug' => 'Bug-Reports',
            'description' => 'Report any bugs that are found within our games/website, we will do our best to respond',
            'image' => 'img/icon/bug.png',
        ]);

        DB::table('categories')->insert([
            'id' => '4',
            'name' => 'Easter Egg Hunt',
            'slug' => 'Easter-Egg-Hunt',
            'description' => 'Find cool stuff within our games? Tell others here',
            'image' => 'img/icon/egg.png',
        ]);
    }
}
