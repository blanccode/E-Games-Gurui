<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticlesPost extends Component
{

    use WithFileUploads;

    public Article $newsInput;
    public $image = null;
    public $video = null;
    public $comment;
    protected $listeners = [
        'imageFile' => 'handleChosenImg',
        'videoFile' => 'handleChosenVideo',
        'durationChanged' => 'handleDurationChange'
    ];
    public $imageFile;
    public $videoFile;
    public $duration;

    public function mount()
    {
        $this->newsInput = new Article();

    }

    public function handleDurationChange() {
        if ($this->duration <= 0) {
            $this->duration = 1;
        }
        if (preg_match('/[A-Za-z]/', $this->duration )) {
            $this->duration = 0;
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
        'newsInput.title' => 'required|string|max:50',
        'newsInput.text' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime',
        'duration' => 'required',

    ];



    public function createArticle( ) {

//        dd($this->image);

        $this->validate();


        $data = [
            'user_id' =>auth()->id(),
            'title' =>$this->newsInput->title,
            'text' =>$this->newsInput->text,
            'image' =>$this->image ? $this->image->hashName() : $this->image,
            'video' =>$this->video ? $this->video->hashName() : $this->video,
            'read_duration' => $this->duration,
        ];
//        dd($data);

        if (!empty($this->image)) {
            $this->image->store('public/articles/images');

        }if (!empty($this->video)) {
            $this->video->store('public/articles/videos');

        }

//        dd($data);


        Article::create($data);

        $this->newsInput->text = '';
        $this->newsInput->title = '';
        $this->video = '';
        $this->image = '';
        $this->imageFile = '';
        $this->videoFile = '';


    }
    public function render()
    {


//                    $posts = auth()->user()->posts();
        return view('livewire.articles-post',[
            'articles' => auth()->user()->latestAdminArticles,
        ]);

    }
}
