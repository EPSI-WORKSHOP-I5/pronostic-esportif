<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches_users', function (Blueprint $table) {
            $table->unsignedInteger('match_id');
            $table->unsignedInteger('user_id');
            $table->integer('team_id')->nullable();
        });

        Schema::table('matches_users', function (Blueprint $table) {
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches_users');
    }
}
