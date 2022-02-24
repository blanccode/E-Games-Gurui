<x-app-layout class="">
    <livewire:left-nav />

    <div class="p-5 main-section rounded-xl bg-white" >

        <div class="py-5">
            @foreach($posts as $post)

                <div class="py-5 m-5 rounded-xl border-2 border-gray-100">
                    <div class=" border-2 border-gray-100">
                        <h1>{{$post['text']}}</h1>


                        @if(!empty($post->image))
                            <img class="w-full object-scale-down" width="320px" src="{{url('storage/images/' . $post->image)}}"/>

                        @endif
                        @if(!empty($post->video))
                            <video class="w-full" width="320" height="240" controls>
                                <source src="{{url('storage/videos/' . $post->video)}}" type="video/mp4">
                                <source src="{{url('storage/videos/' . $post->video)}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>

                        @endif
                    </div>

                    @foreach($post->comments as $postComment)
                        <div class="rounded border-2 border-gray-100 w-3/4 p-2 flex-row-reverse">
                            {{--        <h1>{{$postComment->id}}</h1>--}}
                            <h1 class="self-end">{{$postComment->comment}}</h1>
                            {{--        <h1>postId = {{$postComment->post_id  }}</h1>--}}
                        </div>


                    @endforeach
                </div>

            @endforeach
        </div>
    </div>
    <livewire:right-nav />
</x-app-layout>
