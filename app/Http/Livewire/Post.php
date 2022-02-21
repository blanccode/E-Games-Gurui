<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{
    public $newPost;

    public function addPost() {

    }
    public function render()
    {
        return view('livewire.post');
    }
}
