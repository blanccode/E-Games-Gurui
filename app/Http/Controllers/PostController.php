<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {

        $post = Post::find($id);
//
//        $paginatedComments = $post->comments()->simplePaginate(5);

            $id = $id;
//        foreach ($posts as $post) {
//        }
//        dd($paginatedComments);


        return view('post.show',compact('post', 'id'));
    }

}
