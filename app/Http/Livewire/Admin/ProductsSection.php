<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsSection extends Component
{
    use WithFileUploads;

    public Product $productInput;
    public $image = null;
    public $video = null;
    public $comment;
    protected $listeners = ['imageFile' => 'handleChosenImg','videoFile' => 'handleChosenVideo'];
    public $imageFile;
    public $videoFile;

    public function mount()
    {
        $this->productInput = new Product();


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
        'productInput.name' => 'nullable|required|string|max:255',
        'productInput.text' => 'nullable|required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime'

    ];



    public function createAdminProduct( ) {

//        dd($this);

        $this->validate();


        $data = [
            'user_id' =>auth()->id(),
            'name' =>$this->productInput->name,
            'text' =>$this->productInput->text,
            'image' =>$this->image ? $this->image->hashName() : $this->image,
            'video' =>$this->video ? $this->video->hashName() : $this->video,
        ];
//        dd($data);

        if (!empty($this->image)) {
            $this->image->store('public/article/images');

        }if (!empty($this->video)) {
            $this->video->store('public/article/videos');

        }

//        dd($data);


        Product::create($data);

        $this->productInput->text = '';
        $this->video = '';
        $this->image = '';
        $this->imageFile = '';
        $this->videoFile = '';


    }
    public function render()
    {
//                    $posts = auth()->user()->posts();
        return view('livewire.admin.products-section',[
            'products' => auth()->user()->latestAdminProducts,
        ]);

    }
}
