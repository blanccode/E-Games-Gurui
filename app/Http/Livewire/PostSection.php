<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Post;
use Livewire\WithFileUploads;


class PostSection extends Component
{
    use WithFileUploads;

    public Post $post;
    public $image = null;
    public $video = null;
    public $comment;
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

    public function createComment($id) {
//        $this->validate();
        $data = [
            'comment' => $this->comment,
            'post_id' => $id,

        ];
        Comment::create($data);
    }


    protected $rules = [
        'post.text' => 'nullable|required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime'

    ];

    public function mount()
    {
        $this->post = new Post();


    }

    public function createPost( ) {

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

//        dd($data);


        Post::create($data);

        $this->post->text = '';
        $this->video = 0;
        $this->image = 0;
        $this->imageFile = '';
        $this->videoFile = '';


    }
    public function render()
    {
//                    $posts = auth()->user()->posts();
        return view('livewire.post-section',[
            'posts' => auth()->user()->latestPosts,
        ]);
    }
}
