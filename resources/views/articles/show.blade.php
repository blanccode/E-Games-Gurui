<x-admin-app-layout>
    <livewire:left-nav />


    <div class="  main-section rounded-xl card-bg sm:mx-3" >
{{--                {{$latestArticle}}--}}
        <div class="px-8 py-3 flex justify-end items-center">
            <a href="{{url('articles/our-story')}}" class="text-right block underline-offset-8 underline ">View All Article</a>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.6133 24.0001C13.1946 23.9976 12.7812 23.9068 12.4 23.7334C11.9878 23.5517 11.6366 23.2552 11.3883 22.8793C11.14 22.5033 11.0052 22.0639 11 21.6134V10.3868C11.0052 9.93629 11.14 9.49685 11.3883 9.12092C11.6366 8.74499 11.9878 8.44846 12.4 8.26676C12.8743 8.04272 13.402 7.95642 13.923 8.01772C14.444 8.07901 14.9373 8.28542 15.3467 8.61343L22.1467 14.2268C22.4133 14.439 22.6287 14.7087 22.7767 15.0158C22.9247 15.3228 23.0016 15.6592 23.0016 16.0001C23.0016 16.3409 22.9247 16.6774 22.7767 16.9844C22.6287 17.2914 22.4133 17.5611 22.1467 17.7734L15.3467 23.3868C14.8565 23.7843 14.2444 24.0008 13.6133 24.0001ZM13.6133 10.6668V21.2001L20.0933 16.0001L13.6133 10.6668Z" fill="#ffff"/>
            </svg>
        </div>

        <div class="py-8 px-8">
            <div class="pb-8   flex gap-8 story-title-section">
                <div class="rounded-xxl w-3/6 ">
{{--                    <img class="rounded-img" src="{{url('storage/articles/images/'. $latestArticle->image)}}">--}}
                    <div
                        class="rounded-img mb-3 h-auto"
                        style="background-image: url('{{'/storage/articles/images/'. $storyArticle->image}}');
                            background-position: center;
                            height: 100%;
                            width: 100%;
                            aspect-ratio: 16 / 9;
                            background-size: cover;
                            ">
                    </div>
                    <ul class="pl-7 text-gray-200">
                        <li class=" mt-2 list-disc">{{$storyArticle->read_duration}} min read</li>
                    </ul>
                </div>

                <div>
                    <h1 class="font-bold xl:text-4xl md:text-2xl pb-3">Gaming Guide: - Title Here..</h1>
{{--                    <span class="text-gray-300">September 4th, 2022</span><br>--}}
                    <span class="text-gray-300">{{$storyArticle->created_at->format('F jS,  Y ')}}</span>

                    <div class="pt-4 flex items-center">
                        <img width="50px" class="rounded-2xl mr-3" src="{{url($storyArticle->user()->first()->profile_photo_url)}}">
                        <span class="text-gray-300">Author: Admin {{$storyArticle->user()->first()->name}}</span>
                    </div>
                </div>
            </div>

            <div class="paragraph-section py-14">
                <p class="xl:text-lg ">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                </p>
            </div>
        </div>


        <div class="other-articles-section py-8 px-8 card-bg-100">

            <h2 class="lg:text-2xl font-base">Other Articles that might interest you</h2>

            <div class="flex pt-8  gap-5">

                @foreach($latestArticle as $article)

                    <a href="{{url('articles/our-story/' . $article->id)}}" class="w-3/6 h-auto">
                        <img class="rounded-img mb-3 h-auto w-full" src="{{url('storage/articles/images/'. $article->image)}}" >
{{--                        <div--}}
{{--                            class="rounded-img mb-3 h-auto"--}}
{{--                            style="background-image: url('{{'/storage/articles/images/'. $article->image}}');--}}
{{--                                    background-position: center;--}}
{{--                                    max-height: 250px;--}}
{{--                                    width: 100%;--}}
{{--                                    aspect-ratio: 16 / 9;--}}
{{--                                    background-size: cover;--}}
{{--                            ">--}}
{{--                        </div>--}}
                        <h2 class="pl-2 mb-2 text-xl capitalize font-semibold">{{$article->title}}</h2>
                        <div class="flex justify-between pl-2 pr-2">
                            <ul class="pl-7 text-gray-200">
                                <li class=" mt-2 list-disc">{{$article->read_duration}} min read</li>
                            </ul>
                            <span class="text-gray-300">{{$article->created_at->format('F jS,  Y ')}}</span>

                        </div>
                    </a>

                @endforeach
            </div>


        </div>

    </div>


    <livewire:right-nav />
</x-admin-app-layout>

