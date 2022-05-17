<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 3,
                'text' => 'text from normal user',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [

            'user_id' => 1,
            'text' => 'text from admin user',
            'created_at' => Carbon::now()->toDateTimeString(),
            ],

        ]);
    }
}
