<div class="p-6 pt-3">
    <h1 class="md:text-2xl pb-3">Profil</h1>

    <div class="flex justify-between items-start">

        <div class="flex ">
            <img class="rounded-lg archive-profile-img mb-2" style="object-fit: cover"  height="64px" src="{{$user->profile_photo_url}}" >


            <div class="pl-2">
                <h1 class="lg:font-semibold lg:text-xl md:text-xl pb-1" >{{$user->name}}</h1>

                <p>Youtube Score: {{$user->score}}</p>
                <p>Twitch Score: {{$user->twitch_score}}</p>
                <div class="">
                    <p class="">Follower: {{$followerCount}}</p>

                </div>

            </div>
        </div>

       <div>
           <div data-social-container class="yt-icon-container flex mb-2 ">

               <a class="yt-icon ml-3" target="_blank" href="{{$user->yt_channel_name ? 'https://www.youtube.com/channel/'. $user->youtube_account_id : ''}}">
                   <svg width="31" height="22" viewBox="0 0 114 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <g clip-path="url(#clip0_204_36)">
                           <path d="M111.482 12.4778C110.828 10.066 109.553 7.86731 107.783 6.10057C106.013 4.33383 103.81 3.06072 101.393 2.408C92.5467 0 56.9422 0 56.9422 0C56.9422 0 21.3359 0.0728887 12.4893 2.48089C10.0728 3.13364 7.86984 4.40683 6.09973 6.17365C4.32961 7.94047 3.05414 10.1393 2.40032 12.5511C-0.275563 28.2391 -1.31359 52.144 2.4738 67.2045C3.12768 69.6162 4.40319 71.8149 6.1733 73.5817C7.94341 75.3484 10.1464 76.6215 12.5628 77.2742C21.4094 79.6822 57.0148 79.6822 57.0148 79.6822C57.0148 79.6822 92.6197 79.6822 101.466 77.2742C103.882 76.6216 106.085 75.3485 107.856 73.5818C109.626 71.815 110.901 69.6163 111.555 67.2045C114.378 51.4942 115.247 27.6044 111.482 12.4782V12.4778Z" fill="#FF0000"/>
                           <path d="M45.6094 56.9156L75.1461 39.8409L45.6094 22.7662V56.9156Z" fill="white"/>
                       </g>
                   </svg>
               </a>

               <x-social-links-drop/>

               <a class="ml-4" target="_blank" href="{{$user->twitch_id ? 'https://www.twitch.tv/' . $user->twitch_display_name : ''}}">

                   <svg width="28" height="auto" viewBox="0 0 118 124" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M8.04705 0L0 21.5408V107.694H29.4922V123.857H45.5932L61.679 107.694H85.8137L118 75.3966V0H8.04705ZM18.768 10.7635H107.274V70.0008L88.4959 88.8511H59L42.9193 104.993V88.8516H18.768V10.7635ZM48.2717 64.6225H59V32.3159H48.2717V64.6225ZM77.7703 64.6225H88.4963V32.3159H77.7703V64.6225Z" fill="#5A3E85"/>
                   </svg>

               </a>
               <a class="ml-4" target="_blank" href="{{Auth::user()->twitter_channel_link}}">

                   <svg width="30" height="auto" viewBox="0 0 173 141" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M173 17.1696C166.522 20.0347 159.65 21.9153 152.614 22.7489C159.943 18.3637 165.57 11.4197 168.22 3.14586C161.253 7.27322 153.631 10.1812 145.682 11.7442C139.208 4.8581 129.984 0.554565 119.775 0.554565C100.173 0.554565 84.2807 16.4194 84.2807 35.9867C84.2807 38.7642 84.595 41.4682 85.1998 44.0622C55.7019 42.584 29.5492 28.478 12.0431 7.04057C8.98857 12.2738 7.23829 18.361 7.23829 24.8538C7.23829 37.1471 13.5048 47.992 23.0279 54.3464C17.3916 54.1702 11.8792 52.6504 6.95109 49.914C6.94906 50.0624 6.94906 50.2109 6.94906 50.36C6.94906 67.5275 19.1834 81.8488 35.4197 85.104C30.1931 86.523 24.7108 86.7307 19.3915 85.7111C23.9078 99.7882 37.0159 110.032 52.5467 110.319C40.3996 119.822 25.0951 125.487 8.46686 125.487C5.60155 125.487 2.77679 125.319 0 124.991C15.7072 135.045 34.3635 140.911 54.4071 140.911C119.692 140.911 155.392 86.9187 155.392 40.096C155.392 38.5591 155.358 37.0311 155.289 35.5118C162.238 30.4971 168.235 24.2858 173 17.1696" fill="#55ACEE"/>
                   </svg>
               </a>
               <a class="ml-4" target="_blank" href="{{Auth::user()->tiktok_channel_link}}">

                   <svg width="28" height="auto" viewBox="0 0 128 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <path d="M94.8599 52.2105C104.199 58.883 115.64 62.809 127.996 62.809V39.044C125.658 39.0445 123.325 38.8005 121.037 38.316V57.0225C108.682 57.0225 97.2424 53.097 87.9014 46.425V94.923C87.9014 119.185 68.2234 138.85 43.9514 138.85C34.8949 138.85 26.4769 136.114 19.4844 131.421C27.4654 139.577 38.5954 144.637 50.9084 144.637C75.1824 144.637 94.8609 124.971 94.8609 100.708V52.2105H94.8599V52.2105ZM103.445 28.2345C98.6719 23.023 95.5379 16.288 94.8599 8.84202V5.78552H88.2654C89.9254 15.249 95.5874 23.334 103.444 28.2345H103.445ZM34.8364 112.804C32.1698 109.309 30.7284 105.034 30.7349 100.639C30.7349 89.5425 39.7354 80.5455 50.8399 80.5455C52.909 80.5445 54.9659 80.862 56.9384 81.487V57.1905C54.6334 56.875 52.3074 56.7405 49.9824 56.79V75.701C48.009 75.0755 45.951 74.7581 43.8809 74.76C32.7769 74.76 23.7769 83.756 23.7769 94.8535C23.7769 102.701 28.2754 109.494 34.8364 112.804Z" fill="#FF004F"/>
                       <path d="M87.902 46.4245C97.2435 53.0965 108.682 57.022 121.038 57.022V38.3155C114.141 36.847 108.035 33.245 103.445 28.2345C95.5875 23.3335 89.926 15.2485 88.266 5.78552H70.9445V100.707C70.905 111.773 61.92 120.733 50.8395 120.733C44.3105 120.733 38.5095 117.623 34.836 112.803C28.276 109.494 23.777 102.7 23.777 94.854C23.777 83.7575 32.777 74.7605 43.881 74.7605C46.0085 74.7605 48.059 75.0915 49.9825 75.7015V56.7905C26.1365 57.283 6.95898 76.757 6.95898 100.708C6.95898 112.664 11.7345 123.502 19.4855 131.422C26.478 136.114 34.8955 138.852 43.9525 138.852C68.225 138.852 87.9025 119.184 87.9025 94.923V46.425H87.902V46.4245Z" fill="black"/>
                       <path d="M121.037 38.315V33.258C114.818 33.2674 108.721 31.5266 103.445 28.2345C108.116 33.3456 114.266 36.8702 121.037 38.316V38.315ZM88.265 5.785C88.1068 4.8808 87.9853 3.97055 87.901 3.0565V0H63.984V94.9225C63.946 105.988 54.961 114.948 43.88 114.948C40.7386 114.952 37.6402 114.218 34.835 112.804C38.5085 117.623 44.3095 120.732 50.8385 120.732C61.9185 120.732 70.9045 111.773 70.9435 100.707V5.7855H88.265V5.785ZM49.983 56.79V51.4055C47.9845 51.1323 45.9696 50.9957 43.9525 50.9965C19.6775 50.9965 0 70.6635 0 94.9225C0 110.132 7.7335 123.536 19.4855 131.421C11.7345 123.502 6.959 112.663 6.959 100.707C6.959 76.757 26.136 57.283 49.983 56.7905V56.79Z" fill="#00F2EA"/>
                   </svg>

               </a>

           </div>

           <div class="flex-col align-bottom justify-between">

               @forelse(auth()->user()->follows as $follow)
                   <button wire:click="follow({{$user->id}})" class="accent-blue-8 rounded-xl p-2 px-7 text-white font-semibold flex">
                       <img class="mr-2" width="25px" src="{{url('svgs/follow.svg')}}">
                       Unfollow {{$user->name}}
                   </button>

               @empty
                   <button wire:click="follow({{$user->id}})" class="accent-blue-8 rounded-xl p-2 px-7 text-white font-semibold flex">
                       <img class="mr-2" width="25px" src="{{url('svgs/follow.svg')}}">
                       Follow {{$user->name}}
                   </button>
               @endforelse


           </div>
       </div>



    </div>

    <div class="mt-4">
        <p>{{$user->status}}</p>
    </div>


    <div class="py-5  rounded-xl">
        @foreach($posts as $post)

            <div class="flex justify-between" >
                <h1 class="py-2 md:text-base md:font-semibold">{{$post->text}}</h1>
                <a class="flex items-center" href="{{route('admin.archive.show', $post->id)}}" >
                    <img width="27px" src={{url('svgs/edit.svg')}}>
                </a>


            </div>


            <div class="post-cont">

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


{{--            <div x-data="{ open:false}" >--}}
{{--                <ul class="py-1 px-2 flex justify-between text-sm  accent-bg">--}}
{{--                    <li>Like</li>--}}
{{--                    <li>--}}
{{--                        <button x-on:click="open = ! open">--}}
{{--                            Comment--}}
{{--                        </button>--}}
{{--                    </li>--}}
{{--                    <li>Share</li>--}}

{{--                </ul>--}}
{{--                <div x-bind:class="! open ? 'hidden' : ''" class="py-3 px-3 w-full flex-col text-gray-700 justify-between accent-bg">--}}
{{--                                                        <h1>{{$post->artikel}}</h1>--}}
{{--                    <form wire:submit.prevent="createComment({{  $post->id }})">--}}
{{--                        <textarea class="card-bg-100 textarea w-full text-gray-200 rounded-lg" placeholder="make a comment here" class="w-full" wire:model.defer="comment" type="text"></textarea>--}}
{{--                        <div class="flex justify-end">--}}
{{--                            <button class="rounded-xl  px-4 py-2 text-white accent-blue" type="submit">Comment</button>--}}

{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}


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
                            <span class="ml-1" >{{$likeCount }}</span>
                            {{--                                    @if()--}}
                            {{--                                    @endif--}}

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
                    <form wire:submit.prevent="createComment({{  $post->id }})">
                        <textarea class="card-bg-100 textarea w-full text-gray-200 rounded-lg" placeholder="Add a comment..." class="w-full" wire:model.defer="comment" type="text"></textarea>
                        <div class="flex justify-end">
                            <button class="rounded-xl  px-4 py-2 text-white accent-blue" type="submit">Comment</button>

                        </div>
                    </form>
                </div>

            </div>


{{--        /////////// COMMENTSECTION /////////////--}}

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
                            <img class="rounded-xl" width="50px" height="auto" src="{{$post->user->profile_photo_url}}">

                        </div>
                        <div class="flex-1 rounded-xl p-2 pt-0 accent-bg ">
                            <h2 class="font-medium">{{$post->user->name}}:</h2>

                            <p class="self-end text-sm">{{$postComment->comment}}</p>
                        </div>
                    </div>


                @endforeach
            </div>



        @endforeach


    </div>


</div>

