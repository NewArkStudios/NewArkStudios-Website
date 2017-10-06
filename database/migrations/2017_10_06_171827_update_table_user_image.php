<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableUserImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add foreign key for images
        Schema::table('users', function($table) {
            $table->integer('profile_image_id')->unsigned()->default(1);
            $table->foreign('profile_image_id')->references('id')->on('profile_images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}
