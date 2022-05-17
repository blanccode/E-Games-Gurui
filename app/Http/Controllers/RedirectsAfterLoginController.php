<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectsAfterLoginController extends Controller
{
    public function redirect() {

//        if (Auth::user()->role_id == 1) {
//            return redirect('admin/dashboard');
//        }
//        else {
            return redirect('dashboard');
//        }
    }
}
