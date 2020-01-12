<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSakeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sake_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('email');
            $table->string('password', 10);
            $table->integer('sex');
            $table->integer('country_id');
            $table->date('birthday');
            $table->boolean('blacklist');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sake_users');
    }
}
