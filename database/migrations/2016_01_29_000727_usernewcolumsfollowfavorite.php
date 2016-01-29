<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usernewcolumsfollowfavorite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('follows')->default(0);
            $table->integer('favorites')->default(0);
        });
        Schema::create('series_follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_id');
            $table->string('user_id');
            $table->timestamps();
        });
        Schema::create('series_favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_id');
            $table->string('user_id');
            $table->timestamps();
        });
        Schema::create('user_follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_id');
            $table->string('user_id');
            $table->timestamps();
        });
        Schema::create('user_favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_id');
            $table->string('user_id');
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
        //
    }
}
