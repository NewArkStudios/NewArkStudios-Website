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
            $table->increments('id')->unique();
            $table->text('message');
            $table->string('subject');
            $table->integer('sender_id')->unsigned(); // the sender of the message
            $table->foreign('sender_id')->references('id')->on('users');
            $table->string('sender_name'); // the sender of the message
            $table->foreign('sender_name')->references('name')->on('users');
            $table->integer('receiver_id')->unsigned(); // the receiever of the message
            $table->foreign('receiver_id')->references('id')->on('users');
            $table->string('receiver_name'); // the receiever of the message
            $table->foreign('receiver_name')->references('name')->on('users');
            $table->boolean('read')->default(false); // check whether this message has been read
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
        // for the purpose of only taking down
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('messages');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
