<div class="navs background right-nav rounded-nav">

    <div class="mb-4 px-3 py-4 card-bg rounded-nav">
        <h2 class="font-semibold xl:text-xl pb-3">Our Story</h2>

        @if($featuredArticle)
            <a href="{{url('articles/our-story/' . $featuredArticle->id)}}">
                <div class=" ">
                    <h2 class="font-semibold xl:text-lg mb-1">{{$featuredArticle->title}}</h2>
                    <img class="featured-article-img rounded-xxl "  src="{{url('storage/articles/images/' . $featuredArticle->image)}}"/>
                    <p class="text-clamp-3 my-2 mt-3 md:text-sm md:font-semibold">{{$featuredArticle->text}}</p>

                    <div class="flex justify-end items-center">
                        <p class="text-right font-semibold ">Read more..</p>
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6133 24.0001C13.1946 23.9976 12.7812 23.9068 12.4 23.7334C11.9878 23.5517 11.6366 23.2552 11.3883 22.8793C11.14 22.5033 11.0052 22.0639 11 21.6134V10.3868C11.0052 9.93629 11.14 9.49685 11.3883 9.12092C11.6366 8.74499 11.9878 8.44846 12.4 8.26676C12.8743 8.04272 13.402 7.95642 13.923 8.01772C14.444 8.07901 14.9373 8.28542 15.3467 8.61343L22.1467 14.2268C22.4133 14.439 22.6287 14.7087 22.7767 15.0158C22.9247 15.3228 23.0016 15.6592 23.0016 16.0001C23.0016 16.3409 22.9247 16.6774 22.7767 16.9844C22.6287 17.2914 22.4133 17.5611 22.1467 17.7734L15.3467 23.3868C14.8565 23.7843 14.2444 24.0008 13.6133 24.0001ZM13.6133 10.6668V21.2001L20.0933 16.0001L13.6133 10.6668Z" fill="#1778F2"/>
                        </svg>
                    </div>


                </div>
            </a>
        @endif

    </div>


{{--    <div class="products-container card-bg rounded-nav">--}}
{{--        <h2 class="pl-3 pt-3 pb-5" >Products that might interest you </h2>--}}

{{--        @foreach($products as $product)--}}

{{--            @if(!empty($product->image))--}}
{{--                <div class="pb-3 w-full">--}}
{{--                        <img class="w-full cursor-pointer" src="{{url('storage/articles/images/' . $product->image)}}">--}}
{{--                    </div>--}}
{{--            @endif--}}

{{--            @if(!empty($product->video))--}}
{{--                <video class="post-vid w-full pb-3 cursor-pointer"  preload="metadata" controls>--}}
{{--                    <source src="{{url('storage/articles/videos/' . $product->video)}}#t=0.1" type="video/mp4">--}}
{{--                    <source src="{{url('storage/articles/videos/' . $product->video)}}#t=0.1" type="video/ogg">--}}
{{--                    Your browser does not support the video tag.--}}
{{--                </video>--}}

{{--            @endif--}}
{{--        @endforeach--}}

{{--    </div>--}}
</div>
