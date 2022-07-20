<?php

namespace App\Http\Livewire;

use App\Models\CommentLike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPosts extends Component
{

    public $post;

    public $LikeCount;
    public $isLikeByUser;

    private $a;
    public $likes;
    public $isLiked = false;
    public $b;
    public $commentLikeCount;
    public $comments;
    public $commentLikes;
    public $likeArray;

    public function mount($id) {
        $this->b = $id;
        $post = Post::find($id);
        $this->id = $id;
        $this->a = $post->comments()->simplePaginate(5);

        foreach ($post->likes as $key => $likes) {
            $this->likes++;
        }


    }



    public function like($postId ) {

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
            $this->likes++;

//            $this->likes = $likeCount;
        } else {
            ///// User already liked current Post /////
            $likeRow->delete();
            $this->isLiked = false;
            $this->likes--;
//            $likeCount--;
//            $this->likes = $likeCount;

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

            $this->commentLikes = $commentLikeCount;
            return $this->commentLikes++;
        } else {
            ///// User already liked current Post /////
            $likeRow->delete();

            $this->commentLikes = $commentLikeCount;
            return $this->commentLikes--;
//            $this->commentLikeCount = $commentLikeCount;
//            dd($this->commentLikeCount);

        }



//        $post->like_count
    }


    public function render()
    {
        $post = Post::find($this->b);
        $paginatedComments = $post->comments()->simplePaginate(5);
//        dd($paginatedComments);
//        foreach ($post->comments as $key => $comment) {
//            echo( $comment->commentLikes);
//
//            foreach ($comment->replies as $replies) {
////                echo $replies->comment;
//            }
//        }


        foreach ($post->comments as $key => $comment) {
//            echo( $comment->commentLikes);
            $likeArray = [];

            foreach ($comment->commentLikes as $key => $likes) {


                array_push($likeArray, $likes );
//                echo $key;
//                 = $likes;
//                $this->likeArray[] = $key;


            }


//            var_dump($likeArray) ;
            foreach($likeArray as $key => $value) {
//                $this->likeArray++;
//            echo "<pre>";
//            array_keys($likeArray);
//            echo "</pre>";

                array_push($likeArray, $likes );
            }

            $this->likeArray = $likeArray;

        }

        return view('livewire.show-posts', compact('paginatedComments'));
    }
}
