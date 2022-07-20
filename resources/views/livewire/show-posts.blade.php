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


            <div class="rounded">


                <div >
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



                    @include('partials.add_comment_section')
                </div>

            </div>

        </div>

        {{--            //////// COMMENTS-SECTION //////////--}}

        <div class="">

            @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
        </div>



    </div>


</div>

