<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPosts extends Component
{

    public $post;
    private $a;
    public $likes;
    public $isLiked = false;
    public $b;

    public function mount($id) {
        $this->b = $id;
        $post = Post::find($id);
        $this->id = $id;
        $this->a = $post->comments()->simplePaginate(5);
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

    public function render()
    {
        $post = Post::find($this->b);
        $paginatedComments = $post->comments()->simplePaginate(5);
//        dd($paginatedComments);


        return view('livewire.show-posts', compact('paginatedComments'));
    }
}
