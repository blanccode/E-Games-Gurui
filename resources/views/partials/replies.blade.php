
{{--{{print_r($replies)}}--}}
@foreach($replies as $key   => $reply)
{{--<p>{{$comment->id }}</p><br>--}}
@foreach($reply as $rep)
{{--    {{$rep->}}--}}
@endforeach

{{--    {{$reply->user}}--}}
    <div x-data="{ showReplyWindow: false}" class="ml-4 ">

        <div  class="pt-4 flex items-start w-full pb-3">
            <div class="flex pr-2">
                <img class="rounded-xl comment-user-img" src="{{$reply->user->profile_photo_url}}">

            </div>
            <div  class="flex-1 flex justify-between rounded-xl p-2 px-3  accent-bg ">
                <div>

                    <h2 class="font-medium ">{{$reply->user->name}}:</h2>

                    <p class="self-end ">{{$reply->comment}}</p>

                </div>

                <div   class="self-end " >
                    <a @click="showReplyWindow = ! showReplyWindow">Reply</a>


                    @isset($comment->commentLikes)
                        @php $commentLikeCount=0 @endphp
                        @foreach($comment->commentLikes as $key => $like)
                            @php $commentLikeCount++ @endphp
                        @endforeach
                        <li class="cursor-pointer flex items-center" wire:click="likeComment({{$reply->id}}, {{$commentLikeCount}})">
                            <div class="flex">

                                <div class="mb-1">
                                    @if(auth()->user()->commentLikes()->where('comment_id', $reply->id)->first())
                                        <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#1778F2"/>
                                        </svg>

                                    @else
                                        <svg width="23" height="23" viewBox="0 0 57 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M51.8763 16.9474H35.7152L38.1484 6.42676L38.225 5.69016C38.225 4.74626 37.7898 3.87146 37.0984 3.24996L34.3835 0.832764L17.5311 16.0035C16.5834 16.8323 16.02 17.9833 16.02 19.2495V42.2703C16.02 44.8024 18.325 46.8743 21.1423 46.8743H44.1925C46.3185 46.8743 48.1369 45.7234 48.9053 44.0659L56.6398 27.8362C56.8704 27.3067 56.9984 26.7542 56.9984 26.1557V21.5515C56.9984 19.0192 54.6933 16.9474 51.8763 16.9474ZM51.8763 26.1557L44.1925 42.2703H21.1423V19.2495L32.2577 9.25836L29.4148 21.5515H51.8763V26.1557ZM0.653076 19.2495H10.8977V46.8743H0.653076V19.2495Z" fill="#F8F8F8"/>
                                        </svg>

                                    @endif
                                </div>

                                <span class="ml-1 mr-1" >{{count(\App\Models\Comment::find($reply->id)->commentLikes)}}</span>

                            </div>

                        </li>


                    @endisset


                </div>

            </div>

        </div>
        <div
            x-show="showReplyWindow"
        >

            <form method="post" action="{{ route('reply.add') }}">
                @csrf
                <div class="form-group">
                    <div class="flex">
                        {{--                                <span class="card-bg-100 rounded-lg reply-name" readonly>jhnsjkls</span>--}}
                        <textarea data-textarea type="text" name="comment_body" class="rounded-xl card-bg-100 textarea w-full text-gray-200 rounded-lg w-full reply-area " value="">{{'@'.$reply->user->name}} </textarea>
                    </div>
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                    <input type="hidden" name="post_id" value="{{ $reply->commentable_id }}" />
{{--                    <input type="hidden" name="comment_id" value="{{ $reply->id }}" />--}}
                </div>
                <div class="form-group mt-2">
                    <input type="submit" class="rounded-xl  px-4 py-2 text-white accent-blue" value="Reply" />
                </div>
            </form>
        </div>

    </div>
{{--    @include('partials.replies', ['comments' => $comment->replies, 'replies' => $comment->replies])--}}

@endforeach
