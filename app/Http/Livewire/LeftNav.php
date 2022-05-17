<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\User;
use Livewire\Component;

class LeftNav extends Component
{


    public function render()
    {

        $featuredArticle = Article::where('featured_article', 1)->first();
        $users = User::orderBy('score', 'desc')->paginate(5);
        return view('livewire.left-nav' ,compact('featuredArticle','users'));
    }
}
