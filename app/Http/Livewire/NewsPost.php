<?php

namespace App\Http\Livewire;

use App\Models\News;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsPost extends Component
{

    use WithFileUploads;

    public News $newsInput;
    public $image = null;
    public $video = null;
    public $comment;
    protected $listeners = ['imageFile' => 'handleChosenImg','videoFile' => 'handleChosenVideo'];
    public $imageFile;
    public $videoFile;

    public function mount()
    {
        $this->newsInput = new News();


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
        'newsInput.text' => 'nullable|required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime'

    ];



    public function createNews( ) {

//        dd($this);

        $this->validate();


        $data = [
            'user_id' =>auth()->id(),
            'text' =>$this->newsInput->text,
            'image' =>$this->image ? $this->image->hashName() : $this->image,
            'video' =>$this->video ? $this->video->hashName() : $this->video,
        ];
//        dd($data);

        if (!empty($this->image)) {
            $this->image->store('public/news/images');

        }if (!empty($this->video)) {
            $this->video->store('public/news/videos');

        }

//        dd($data);


        News::create($data);

        $this->newsInput->text = '';
        $this->video = 0;
        $this->image = 0;
        $this->imageFile = '';
        $this->videoFile = '';


    }
    public function render()
    {
//                    $posts = auth()->user()->posts();
        return view('livewire.news-post',[
            'news' => auth()->user()->latestAdminNews,
        ]);

    }
}
