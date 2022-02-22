<div class="p-6">

    <form class="pb-4"  wire:submit.prevent="createPost" >
        <div class="w-full py-3">
            <label>Comment</label>
            <input wire:model="post.text" class="w-full" type="text" name="text" placeholder="Enter Text">
        </div>
        <div >
            <div class="py-3 w-full flex justify-between">
                <label>Choose Image</label>
                <input wire:model="image"  class="" type="file" name="image">
            </div>
            <div class="py-3 w-full flex justify-between">
                <label>Choose Video</label>
                <input wire:model="video" type="file"  name="video">
            </div>


        </div>


        <div class="flex justify-end">
            <button  class="bg-gray-900 rounded p-2 px-4 text-white" type="submit" >Submit</button>

        </div>
    </form>
    <hr>

    {{-- The best athlete wants his opponent at his best. --}}
    <div class="py-5">
        @foreach($posts as $post)

            <h1>{{$post['text']}}</h1>


            @if(!empty($post->image))
                <img width="320px" src="{{url('storage/images/' . $post->image)}}"/>

            @endif
            @if(!empty($post->video))
                <video width="320" height="240" controls>
                    <source src="{{url('storage/videos/' . $post->video)}}" type="video/mp4">
                    <source src="{{url('storage/videos/' . $post->video)}}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>

            @endif

        @endforeach
    </div>


</div>
