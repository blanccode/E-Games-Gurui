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
    public $video;
    public $comment;

//    protected $rules = [
//        'comment' => 'nullable|required|string|max:255',
//
//    ];

    public function createComment($id) {
//        $this->validate();
        $data = [
            'comment' => $this->comment,
            'post_id' => $id,

        ];
//        dd($data);
        Comment::create($data);
    }


    protected $rules = [
        'post.text' => 'nullable|required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimetypes:video/mp4'

    ];

    public function mount()
    {
        $this->post = new Post();

    }

    public function createPost( ) {


//        $post = new Post;
        $this->validate();
//        $post->text = $this->post->text;

////        $post->save();
//        Post::create([
//            'post.text' => $this->post->text,
//            'post.image' => $this->post->image,
//            'post.video' => $this->post->video,
//        ]);

        $data = [
            'user_id' =>auth()->id(),
            'text' =>$this->post->text,
            'image' =>$this->image ? $this->image->hashName() : $this->image,
            'video' =>$this->video ? $this->video->hashName() : $this->video,
        ];

        if (!empty($this->image)) {
            $this->image->store('public/images');

        }if (!empty($this->video)) {
            $this->video->store('public/videos');

        }

        Post::create($data);
//        $post->save();



//        $this->validate();
//        dd($this->post->image);
//        $imageUrl = $this->post->image->store('images', ['disk' => 'my_files']);
//        $videoUrl = $this->post->video->store('videos', 'public');

//        $this->validate([
//            'post.text' => 'required|string|max:255',
//            'post.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'post.video' => 'nullable|file|mimetypes:video/mp4'
//        ]);

//        $post->text = $this->post->text;
        $imageUrl = $this->post->image;
        $videoUrl = $this->post->video;
//        $post->image = $imageUrl;
//        $post->video = $videoUrl;

//
////            $post->save();
//        }if ($videoUrl) {
//            $videoPath = $this->post->video->file('video')->store('videos', ['disk' => 'my_files']);
//            $post->video = $videoPath;
//
////            $post->save();
//        }


//        dd('asjka');

    }
    public function render()
    {

//                    $posts = auth()->user()->posts();

        return view('livewire.post-section',[
            'posts' => auth()->user()->posts,
        ]);
    }
}
