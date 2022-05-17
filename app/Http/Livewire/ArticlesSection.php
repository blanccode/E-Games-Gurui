<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticlesSection extends Component
{
    public function render()
    {
        $articles = Article::paginate(10);
        return view('livewire.articles-section', compact('articles'));
    }
}
