<div class="p-6 pt-3">
    <h1 class="md:text-2xl pb-10">Profil</h1>

    @if (session()->has('message'))

        <div
            class="alerts mb-6 bg-blue-100 border-l-2 border-blue-500 text-blue-700 px-4 py-3"
            role="alert"
        >
            <p class="font-bold">{{ session('message') }}</p>
            {{--            <p class="text-sm">Some additional text to explain said message.</p>--}}
        </div>
    @endif

    @if (session('delete'))
        <div
            class="alerts mb-6 bg-orange-100 border-l-2 border-orange-500 text-orange-700 p-4"
            role="alert"
        >
            <p class="font-bold">{{ session('delete') }}</p>
            {{--            <p class="text-sm">Some additional text to explain said message.</p>--}}
        </div>
    @endif
    <div class="flex justify-between items-start">


        <div class="flex ">
            <img class="rounded-lg archive-profile-img mb-2" style="object-fit: cover"  height="64px" src="{{Auth::user()->getProfilePhotoUrlAttribute()}}" >

            <h1 class="lg:font-semibold lg:text-xl md:text-xl pl-2" >{{Auth::user()->name}}</h1>
{{--            <p class="text-xs text-gray-300">{{}}</p>--}}
        </div>

{{--        @if(Auth::user()->youtube_account_id)--}}
{{--           @php($ytClass = 'data-social-container')@endphp--}}
{{--        @endif--}}
        <div {{Auth::user()->youtube_account_id ? 'data-social-container' : ''}} class="yt-icon-container flex relative ">

            <a data-social-btn  class="" href="{{url('archive/yt-profile')}}">
                    <img  width="32px"  src="{{url('svgs/yt-icon.svg')}}">
            </a>

            <x-social-links-drop data-social-content/>

            <a data-social-btn  class="ml-4" href="{{url('archive/twitch-profile')}}">
                <svg width="28" height="auto" viewBox="0 0 118 124" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.04705 0L0 21.5408V107.694H29.4922V123.857H45.5932L61.679 107.694H85.8137L118 75.3966V0H8.04705ZM18.768 10.7635H107.274V70.0008L88.4959 88.8511H59L42.9193 104.993V88.8516H18.768V10.7635ZM48.2717 64.6225H59V32.3159H48.2717V64.6225ZM77.7703 64.6225H88.4963V32.3159H77.7703V64.6225Z" fill="#5A3E85"/>
                </svg>

            </a>
{{--            {{Auth::user()}}--}}

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

            {{--            <div class="yt-icon-content card-bg-100 ">--}}
{{--                <input class="input-filler-color accent-bg textarea rounded-lg" type="text">--}}
{{--            </div>--}}

        </div>

    </div>

    <div class="mb-3">

        <form wire:submit.prevent="submitStatus">
            <textarea wire:model.defer="status" class="accent-bg textarea w-full text-gray-200 rounded-lg" type="text" name="text" required placeholder="Enter Status.."></textarea>
            <div class="flex justify-end">
                <button  class="accent-blue rounded-lg p-2 px-10 text-white" type="submit" >Submit</button>

            </div>
        </form>
    </div>

    <form class="pb-4 rounded-xxl card-bg-100 p-3"  wire:submit.prevent="createAdminPost" >


        <div class="w-full ">
            <label>Add Post</label>
            @if($imageFile)
                <div class="rounded-t-xl" style="background-image: url('{{$imageFile}}');
                    height: max-content;
                    width: 100% ;
                    height: 226px;
                    background-repeat: no-repeat;
                    background-size: cover;

                    " ></div>
            @endif
            @if($videoFile)
                <video class="post-vid w-full rounded-t-xl" autoplay muted preload="metadata" >
                    <source src="{{$videoFile}}#t=0.1" type="video/mp4">
                    <source src="{{$videoFile}}#t=0.1" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            @endif


            <div class="flex justify-start items-center" >
                <div class="  flex justify-between">
                    <label for="photo-file" class="file-icons">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.75 4.25C0.75 3.32174 1.11875 2.4315 1.77513 1.77513C2.4315 1.11875 3.32174 0.75 4.25 0.75H14.75C15.6783 0.75 16.5685 1.11875 17.2249 1.77513C17.8813 2.4315 18.25 3.32174 18.25 4.25V14.75C18.25 15.6783 17.8813 16.5685 17.2249 17.2249C16.5685 17.8813 15.6783 18.25 14.75 18.25H4.25C3.32174 18.25 2.4315 17.8813 1.77513 17.2249C1.11875 16.5685 0.75 15.6783 0.75 14.75V4.25Z" stroke="#E9E9E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.4375 8.625C7.64562 8.625 8.625 7.64562 8.625 6.4375C8.625 5.22938 7.64562 4.25 6.4375 4.25C5.22938 4.25 4.25 5.22938 4.25 6.4375C4.25 7.64562 5.22938 8.625 6.4375 8.625Z" stroke="#E9E9E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.7103 10.0434L4.25 18.25H14.8664C15.7638 18.25 16.6244 17.8935 17.259 17.259C17.8935 16.6244 18.25 15.7638 18.25 14.8664V14.75C18.25 14.3423 18.0969 14.1856 17.8213 13.8838L14.295 10.0381C14.1307 9.85887 13.9307 9.71582 13.708 9.61812C13.4853 9.52042 13.2447 9.47021 13.0015 9.47071C12.7583 9.4712 12.5178 9.52238 12.2955 9.62099C12.0732 9.71959 11.8739 9.86345 11.7103 10.0434V10.0434Z" stroke="#E9E9E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

