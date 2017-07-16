<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('bio')->nullable();
            $table->string('age')->nullable();
            $table->date('birthday')->nullable();
            $table->string('email')->unique();
            $table->boolean('activated')->default(false);
            $table->string('password');
            $table->integer('banned')->default(0); // check if user is normal(0), suspended(1), banned(2)
            $table->date('suspended_till')->nullable()->default(null); // check when user is suspended till
            $table->rememberToken();
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
        // for purposes of only resetting
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
