<div>

    @foreach($posts as $post)
        <div class="py-5 ">
            <div class=" ">
                <div class="flex">
                    <img class="rounded-lg dashboard-user-img" width="64px" height="64px" style="object-fit: cover" src="{{$post->user->profile_photo_url}}">

                    <div class="pl-2 ">
                        <h1 class="lg:font-semibold lg:text-xl md:text-xl" >{{$post->user->name}}</h1>
                        <p class="text-xs text-gray-400">{{$post->created_at->diffForHumans()}}</p>
                    </div>


                </div>

                <div>

                    <h1 class="py-2 md:text-sm md:font-semibold">{{$post->text}}</h1>

                    <div>
                        <div class="post-cont ">

                            @if(!empty($post->image))
                                <img class="post-image rounded-t-xl "  src="{{url('storage/images/' . $post->image)}}"/>

                            @endif
                            @if(!empty($post->video))
                                <video class="post-vid w-full rounded-t-xl"  preload="metadata" controls>
                                    <source src="{{url('storage/videos/' . $post->video)}}#t=0.1" type="video/mp4">
                                    <source src="{{url('storage/videos/' . $post->video)}}#t=0.1" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>

                            @endif
                        </div >

                        <div x-data="{ open:false}" >
                            <ul class="py-1 px-2 flex justify-between text-sm  accent-bg">
                                <li>Like</li>
                                <li>
                                    <button x-on:click="open = ! open">
                                        Comment
                                    </button>
                                </li>
                                <li>Share</li>

                            </ul>

{{--                            //////// POST-COMMENTS-SECTION //////////--}}

                            <div x-bind:class="! open ? 'hidden' : ''" class="py-3 px-3 w-full flex-col text-gray-700 justify-between accent-bg">
                                {{--                                    <h1>{{$post->id}}</h1>--}}
                                <form wire:submit.prevent="createComment({{  $post->id }})">
                                    <textarea class="card-bg-100 textarea w-full text-gray-200 rounded-lg" placeholder="Add a comment..." class="w-full" wire:model.defer="comment" type="text"></textarea>
                                    <div class="flex justify-end">
                                        <button class="rounded-xl  px-4 py-2 text-white accent-blue" type="submit">Comment</button>

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

{{--            //////// COMMENTS-SECTION //////////--}}
            @php $commentsCounter = 0 @endphp

            @foreach($post->comments as $postComment)
                @php $commentsCounter++ @endphp
            @endforeach

            <div class="card-bg-100 rounded-b-xl py-2 px-3" x-data="{ showComments:false}">

                <div class=" flex justify-end">
                    <button x-on:click="showComments = ! showComments" class="text-sm">{{$commentsCounter != 0 ? $commentsCounter . ' Comments' : ''}} </button>
                </div>

                @foreach($post->comments as $postComment)


                    <div x-bind:class="! showComments ? 'hidden' : ''"  class="pt-4 flex items-start w-full pb-3">
                        <div class="flex pr-2">
                            <img class="rounded-xl comment-user-img" src="{{$post->user->profile_photo_url}}">

                        </div>
                        <div class="flex-1 rounded-xl p-2 pt-0 accent-bg ">
                            <h2 class="font-medium">{{$post->user->name}}:</h2>

                            <p class="self-end text-sm">{{$postComment->comment}}</p>
                        </div>
                    </div>


                @endforeach
            </div>




        </div>


    @endforeach

</div>



