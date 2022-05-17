<x-admin-app-layout>
    <livewire:left-nav />

{{--    @forelse($latestArticles as $article)--}}
{{--        {{$article}}--}}
{{--    @empty--}}
{{--    @endforelse--}}
    <div class="card-bg-100 rounded-nav main-section rounded-xl card-bg sm:mx-3" >

        <div class="other-articles-section py-8 px-8 card-bg-100 rounded-nav">

            <h2 class="lg:text-2xl font-base pb-10">Our Story</h2>

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-8">

                @foreach($latestArticles as $article)

                    <a class="" href="{{url('articles/our-story/' . $article->id)}}" >
                        <img class="rounded-img mb-3 h-auto w-full" src="{{url('storage/articles/images/'. $article->image)}}" >
{{--                        <div--}}

{{--                            class=" rounded-img mb-3 h-auto"--}}
{{--                            style="background-image: url('{{'/storage/articles/images/'. $article->image}}');--}}
{{--                                background-position: center;--}}
{{--                                max-height: 250px;--}}
{{--                                width: 100%;--}}
{{--                                aspect-ratio: 16 / 9;--}}
{{--                                background-size: cover;--}}
{{--                                ">--}}
{{--                        </div>--}}
                        <h2 class="pl-2 mb-2 text-xl capitalize font-semibold">{{$article->title}}</h2>
                        <div class="flex justify-between items-center pl-2 pr-2">
                            <ul class="pl-7 text-gray-200">
                                <li class="list-disc">{{$article->read_duration}} min read</li>
                            </ul>
                            <span class="text-gray-300">{{$article->created_at->format('F jS,  Y ')}}</span>

                        </div>
                    </a>

                @endforeach

            </div>

            <div class="pt-10">
                {{$latestArticles->links()}}
            </div>



        </div>

    </div>


    <livewire:right-nav />
</x-admin-app-layout>
