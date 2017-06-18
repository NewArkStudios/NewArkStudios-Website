<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('message');
            $table->integer('sender_id')->unsigned(); // the sender of the message
            $table->foreign('sender_id')->references('id')->on('users');
            $table->integer('receiver_id')->unsigned(); // the receiever of the message
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->boolean('read'); // check whether this message has been read
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
        Schema::dropIfExists('messages');
    }
}
