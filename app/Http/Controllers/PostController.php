<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function uploadPost(Request $request)
    {
//        $this->validate($request, [
//            'text' => 'required|string|max:255',
//            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'video' => 'nullable|file|mimetypes:video/mp4',
//        ]);
//
//        $post = new Post;
//        $post->text = $request->text;
//        $post->image = $request->image;
//
//        if ($request->hasFile('video')) {
//            $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
//            $post->video = $path;
//
//            $post->save();
//        }
//        $post->save();
//        dd($post->video);

    }
}
