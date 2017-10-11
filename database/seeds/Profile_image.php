<?php

use Illuminate\Database\Seeder;

class Profile_image extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_images')->insert([
            'name' => "image_1",
            'location' => "img/profile/jenkins-icon.png",
            'role' => 3, // none type user
        ]);
    }
}
