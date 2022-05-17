<?php

namespace App\Http\Livewire;

use App\Models\Comment;
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
    public $isLiked = false;
//    public $likeCount;

    public function mount() {
//       $isLiked = auth()->user()->likes()->where('post_id', $post->id)->first();
//       $this->isliked = false;

    }


    public function like($postId, $likeCount ) {

        $post = Post::where('id',$postId)->first();
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

    public function createComment($id) {
//        dd('sdkmjk');
//        $this->validate();
        $user = Auth::user();
        $data = [
            'comment' => $this->comment,
            'post_id' => $id,
            'user_id' => $user->id,
        ];
        Comment::create($data);
        $this->comment = '';
    }

    public function render()

    {
        $posts  = Post::latest()->get();


        return view('livewire.dashboard-posts', compact( 'posts'));
    }
}
