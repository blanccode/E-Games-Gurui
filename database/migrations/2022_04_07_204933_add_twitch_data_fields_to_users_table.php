<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwitchDataFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('twitch_id')->nullable();
            $table->string('twitch_display_name')->nullable();
            $table->string('twitch_profile_image_url')->nullable();
            $table->integer('twitch_view_count')->nullable();
            $table->integer('twitch_followers')->nullable();
            $table->integer('twitch_score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
