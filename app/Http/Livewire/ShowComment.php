<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class ShowComment extends Component
{
    public $comment;

    public function render(User $user)
    {

//        dd(auth()->user()->id);
        return view('livewire.show-comment',[
//            'comments' => Post::find(auth()->user()->id)->comments,
        ]);
    }
}
