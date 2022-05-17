<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Can',
                'email' => 'blanccodes@gmail.com',
                'password' => Hash::make(12345678),
//                'youtube_account_id' => 'UCic48jpZWaG_kQ0sj9pTS1w',
                'role_id' => 1,
                'twitter_channel_link' => 'https://twitter.com/?lang=de',
                'tiktok_channel_link' => 'https://www.tiktok.com/de-DE',
                'twitch_channel_link' => 'https://www.twitch.tv/saricano',

            ],
            [
                'name' => 'Ayoub',
                'email' => 'egamesguru@gmail.com',
                'password' => Hash::make(12345678),
//                'youtube_account_id' => '',
                'role_id' => 1,
                'twitter_channel_link' => '',
                'tiktok_channel_link' => '',
                'twitch_channel_link' => '',

            ],
            [
                'name' => 'Sari',
                'email' => 'Sari@gmail.com',
                'password' => Hash::make(12345678),
//                'youtube_account_id' => '',
                'role_id' => 2,
                'twitter_channel_link' => '',
                'tiktok_channel_link' => '',
                'twitch_channel_link' => '',
            ],


        ]);

        User::factory()->count(15)->create();
    }
}
