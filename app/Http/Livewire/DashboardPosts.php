<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardPosts extends Component
{

    public $comment = '';
    public Model $model;
    public $likes ;
    public $commentLikes ;
    public $isLiked = false;
//    public $likeCount;

    public function mount() {
//       $isLiked = auth()->user()->likes()->where('post_id', $post->id)->first();
//       $this->isliked = false;

    }


    public function like($postId, $likeCount ) {

//        $post = Post::where('id',$postId)->first();
        $user = Auth::user();

        $likeRow = $user->likes()->where('post_id', $postId)->first();

        if (!$likeRow) {
//            dd($likeRow);

            Like::create([
                'user_id' => $user->id,
                'post_id' => $postId,
                'like' => true,
            ]);

            $this->isLiked = true;

        } else {
            ///// User already liked current Post /////
            $likeRow->delete();
            $this->isLiked = false;

        }



//        $post->like_count
    }

    public function likeComment($commentId, $commentLikeCount ) {

//        $post = Post::where('id',$commentId)->first();
        $user = Auth::user();

        $likeRow = $user->commentLikes()->where('comment_id', $commentId)->first();

        ///// Check if current comment is already liked by user /////

        if (!$likeRow) {
            CommentLike::create([
                'user_id' => $user->id,
                'comment_id' => $commentId,
                'like' => true,
            ]);

            $this->isLiked = true;
            $commentLikeCount++;
            $this->commentLikes = $commentLikeCount;
        } else {
            ///// User already liked current Post /////
            $likeRow->delete();

            $commentLikeCount--;
            $this->commentLikes = $commentLikeCount;

        }



//        $post->like_count
    }

    public function createComment($id) {
//        dd('sdkmjk');
//        $this->validate();
        $user = Auth::user();
//        $data = [
//            'comment' => $this->comment,
//            'post_id' => $id,
//            'user_id' => $user->id,
//        ];
//        Comment::create($data);
//        dd(Auth::user());
        $comment = new Comment;
        $comment->comment = $comment;
        $comment->user()->associate(auth()->user());
        $post = Post::find($id);
//        dd($post->comments());
        $post->comments()->save($comment);

        $this->comment = '';
    }
    public function createReply($id,$post_id) {
//        dd('sdkmjk');
//        $this->validate();
        $reply = new Comment();
//        $user = Auth::user();
//        $data = [
//            'comment' => $this->comment,
//            'parent_id' => $id,
//            'user_id' => ,
//        ];
        $reply->comment = $this->comment;
        $reply->user()->associate(Auth::user());
        $reply->parent_id = $id;

        $post = Post::find('post_id');

        $post->comments()->save($reply);

//        Comment::create($data);

        $this->comment = '';
    }

    public function render()

    {
        $posts  = Post::latest()->get();
//
//        foreach ($posts as $post) {
////            echo $post . '<br>' ;
//
//            foreach ($post->comments as $comment )
////                echo $comment . '<br>';
//
//                foreach ($comment->replies as $replies) {
//                    echo $replies . '<br>' ;
//            }
//        }


        return view('livewire.dashboard-posts', compact( 'posts'));
    }
}
