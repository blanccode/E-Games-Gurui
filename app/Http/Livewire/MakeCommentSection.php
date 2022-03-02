<?php

namespace App\Http\Livewire;
use App\Models\Comment;
use Livewire\Component;

class MakeCommentSection extends Component
{

    public $comment;

    public $post;


    protected $rules = [
        'comment' => 'nullable|required|string|max:255',

    ];

//    public function createComment($id) {
//
//
//        $this->validate();
//        $data = [
//            'comment' => $this->comment,
//            'post_id' => $id,
//
//        ];
////        dd($data);
//        Comment::create($data);
//    }

    public function render()
    {
        return view('livewire.make-comment-section');
    }
}
