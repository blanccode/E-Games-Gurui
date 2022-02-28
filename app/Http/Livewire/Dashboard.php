<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {

        $posts = Post::all();
        return view('livewire.dashboard', compact("posts"));
    }


}
