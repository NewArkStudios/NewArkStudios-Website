<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class Reports extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            'id' => 1,
            'reason' => "This guy was a douche bag",
            'reporter_id' => 1,
            'post_id' => 1,
            'suspect_id' => 2,
            'reply_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