{{--                        <img src="{{}}" >--}}
                    </label>
                    <input id="photo-file" wire:model.lazy="image" wire:change="$emit('imageChosen')" data-image-chosen type="file" name="image">

                </div>
                <div class="flex justify-between ">
                    <label class="file-icons" for="video-file">
                        <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3.8125C0 2.9837 0.32924 2.18884 0.915291 1.60279C1.50134 1.01674 2.2962 0.6875 3.125 0.6875H14.8438C15.6017 0.687411 16.3339 0.962801 16.9039 1.46239C17.4739 1.96197 17.8429 2.6517 17.9422 3.40312L22.8016 1.24375C23.0394 1.13777 23.3 1.09291 23.5596 1.11326C23.8192 1.13361 24.0696 1.21851 24.288 1.36025C24.5065 1.502 24.686 1.69609 24.8104 1.92488C24.9347 2.15367 24.9999 2.40992 25 2.67031V14.3297C24.9998 14.5899 24.9346 14.8459 24.8103 15.0745C24.6861 15.3031 24.5067 15.4971 24.2885 15.6388C24.0702 15.7805 23.8201 15.8654 23.5607 15.886C23.3013 15.9065 23.0409 15.8619 22.8031 15.7563L17.9422 13.5969C17.8429 14.3483 17.4739 15.038 16.9039 15.5376C16.3339 16.0372 15.6017 16.3126 14.8438 16.3125H3.125C2.2962 16.3125 1.50134 15.9833 0.915291 15.3972C0.32924 14.8112 0 14.0163 0 13.1875V3.8125ZM17.9688 11.8984L23.4375 14.3297V2.67031L17.9688 5.10156V11.8984ZM3.125 2.25C2.7106 2.25 2.31317 2.41462 2.02015 2.70765C1.72712 3.00067 1.5625 3.3981 1.5625 3.8125V13.1875C1.5625 13.6019 1.72712 13.9993 2.02015 14.2924C2.31317 14.5854 2.7106 14.75 3.125 14.75H14.8438C15.2582 14.75 15.6556 14.5854 15.9486 14.2924C16.2416 13.9993 16.4062 13.6019 16.4062 13.1875V3.8125C16.4062 3.3981 16.2416 3.00067 15.9486 2.70765C15.6556 2.41462 15.2582 2.25 14.8438 2.25H3.125Z" fill="#E9E9E9"/>
                        </svg>

                    </label>
                    <input id="video-file" class="rounded-xl p-2" wire:model.lazy="video" wire:change="$emit('videoChosen')" data-video-chosen type="file"  name="video">
                </div>

            </div>
            <textarea wire:model.defer="post.text" class="accent-bg textarea w-full text-gray-200 rounded-lg" type="text" name="text" required placeholder="Enter Text"></textarea>
        </div>



        <div class="flex justify-end">
            <button  class="accent-blue rounded-lg p-2 px-10 text-white" type="submit" >Submit</button>

        </div>
    </form>





    <div class="py-5 pt-20 rounded-xl">
        @foreach($posts as $post)

        <div class="pb-10">
            <div class="flex justify-between " >
                <h1 class="py-2 md:text-base md:font-semibold">{{$post->text}}</h1>
                @if(auth()->user()->role_id === 1)
                <a class="flex items-center" href="{{route('admin.archive.show', $post->id)}}" >
                    <img width="27px" src={{url('svgs/edit.svg')}}>
                </a>
                @else
{{--                    <a class="flex items-center" href="{{route('users.show', $post->id)}}" >--}}
{{--                        <img width="27px" src={{url('svgs/edit.svg')}}>--}}
{{--                    </a>--}}
                @endif


            </div>


            <div data-post-container class="post-cont">

                @if(!empty($post->image))
                    <img data-post-content class="post-image rounded-t-xl "  src="{{url('storage/images/' . $post->image)}}"/>
                    <div data-full-img-container="" class="full-img-container">
                        <div class="full-img-wrapper">
                            <img data-full-img="" class="full-img" src="">

                        </div>
                    </div>

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
                <ul class="py-1 px-4 flex justify-center gap-x-4 text-sm  accent-bg">
                    @isset($post->likes)
                        @php $likeCount=0 @endphp
                        @foreach($post->likes as $key => $like)
                            @php $likeCount++ @endphp
                        @endforeach
                        <li class="cursor-pointer flex items-center" wire:click="like({{$post->id}}, {{$likeCount}})">

                            Likes:

                            {{--        {{$post->likes}}--}}
                            <span class="ml-1 mr-2" >{{$likeCount }}</span>
                            {{--                                    @if()--}}
                            {{--                                    @endif--}}

                            @if(auth()->user()->likes()->where('post_id', $post->id)->first())

                                <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#1778F2"/>
                                </svg>

                            @else
                                <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#F8F8F8"/>
                                </svg>

                            @endif

                        </li>
                    @endisset

                    <div class="flex ">
                        @include('partials.share_links')
                    </div>

                </ul>


                <div x-bind:class="! open ? 'hidden' : ''" class="py-3 px-3 w-full flex-col text-gray-700 justify-between accent-bg">
                {{--                                    <h1>{{$post->artikel}}</h1>--}}
                <form wire:submit.prevent="createComment({{  $post->id }})">
                    <textarea class="card-bg-100 textarea w-full text-gray-200 rounded-lg" placeholder="make a comment here" class="w-full" wire:model.defer="comment" type="text"></textarea>
                    <div class="flex justify-end">
                        <button class="rounded-xl  px-4 py-2 text-white accent-blue" type="submit">Comment</button>

                    </div>
                </form>
                </div>

            </div>

                @php $commentsCounter = 0 @endphp

                @foreach($post->comments as $postComment)
                @php $commentsCounter++ @endphp
                @endforeach

                <div class="card-bg-100 rounded-b-xl py-2 px-3" x-data="{ showComments:false}">

                    <div class=" flex justify-end">
                        <button x-on:click="showComments = ! showComments" class="text-sm">{{$commentsCounter != 0 ? $commentsCounter . ' Comments' : ''}} </button>
                    </div>


                    @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
                </div>


            </div>

        @endforeach


    </div>


