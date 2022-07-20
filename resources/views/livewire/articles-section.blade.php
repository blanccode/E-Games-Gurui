<div class="">

    <div class="articles-grid-container w-full">
        @foreach($articles as $article)

            <a href="{{url('articles/our-story/'. $article->id)}}" class="articles-items relative -z-1 rounded-articles">

{{--                @forelse()--}}
{{--                    --}}
{{--                    @else--}}
{{--                @endforelse--}}
                @if(App::environment('local'))

                    <img class="articles-item rounded-articles"  src="{{url( $article->image)}}"/>

                @elseif(!empty($article->image))

                    <img class="articles-item rounded-articles"  src="{{url('storage/articles/images/' . $article->image)}}"/>

                @endif

                @if(!empty($article->video))
                    <video class="articles-item rounded-articles"  preload="metadata" controls>
                        <source src="{{url('storage/articles/videos/' . $article->video)}}#t=0.1" type="video/mp4">
                        <source src="{{url('storage/articles/videos/' . $article->video)}}#t=0.1" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>

                @endif

                    <div class="black-overlay absolute z-30 inset-0 flex items-center justify-center rounded-articles overflow-hidden">
                        <h2 class="xl:text-3xl font-bold capitalize">{{$article->title}}</h2>
                    </div>
            </a>


        @endforeach
        </div>

</div>
