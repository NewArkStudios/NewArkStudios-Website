<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('slug')->unique(); // used to create unique urls
            $table->text('title');
            $table->integer('pinned')->default(0); // 0 for pinned, higher values indicate pin, and higher value higher strength
            $table->boolean('closed')->default(false);
            $table->boolean('edited')->default(false);
            $table->integer('warned')->unsigned()->default(0); // indicate whether user was warned, banned, etc for post
            $table->text('body'); //0, none 1 for suspended, 2 banned, 3 warning
            $table->integer('views')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