</div>

{{--<script >--}}
{{--    document.addEventListener('click', e => {--}}
{{--        // console.log('askjk')--}}
{{--        const isPostImg = e.target.matches('[data-social-btn]')--}}
{{--        console.log(isPostImg)--}}

{{--        // e.target.matches('[]')--}}
{{--        if (!isPostImg &&  e.target.closest('[data-social-container]') != null) return--}}
{{--        // console.log(isPostImg)--}}
{{--        let currentPostContainer--}}
{{--        if (isPostImg) {--}}
{{--            currentPostContainer = e.target.closest('[data-social-container]')--}}
{{--            // console.log(currentPostContainer)--}}

{{--            currentPostContainer.classList.toggle('active')--}}
{{--        }--}}

{{--        document.querySelectorAll('[data-social-container].active').forEach(container => {--}}
{{--            if (container === currentPostContainer) return--}}

{{--            container.classList.remove('active')--}}
{{--        })--}}

{{--    })--}}

{{--</script>--}}

<script>
Livewire.on('imageChosen', () => {
console.log('dskjsikj')
let imagePrewiev = document.querySelector('[data-image-chosen]')
console.log(imagePrewiev);

let file = imagePrewiev.files[0];

const reader = new FileReader();
console.log(reader);
reader.onloadend = (e) => {
photoPreview = e.target.result;
Livewire.emit('imageFile', [file.name, reader.result])
console.log(file.name)

};
reader.readAsDataURL(file);
})
Livewire.on('videoChosen', () => {

let videoPrewiev = document.querySelector('[data-video-chosen]')
let videoFile = videoPrewiev.files[0];

const reader = new FileReader();
reader.onloadend = () => {
Livewire.emit('videoFile', reader.result)
console.log(reader.result)

};
reader.readAsDataURL(videoFile);
})
</script>

