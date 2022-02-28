<div class="py-5">
    @foreach($posts as $post)

        <div class="py-5 m-5 rounded-xl border-2 border-gray-100">
            <div class=" border-2 border-gray-100">
                <h1>{{$post['text']}}</h1>

                <div class="post-cont">
                    @if(!empty($post->image))
                        <img class="post-image  "  src="{{url('storage/images/' . $post->image)}}"/>

                    @endif
                    @if(!empty($post->video))
                        <video class=" post-vid w-full"  preload="metadata" controls>
                            <source src="{{url('storage/videos/' . $post->video)}}" type="video/mp4">
                            <source src="{{url('storage/videos/' . $post->video)}}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>

                    @endif
                </div>

            </div>

            <div>
                <div class="py-3 w-full flex-col text-gray-700 justify-between">
                    {{--        <h1>{{$post->id}}</h1>--}}
                    <form wire:submit.prevent="createComment({{  $post->id }})">
                        <textarea placeholder="make a comment here" class="w-full" wire:model="comment" type="text"></textarea>
                        <button class="rounded bg-gray-900 px-4 py-2 text-white" type="submit">Comment</button>
                    </form>

                </div>

                @foreach($post->comments as $postComment)
                    <div class="rounded border-2 border-gray-100 w-3/4 p-2 flex-row-reverse">
                        {{--        <h1>{{$postComment->id}}</h1>--}}
                        <h1 class="self-end">{{$postComment->comment}}</h1>
                        {{--        <h1>postId = {{$postComment->post_id  }}</h1>--}}
                    </div>


                @endforeach
            </div>



        </div>

    @endforeach
</div>
