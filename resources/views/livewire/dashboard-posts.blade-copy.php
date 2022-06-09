<div>

    @foreach($posts as $post)
        <div class="py-5 ">
            <div class=" ">
                        <div class="flex">
                            <a href="{{route('users.show', $post->user->id)}}">
                                <img class="rounded-lg dashboard-user-img" width="64px" height="64px" style="object-fit: cover" src="{{$post->user->profile_photo_url}}">
                            </a>



                            <a href="{{route('posts.show', $post->id)}}" class="pl-2 w-full">
                                <h1 class="lg:font-semibold lg:text-xl md:text-xl" >{{$post->user->name}}</h1>
                                <p class="text-xs text-gray-400">{{$post->created_at->diffForHumans()}}</p>
                            </a>


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

                        <div x-data="{ open:false}" >
                            <ul class="py-1 px-4 flex justify-center gap-x-7 text-sm  accent-bg">
                                @isset($post->likes)
                                    @php $likeCount=0 @endphp
                                    @foreach($post->likes as $key => $like)
                                        @php $likeCount++ @endphp
                                    @endforeach
                                    <li class="cursor-pointer flex items-center" wire:click="like({{$post->id}}, {{$likeCount}})">

                                            Likes:

{{--        {{$post->likes}}--}}
                                                <span class="ml-1 mr-1" >{{$likeCount }}</span>
        {{--                                    @if()--}}
        {{--                                    @endif--}}

                                        <div class="mb-1">

                                            @if(auth()->user()->likes()->where('post_id', $post->id)->first())
                                                    <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#1778F2"/>
                                                    </svg>

                                                @else
                                                    <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#F8F8F8"/>
                                                    </svg>

                                                @endif
                                        </div>
                                        </li>
                                @endisset

                                <div class="flex ">
                                    <li class="mr-5">
                                        <button class="flex items-center cursor-pointer" x-on:click="open = ! open">

                                            <svg width="28" height="" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M25.667 14.6666C22.7496 14.6666 19.9517 15.8256 17.8888 17.8885C15.8259 19.9514 14.667 22.7492 14.667 25.6666V55C14.667 57.9173 15.8259 60.7152 17.8888 62.7781C19.9517 64.841 22.7496 66 25.667 66H29.3337V73.3333C29.3335 73.982 29.5055 74.6192 29.8321 75.1798C30.1586 75.7403 30.6281 76.2042 31.1925 76.5241C31.7569 76.8439 32.3961 77.0083 33.0448 77.0005C33.6935 76.9926 34.3285 76.8128 34.885 76.4793L52.3457 66H62.3337C65.251 66 68.0489 64.841 70.1118 62.7781C72.1747 60.7152 73.3337 57.9173 73.3337 55V25.6666C73.3337 22.7492 72.1747 19.9514 70.1118 17.8885C68.0489 15.8256 65.251 14.6666 62.3337 14.6666H25.667Z" fill="#EEEEEE"/>
                                            </svg>
                                        </button>
                                    </li>
                                    <div data-share-container class="mr-3 share-container flex items-center cursor-pointer">
                                        {{--                                    <li class="cursor-pointer"  >--}}
                                        <div data-share-btn class="flex cursor-pointer">
                                            <img data-share-btn  width="23px" class="pl-1.5" src="{{url('svgs/share.svg')}}">
                                        </div>


                                        {{--                                    </li>--}}

                                        <div data-share-content class="share-content rounded-xl accent-bg">


                                            <a   class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?text=Hey, check out my post at &url=http://localhost/posts/{{$post->id}}" >
                                                <img width="28px" height="auto" src="{{url('svgs/twitter.svg')}}">

                                            </a>
                                            <a   class="twitter-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/posts/{{$post->id}}" >
                                                <img width="28px" height="auto" src="{{url('svgs/fb-icon.svg')}}">

                                            </a>
                                            <a   class="twitter-share-button" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=http://localhost/posts/{{$post->id}}" >
                                                <img width="28px" height="auto" src="{{url('svgs/linkedin-icon.svg')}}">

                                            </a>
                                        </div>
                                    </div>
                                </div>



                            </ul>

