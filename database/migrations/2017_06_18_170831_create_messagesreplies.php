<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesreplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagereplies', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('message_id')->unsigned(); // the sender of the message
            $table->foreign('message_id')->references('id')->on('messages');
            $table->integer('user_id')->unsigned(); // User who sent the reply
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('body');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('messagereplies');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
