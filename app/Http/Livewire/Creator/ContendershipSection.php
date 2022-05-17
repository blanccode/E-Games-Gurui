<?php

namespace App\Http\Livewire\Creator;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class ContendershipSection extends Component
{
    public function render(Request $request)
    {
        $users = User::orderBy('score', 'desc')->paginate(10);
        $twitchUsers = User::orderBy('twitch_score', 'desc')->paginate(10);

        if ($request->ajax()) {

            return view('result', compact('users'));
        }

//        dd($users);
        return view('livewire.creator.contendership-section' , compact('users', 'twitchUsers'));
    }
}
