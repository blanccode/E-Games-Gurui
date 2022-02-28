<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class DashboardPosts extends Component
{

    public $comment;

    public function createComment($id) {
//        $this->validate();
        $data = [
            'comment' => $this->comment,
            'post_id' => $id,

        ];
        Comment::create($data);
    }

    public function render()

    {

        $posts = Post::all();
        return view('livewire.dashboard-posts', compact('posts'));
    }
}
