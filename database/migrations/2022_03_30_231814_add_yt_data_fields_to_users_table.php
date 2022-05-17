<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYtDataFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('yt_channel_name')->nullable();
            $table->string('yt_channel_url')->nullable();
            $table->integer('yt_channel_views')->nullable();
            $table->integer('yt_channel_subs')->nullable();
            $table->integer('yt_channel_video_count')->nullable();
            $table->string('yt_channel_playlist_id')->nullable();
            $table->integer('score')->nullable();

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
