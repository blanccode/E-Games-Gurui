<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Post;
use Livewire\WithFileUploads;


class PostSection extends Component
{
    use WithFileUploads;

    public Post $newsInput;
    public $image = null;
    public $video = null;
    public $comment;
    public $status;
    protected $listeners = ['imageFile' => 'handleChosenImg','videoFile' => 'handleChosenVideo'];
    public $imageFile;
    public $videoFile;


//    protected $rules = [
//        'comment' => 'nullable|required|string|max:255',
//
//    ];

    public function handleChosenImg($imageChosenData) {
        $this->imageFile = $imageChosenData[1];
//        $this->image = $imageChosenData[0];

//        dd($this->imageFile);
    }
    public function handleChosenVideo($videoChosenData) {
        $this->videoFile = $videoChosenData;

//        dd($this->videoFile);
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


    protected $rules = [
        'post.text' => 'nullable|required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime'

    ];

    public function mount()
    {
        $this->post = new Post();

        $user = User::where('id',auth()->id())->first();
        $this->status = $user->status;


    }

    public function submitStatus() {

        User::where('id' , auth()->id())->update(['status' => $this->status]);
        session()->flash('message', 'Status successfully updated.');


    }

    public function createAdminPost( ) {

//        dd($this);

        $this->validate();


        $data = [
            'user_id' =>auth()->id(),
            'text' =>$this->post->text,
            'image' =>$this->image ? $this->image->hashName() : $this->image,
            'video' =>$this->video ? $this->video->hashName() : $this->video,
        ];
//        dd($data);

        if (!empty($this->image)) {
            $this->image->store('public/images');

        }if (!empty($this->video)) {
            $this->video->store('public/videos');

        }

        Post::create($data);

        $this->post->text = '';
        $this->video = '';
        $this->image = '';
        $this->imageFile = '';
        $this->videoFile = '';

        session()->flash('message', 'Post successfully created.');

    }
    public function render()
    {
//                    $posts = auth()->user()->posts();
        return view('livewire.post-section',[
            'posts' => auth()->user()->latestPosts,
        ]);
    }
}
