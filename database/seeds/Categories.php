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
            'name' => 'General'
        ]);

        DB::table('categories')->insert([
            'id' => '2',
            'name' => 'Bug Reports'
        ]);

        DB::table('categories')->insert([
            'id' => '3',
            'name' => 'Easter Egg Hunt'
        ]);
    }
}
