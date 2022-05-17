<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPosts extends Component
{

    use WithFileUploads;

    public $postInput;
    public $image = null;
    public $video = null;
    public $post;
    protected $listeners = ['imageFile' => 'handleChosenImg','videoFile' => 'handleChosenVideo'];
    public $imageFile;
    public $videoFile;

    public function mount($post)
    {
//        $this->newsInput = new News();
//        $this->new = $new ;
//        dd($post->id);
        $this->post = Post::find($post->id);
//        dd($this->post->id);

        if ($this->post) {
            $this->postInput = $this->post->text;
//            $this->image = $this->new->image;
//            $this->video = $this->new->video;
        }

    }

    public function handleChosenImg($imageChosenData) {
        $this->imageFile = $imageChosenData[1];
//        $this->image = $imageChosenData[0];

//        dd($this->imageFile);
    }
    public function handleChosenVideo($videoChosenData) {
        $this->videoFile = $videoChosenData;

//        dd($this->videoFile);
    }




    protected $rules = [
        'postInput' => 'nullable|string|max:255',
//        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime'

    ];





    public function updatePost() {

//        dd($this->image);

        $this->validate();


        $data = [

            'text' =>$this->postInput,

//            'video' =>$this->video ?? null,
        ];

        if (!empty($this->video)) {
            $this->video->store('public/videos');

        }


        if ($this->image) {
//            dd($this->image);
            $this->rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $this->validate();
            $this->image->store('public/images');
            $data['image'] = $this->image->hashName();

            Post::find($this->post->id)->update($data);

            session()->flash('message', 'Post successfully updated.');
            if(auth()->user()->role_id === 1) {
                return redirect()->to('/admin/archive');
            } else {
                return redirect()->to('/user');

            }


//            $this->handleImageEdit($data);
        } else {
            $this->image = $this->post->image;
            $data['image'] = $this->image;

            if ($data['image']) {
                Storage::delete($this->post->image);
            }

            Post::find($this->post->id)->update($data);

            session()->flash('message', 'Post successfully updated.');

            If(auth()->user()->role_id === 1) {
                return redirect()->to('/admin/archive');
            } else {
                return redirect()->to('/user');

            }


        }


    }


    public function render()
    {
        return view('livewire.admin.edit-posts');
    }
}
