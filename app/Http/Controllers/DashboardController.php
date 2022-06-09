<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

//        $posts = Post::all();

        return view('dashboard');
    }

    public function create(Request $request)
    {
//        dd('sdhjskljh');
        $reply = new Comment();
        $reply->comment = $request->get('reply');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }

    public function store(CommentRequest $request)
    {
        return $request;
    }

}
