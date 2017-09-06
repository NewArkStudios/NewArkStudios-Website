<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id')->unique(); // id of the report
            $table->text('reason'); // text indicating what is the reason for the import
            $table->integer('reporter_id')->unsigned(); // the user who reported
            $table->foreign('reporter_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('post_id')->unsigned()->nullable(); // the post in question we are reporting on
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('suspect_id')->unsigned(); // the individual in question
            $table->foreign('suspect_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('reply_id')->unsigned()->nullable();
            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
