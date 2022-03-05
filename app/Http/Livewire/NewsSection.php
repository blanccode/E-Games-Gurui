<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;

class NewsSection extends Component
{
    public function render()
    {
        $news = News::all();
        return view('livewire.news-section', compact('news'));
    }
}
