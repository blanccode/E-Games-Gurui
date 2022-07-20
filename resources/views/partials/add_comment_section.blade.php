<div x-data="{ open:true}" >
    <ul class="py-1 px-4 flex justify-center gap-x-7 text-sm  accent-bg">
        @isset($post->likes)
{{--            @php $likeCount=0 @endphp--}}
{{--            @foreach($post->likes as $key => $like)--}}
{{--                @php $likeCount++ @endphp--}}
{{--            @endforeach--}}
            <li class="cursor-pointer flex items-center" wire:click="like({{$post->id}}, {{$likes}})">

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

                <span class="ml-1 mr-1" >{{$likes }}</span>

            </li>
        @endisset

        <div class="flex ">
            @include('partials.share_links')
        </div>



    </ul>

    {{--                            //////// POST-COMMENTS-SECTION //////////--}}
    <div x-bind:class="! open ? 'hidden' : ''" class="py-3 px-3 w-full flex-col text-gray-700 justify-between accent-bg">
        {{--                                    <h1>{{$post->artikel}}</h1>--}}
        {{--                                <form wire:submit.prevent="createComment({{  $post->id }})">--}}
        <form method="post" action="{{ route('comment.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="card-bg-100 textarea w-full text-gray-200 rounded-lg w-full" />
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group mt-2 ">
                <input type="submit" class="rounded-xl  px-4 py-2 text-white accent-blue" value="Comment" />
            </div>
        </form>
    </div>

</div>
