<x-app-layout class="">
    <livewire:left-nav />

    <div class="p-5 main-section rounded-xl bg-white" >

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
    <livewire:right-nav />
</x-app-layout>
