<?php

namespace App\Http\Livewire\User;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public $user;
    public $isFollowed = false;
    public $comment;


    public function mount() {
//        dd($this->user['id']);
    }

    public function follow($followedUserId ) {

        $likedUser = User::where('id',$followedUserId)->first();
        $user = Auth::user();

        $followedUser = $user->follows()->where('user_id', $user->id)->first();

        if (!$followedUser) {
            Follow::create([
                'user_id' => $user->id,
                'followed_user' => $followedUserId,
                'follow' => true,
            ]);

            $this->isFollowed = true;
//            $followCount++;
//            $this->likes = $followCount;
        } else {
            ///// User already FOLLOWED CURRENT USER /////
            $followedUser->delete();

//            $followCount--;
//            $this->likes = $followCount;

        }



//        $post->like_count
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

        $followerCounts = Follow::where('followed_user', $this->user['id'])->get();

        if ($followerCounts) {
            $followerCount = 0;
            foreach ($followerCounts as $followers) {
                $followerCount++;
            }
        }
        $posts = User::find($this->user['id'])->latestPosts;
//        dd($posts);
        return view('livewire.user.profile', compact('posts', 'followerCount'));
    }
}
