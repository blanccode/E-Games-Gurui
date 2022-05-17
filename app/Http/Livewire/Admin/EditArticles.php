<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticles extends Component
{

    use WithFileUploads;

    public $newsInput;
    public $image = null;
    public $video = null;
    public $new;
    protected $listeners = ['imageFile' => 'handleChosenImg','videoFile' => 'handleChosenVideo'];
    public $imageFile;
    public $videoFile;

    public function mount($article)
    {

        $this->new = Article::find($article->id);

        if ($this->new) {
            $this->newsInput = $this->new->title;
            $this->newsInput = $this->new->text;
        }

    }

    public function handleChosenImg($imageChosenData) {
        $this->imageFile = $imageChosenData[1];

    }
    public function handleChosenVideo($videoChosenData) {
        $this->videoFile = $videoChosenData;

    }


    protected $rules = [
        'newsInput' => 'nullable|string|max:255',
//        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime'
    ];


    public function updateNews() {

        $this->validate();

        $data = [

            'text' =>$this->newsInput,

//            'video' =>$this->video ?? null,
        ];

        if (!empty($this->video)) {
            $this->video->store('public/article/videos');

        }

        if ($this->image) {
//            dd($this->image);
            $this->rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $this->validate();
            $this->image->store('public/articles/images');
            $data['image'] = $this->image->hashName();

            Article::find($this->new->id)->update($data);

            session()->flash('message', 'Article successfully updated.');
            return redirect()->to('/admin/articles');

//            $this->handleImageEdit($data);
        } else {
                $this->image = $this->new->image;
                $data['image'] = $this->image;

                if ($data['image']) {
                    Storage::delete($this->new->image);
                }

            Article::find($this->new->id)->update($data);

            session()->flash('message', 'Article successfully updated.');
            return redirect()->to('/admin/articles');

        }

    }

    private function handleImageEdit($data) {
        if ($data['image']) {
            Storage::delete($this->new->image);
        }
    }

    public function render()
    {
        $article = $this->new;

        return view('livewire.admin.edit-articles' , compact('article'));
    }
}
