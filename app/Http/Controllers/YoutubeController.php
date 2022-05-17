<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index() {
//        dd('kmdsklsm');
        return view('profile.yt-profile');
    }


}
