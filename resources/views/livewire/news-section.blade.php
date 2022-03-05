<div class="bg-blue-900 rounded-xl">
    <h1>News Section</h1>
    <div class="flex w-full">

        @foreach($news as $new)

            <div class="news-item">

                @if(!empty($new->image))
                    <img class=" rounded-t-xl "  src="{{url('storage/news/images/' . $new->image)}}"/>

                @endif
                @if(!empty($new->video))
                    <video class="basis-1/4 rounded-t-xl"  preload="metadata" controls>
                        <source src="{{url('storage/news/videos/' . $new->video)}}#t=0.1" type="video/mp4">
                        <source src="{{url('storage/news/videos/' . $new->video)}}#t=0.1" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>

                @endif
            </div>


        @endforeach
        </div>

</div>
