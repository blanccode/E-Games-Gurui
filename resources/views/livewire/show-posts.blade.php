<div class="p-2.5 md:p-4 rounded-articles card-bg ">
    {{--            <livewire:dashboard-posts/>--}}

    <div class="py-5 ">
        <div class=" ">
            <div class="flex">
                <a href="{{route('users.show', $post->user->id)}}">
                    <img class="rounded-lg dashboard-user-img" width="64px" height="64px" style="object-fit: cover" src="{{$post->user->profile_photo_url}}">
                </a>



                <div  class="pl-2 w-full">
                    <h1 class="lg:font-semibold lg:text-xl md:text-xl" >{{$post->user->name}}</h1>
                    <p class="text-xs text-gray-400">{{$post->created_at->diffForHumans()}}</p>
                </div>


            </div>
            <h1 class="py-2 md:text-sm md:font-semibold">{{$post->text}}</h1>


            <div>


                <div>
                    <div data-post-container class="post-cont ">

                        @if(!empty($post->image))
                            <img data-post-content class="post-image rounded-t-xl "  src="{{url('storage/images/' . $post->image)}}"/>

                        @endif
                        @if(!empty($post->video))
                            <video  class="post-vid w-full rounded-t-xl"  preload="metadata" controls>
                                <source data-post-content src="{{url('storage/videos/' . $post->video)}}#t=0.1" type="video/mp4">
                                <source data-post-content src="{{url('storage/videos/' . $post->video)}}#t=0.1" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>

                        @endif

                        <div data-full-img-container class="full-img-container">
                            <div class="full-img-wrapper">
                                <img data-full-img class="full-img" src="">

                            </div>
                        </div>
                    </div >

                    <div x-data="{ open:true}" >
                        <ul class="py-1 px-4 flex justify-center gap-x-4 text-sm  accent-bg">
                            @isset($post->likes)
                                @php $likeCount=0 @endphp
                                @foreach($post->likes as $key => $like)
                                    @php $likeCount++ @endphp
                                @endforeach
                                <li class="flex items-center cursor-pointer" wire:click="like({{$post->id}}, {{$likeCount}})">

                                <span>Likes:</span>
                                <span class="ml-1" >{{$likeCount }}</span>

                                @if(auth()->user()->likes()->where('post_id', $post->id)->first())
                                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.7714 1.51224C12.6933 1.2118 11.8509 2.01536 11.5505 2.7643C11.2055 3.6268 10.8993 4.23199 10.5356 4.95505C10.2731 5.47385 10.0177 5.99619 9.76942 6.52192C9.08661 7.9738 8.40667 8.90242 7.91073 9.46161C7.73046 9.66764 7.53591 9.86074 7.32855 10.0395C7.28147 10.0799 7.23305 10.1188 7.18336 10.1559L7.16036 10.1732L4.46936 11.7587C3.8868 12.1024 3.44406 12.6405 3.219 13.2783C2.99394 13.9162 3.00097 14.6129 3.23886 15.2461L3.98636 17.2356C4.13984 17.6443 4.38439 18.0127 4.70145 18.3129C5.01852 18.613 5.39977 18.837 5.8163 18.9678L13.5155 21.3857C13.9711 21.5288 14.4507 21.5798 14.9262 21.5355C15.4017 21.4912 15.8636 21.3526 16.2849 21.1277C16.7062 20.9029 17.0785 20.5963 17.38 20.226C17.6815 19.8556 17.9061 19.4288 18.0408 18.9707L20.0015 12.2906C20.1273 11.8619 20.1514 11.4097 20.072 10.97C19.9925 10.5303 19.8117 10.1152 19.5438 9.75759C19.2759 9.39999 18.9283 9.10975 18.5287 8.9099C18.1291 8.71005 17.6884 8.6061 17.2415 8.6063H15.252C15.3469 8.27999 15.4432 7.91774 15.5324 7.54255C15.7207 6.73467 15.8817 5.81324 15.8659 5.04417C15.8529 4.32974 15.7796 3.57936 15.4864 2.94255C15.1715 2.25974 14.621 1.74655 13.7729 1.5108L13.7714 1.51224ZM7.15605 10.1775L7.15317 10.1789L7.15605 10.1775Z" fill="#1778F2"/>
                                    </svg>

                                @else
                                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.7714 1.51224C12.6933 1.2118 11.8509 2.01536 11.5505 2.7643C11.2055 3.6268 10.8993 4.23199 10.5356 4.95505C10.2731 5.47385 10.0177 5.99619 9.76942 6.52192C9.08661 7.9738 8.40667 8.90242 7.91073 9.46161C7.73046 9.66764 7.53591 9.86074 7.32855 10.0395C7.28147 10.0799 7.23305 10.1188 7.18336 10.1559L7.16036 10.1732L4.46936 11.7587C3.8868 12.1024 3.44406 12.6405 3.219 13.2783C2.99394 13.9162 3.00097 14.6129 3.23886 15.2461L3.98636 17.2356C4.13984 17.6443 4.38439 18.0127 4.70145 18.3129C5.01852 18.613 5.39977 18.837 5.8163 18.9678L13.5155 21.3857C13.9711 21.5288 14.4507 21.5798 14.9262 21.5355C15.4017 21.4912 15.8636 21.3526 16.2849 21.1277C16.7062 20.9029 17.0785 20.5963 17.38 20.226C17.6815 19.8556 17.9061 19.4288 18.0408 18.9707L20.0015 12.2906C20.1273 11.8619 20.1514 11.4097 20.072 10.97C19.9925 10.5303 19.8117 10.1152 19.5438 9.75759C19.2759 9.39999 18.9283 9.10975 18.5287 8.9099C18.1291 8.71005 17.6884 8.6061 17.2415 8.6063H15.252C15.3469 8.27999 15.4432 7.91774 15.5324 7.54255C15.7207 6.73467 15.8817 5.81324 15.8659 5.04417C15.8529 4.32974 15.7796 3.57936 15.4864 2.94255C15.1715 2.25974 14.621 1.74655 13.7729 1.5108L13.7714 1.51224ZM7.15605 10.1775L7.15317 10.1789L7.15605 10.1775Z" fill="#EEEEEE"/>
                                    </svg>
                                @endif
                            </li>

                            @endisset

                            <li class="flex items-center cursor-pointer">

                                <button x-on:click="open = ! open">
                                    Comment

                                </button>

                                <svg width="28" height="" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.667 14.6666C22.7496 14.6666 19.9517 15.8256 17.8888 17.8885C15.8259 19.9514 14.667 22.7492 14.667 25.6666V55C14.667 57.9173 15.8259 60.7152 17.8888 62.7781C19.9517 64.841 22.7496 66 25.667 66H29.3337V73.3333C29.3335 73.982 29.5055 74.6192 29.8321 75.1798C30.1586 75.7403 30.6281 76.2042 31.1925 76.5241C31.7569 76.8439 32.3961 77.0083 33.0448 77.0005C33.6935 76.9926 34.3285 76.8128 34.885 76.4793L52.3457 66H62.3337C65.251 66 68.0489 64.841 70.1118 62.7781C72.1747 60.7152 73.3337 57.9173 73.3337 55V25.6666C73.3337 22.7492 72.1747 19.9514 70.1118 17.8885C68.0489 15.8256 65.251 14.6666 62.3337 14.6666H25.667Z" fill="#EEEEEE"/>
                                </svg>
                            </li>

                            <li data-share-container class="share-container flex items-center cursor-pointer">

                                <span data-share-btn class="pr-1" >Share</span>

                                <img data-share-btn width="25px" class="pl-1.5" src="{{url('svgs/share.svg')}}">



                                <div data-share-content class="share-content rounded-xl accent-bg">


                                    <a   class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?text=Hey, check out my post at &url=http://localhost/posts/{{$post->id}}" >
                                        <img width="28px" height="auto" src="{{url('svgs/twitter.svg')}}">

                                    </a>
                                    <a   class="twitter-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/posts/{{$post->id}}" >
                                        <img width="28px" height="auto" src="{{url('svgs/fb-icon.svg')}}">

                                    </a>
{{--                                    <a   class="twitter-share-button" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=http://localhost/posts/{{$post->id}}" >--}}
{{--                                        <img width="28px" height="auto" src="{{url('svgs/linkedin-icon.svg')}}">--}}

{{--                                    </a>--}}
                                </div>
                            </li>


                        </ul>

                        {{--                            //////// POST-COMMENTS-SECTION //////////--}}
                        <div x-bind:class="! open ? 'hidden' : ''" class="py-3 px-3 w-full flex-col text-gray-700 justify-between accent-bg">
                            {{--                                    <h1>{{$post->artikel}}</h1>--}}
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

        {{--                @foreach( $paginatedComments as $comment)--}}
        {{--                    {{$comment->comment}}--}}
        {{--                @endforeach--}}

        {{--            //////// COMMENTS-SECTION //////////--}}
        @php $commentsCounter = 0 @endphp

        @foreach($post->comments as $postComment)
            @php $commentsCounter++ @endphp
        @endforeach

        <div class="card-bg-100 rounded-b-xl py-2 px-3" x-data="{ showComments:true}">

            <div class=" flex justify-end">
                @if($commentsCounter > 0)
                    <button x-on:click="showComments = ! showComments" class="text-sm">{{$commentsCounter == 1 ?  '1 Comment' : $commentsCounter . ' Comments'}} </button>


                @endif
            </div>

            @foreach($paginatedComments as $postComment)

                <div x-bind:class="! showComments ? 'hidden' : ''"  class="pt-4 flex items-start w-full pb-3">
                    <div class="flex pr-2">
                        <img class="rounded-xl comment-user-img" src="{{$postComment->user->profile_photo_url}}">

                    </div>
                    <div class="flex-1 rounded-xl p-2 pt-0 accent-bg ">
                        <h2 class="font-medium">{{$postComment->user->name}}:</h2>

                        <p class="self-end text-sm">{{$postComment->comment}}</p>
                    </div>
                </div>

            @endforeach

            {{--                    <div class="pt-2">--}}
            {{--                        {{$paginatedComments->links()}}--}}

            {{--                    </div>--}}
        </div>




    </div>


</div>

