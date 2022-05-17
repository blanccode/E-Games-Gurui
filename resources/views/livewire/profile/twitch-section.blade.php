<div class="p-6 pt-2">
    <div class="flex justify-between">
        <h1 class="md:text-2xl pb-3">Twitch-Profile</h1>

        @empty(!$initialUserData->twitch_id && $initialUserData->twitch_channel_link)
            <a class="twitch-text" href="{{$initialUserData->twitch_channel_link}}">Visit {{$initialUserData->name}}'s Twitch profile</a>

        @endempty
    </div>

    <div x-data>
        <div class="bg-green-600 bg-opacity-80 p-4 rounded-xl "
             x-cloak
             x-show="$wire.twitchId"
             x-transition.opacity.duration.500ms

        >

            <h4>Thank you!.</h4>
        </div>

    </div>

        @empty($initialUserData->twitch_id or $twitchId)
                <h2 class="p-2" >To see your Twitch Channel Data please Login to your Account.</h2>
                <div class="mt-3">
                    <a class="accent-blue rounded-lg p-2 px-10 text-white" href="{{$twitchUrl}}" >Login to Twitch</a>

                </div>

        @endempty


        @empty(!$initialUserData->twitch_id)
        <div class="flex justify-between items-start pt-3"

        >
            <div class="flex ">
                <img src="{{$initialUserData->twitch_profile_image_url}}" data-channel-img class="rounded-lg archive-profile-img mb-2" style="object-fit: cover"  height="64px" src="" >

            <div class="pl-2">
                <h1 data-channel-name class="lg:font-semibold lg:text-xl md:text-xl " >{{$initialUserData->twitch_display_name}}</h1>
                <ul>
                    <li>Score: <span data-channel-viewsCount >{{$initialUserData->twitch_score}}</span></li>
                </ul>
            </div>

                {{--                            <p class="text-xs text-gray-300">{{}}</p>--}}
            </div>
            <div>
                <ul>
                    {{--                    <li>Subscriber: <span data-channel-subsCount >{{$userViewCount}}</span></li>--}}
                    {{--                    <li>Total Videos: <span data-channel-videoCount >{{$channelData['yt_channel_video_count']}}</span></li>--}}
                    <li>Total Views: <span data-channel-viewsCount >{{$initialUserData->twitch_view_count}}</span></li>
                    <li>Total Followers: <span data-channel-viewsCount >{{$initialUserData->twitch_followers}}</span></li>
                </ul>

            </div>
        </div>


        @endempty



    @if($twitchId)

        <div class="flex justify-between items-start pt-3"

        >
            <div class="flex ">
                <img src="{{url($userProfileImageUrl)}}" data-channel-img class="rounded-lg archive-profile-img mb-2" style="object-fit: cover"  height="64px" src="" >

                <h1 data-channel-name class="lg:font-semibold lg:text-xl md:text-xl pl-2" >{{$userName}}</h1>



            </div>
            <div>
                <ul>
{{--                    <li>Subscriber: <span data-channel-subsCount >{{$userViewCount}}</span></li>--}}
{{--                    <li>Total Videos: <span data-channel-videoCount >{{$channelData['yt_channel_video_count']}}</span></li>--}}
                    <li>Total Views: <span data-channel-viewsCount >{{$userViewCount}}</span></li>
                    <li>Total Views: <span data-channel-viewsCount >{{$userFollowers}}</span></li>
                </ul>

            </div>
        </div>

    @elseif($initialUserData->twitch_Id)

        <div class="flex justify-between items-start pt-3"
                         x-data
                         x-cloak
                         x-show="$wire.currentUserData"
                         x-transition
        >
            <div class="flex ">
                <img src="{{$initialUserData->twitch_profile_image_url}}" data-channel-img class="rounded-lg archive-profile-img mb-2" style="object-fit: cover"  height="64px" src="" >

                <h1 data-channel-name class="lg:font-semibold lg:text-xl md:text-xl pl-2" >{{$initialUserData->twitch_display_name}}</h1>


            </div>
            <div>
                <ul>
{{--                    <li>Subscriber: <span data-channel-subsCount >{{number_format($currentUserData->yt_channel_subs)}}</span></li>--}}
{{--                    <li>Total Videos: <span data-channel-videoCount >{{number_format($currentUserData->yt_channel_video_count)}}</span></li>--}}
{{--                    <li>Total Views: <span data-channel-viewsCount >{{number_format($userViewCount)}}</span></li>--}}
                </ul>

            </div>
        </div>


    @endif


</div>





