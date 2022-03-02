<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class DashboardPosts extends Component
{

    public $comment = '';

    public function mount() {
//        dd('sjdskono');
    }

    public function createComment($id) {
//        dd('sdkmjk');
//        $this->validate();
        $data = [
            'comment' => $this->comment,
            'post_id' => $id,

        ];
        Comment::create($data);
        $this->comment = '';
    }

    public function render()

    {
        $posts  = Post::latest()->get();
//            dd($posts);
//        $usersWithPost = User::with('posts')->get();
//        dd($posts);
        return view('livewire.dashboard-posts', compact( 'posts'));
    }
}
