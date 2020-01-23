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
            $table->string('sex', 10);//integer
            $table->string('country_id', 20);//integer
            $table->string('birthday', 10);//date
            $table->string('blacklist', 10);//boolean

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