{{--                            //////// POST-COMMENTS-SECTION //////////--}}
                            <div x-bind:class="! open ? 'hidden' : ''" class="py-3 px-3 w-full flex-col text-gray-700 justify-between accent-bg">
                                {{--                                    <h1>{{$post->artikel}}</h1>--}}
{{--                                <form wire:submit.prevent="createComment({{  $post->id }})">--}}
                                <form method="post" action="{{ route('dashboard.store') }}">
                                    @csrf

{{--                                    <textarea class="card-bg-100 textarea w-full text-gray-200 rounded-lg" placeholder="Add a comment..." class="w-full" wire:model.defer="comment" type="text"></textarea>--}}
                                    <input type="text" name="comment" class="card-bg-100 textarea w-full text-gray-200 rounded-lg" />
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
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

            <div class="card-bg-100 rounded-b-xl py-2 px-3" x-data="{ showComments:true}">

                <div class=" flex justify-end">
                    @if($commentsCounter > 0)
                        <button x-on:click="showComments = ! showComments" class="text-sm">{{$commentsCounter == 1 ?  '1 Comment' : $commentsCounter . ' Comments'}} </button>
                    @endif
                </div>


            @foreach($post->comments as $postComment)


                <div x-data="{ showReplyWindow:false}">

                 <div  x-bind:class="! showComments ? 'hidden' : ''"  class="pt-4 flex items-start w-full pb-3">
                        <div class="flex pr-2">
                            <img class="rounded-xl comment-user-img" src="{{$postComment->user->profile_photo_url}}">

                        </div>
                        <div  class="flex-1 flex justify-between rounded-xl p-2 px-3  accent-bg ">
                            <div>
                                <h2 class="font-medium">{{$postComment->user->name}}:</h2>

                                <p class="self-end text-sm">{{$postComment->comment}}</p>

                            </div>

                            <div class="self-end " >
                                <a x-on:click="showReplyWindow = ! showReplyWindow">Reply</a>



                                <div>

                                </div>

                                @isset($postComment->commentLikes)
                                    @php $commentLikeCount=0 @endphp
                                    @foreach($postComment->commentLikes as $key => $like)
                                        @php $commentLikeCount++ @endphp
                                    @endforeach
                                    <li class="cursor-pointer flex items-center" wire:click="likeComment({{$postComment->id}}, {{$commentLikeCount}})">

                                        Likes:

                                        <span class="ml-1 mr-1" >{{$commentLikeCount }}</span>


                                        <div class="mb-1">
                                            @if(auth()->user()->commentLikes()->where('comment_id', $postComment->id)->first())
                                                <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#1778F2"/>
                                                </svg>

                                            @else
                                                <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#F8F8F8"/>
                                                </svg>

                                            @endif
                                        </div>


                                    </li>
                                @endisset

                            </div>

                        </div>

                     </div>



                    <div x-bind:class="! showReplyWindow ? 'hidden' : ''">

                        <form method="post" action="{{ route('dashboard.create') }}">
                            @csrf
{{--                            <textarea class="card-bg-100 textarea w-full text-gray-200 rounded-lg w-full"--}}
{{--                                      placeholder="Reply to {{$postComment->user->name}}'s comment .."--}}
{{--                                      wire:model.defer="reply"--}}
{{--                                      type="text">--}}

{{--                            </textarea>--}}
                            <input type="text" name="reply" class="card-bg-100 textarea w-full text-gray-200 rounded-lg w-full" />
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            <input type="hidden" name="comment_id" value="{{ $postComment->id }}" />

                            <div class="flex justify-end">
                                <button class="rounded-xl  px-4 py-2 text-white accent-blue" type="submit">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
                @include('partials.replies', ['comments' => $post->comments, 'post_id' => $post->id])
{{--                    <x-replies :$comment->replies="reply" />--}}
            @endforeach
        </div>




        </div>


    @endforeach

</div>

<script defer>
    document.addEventListener('click', e => {
        // console.log('askjk')
        const isPostImg = e.target.matches('[data-social-btn]')
        console.log(isPostImg)

        // e.target.matches('[]')
        if (!isPostImg &&  e.target.closest('[data-social-container]') != null) return
        // console.log(isPostImg)
        let currentPostContainer
        if (isPostImg) {
            currentPostContainer = e.target.closest('[data-social-container]')
            // console.log(currentPostContainer)

            currentPostContainer.classList.toggle('active')
        }

        document.querySelectorAll('[data-social-container].active').forEach(container => {
            if (container === currentPostContainer) return

            container.classList.remove('active')
        })

    })

</script>


