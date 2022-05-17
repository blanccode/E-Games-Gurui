<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = auth()->user()->latestAdminArticles;
        return view('admin.artikels', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($article)
    {
//        dd($article);
        $currentArticle = Article::find($article);
//        $this->id = $id;
//        dd($currentArticle);
        return view('admin.article.show', compact('currentArticle'));
    }

    public function feature($id) {
        $oldFeaturedArticle = Article::where('featured_article', 1)->update(['featured_article' => 0]);
        $chosenFeaturedArticle = Article::find($id)->update(['featured_article' => 1]);
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {

//        dd($article);
        $article = Article::find($article);
        $article->delete();
        return redirect('/admin/articles')->with('delete', 'Article was deleted successfully!');
    }
}
