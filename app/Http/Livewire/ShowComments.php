<?php

namespace App\Http\Livewire;

use App\Models\CommentLike;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowComments extends Component
{

    public $comment;


    public function like($postId, $likeCount ) {

//        $post = Post::where('id',$postId)->first();
        $user = Auth::user();

        $likeRow = $user->likes()->where('post_id', $postId)->first();

        if (!$likeRow) {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $postId,
                'like' => true,
            ]);

            $this->isLiked = true;
            $likeCount++;
            $this->likes = $likeCount;
        } else {
            ///// User already liked current Post /////
            $likeRow->delete();

            $likeCount--;
            $this->likes = $likeCount;

        }



//        $post->like_count
    }

    public function likeComment($commentId, $commentLikeCount ) {
//        dd($commentId);

//        $post = Post::where('id',$commentId)->first();
        $user = Auth::user();

        $likeRow = $user->commentLikes()->where('comment_id', $commentId)->first();
//        dd($likeRow);
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

    public function render()
    {
//       $post = Post::with('comments.replies')->get()
        return view('livewire.show-comments');
    }
}
