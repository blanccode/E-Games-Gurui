<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Product;
use Livewire\Component;

class RightNav extends Component
{
    public function render()
    {
        $products = Product::all();
        $featuredArticle = Article::where('featured_article', 1)->first();

        return view('livewire.right-nav', compact('products', 'featuredArticle'));
    }
}
