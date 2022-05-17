<div class="p-6 pt-2">

    <div class="flex justify-between">
        <h1 class="md:text-2xl pb-3">Youtube-Profil</h1>
{{--        @empty(!$currentUserData->yt_channel_url && $currentUserData->yt_channel_link)--}}
            <a class="yt-text" href="{{$currentUserData->youtube_account_id ? 'https://www.youtube.com/channel/'. $currentUserData->youtube_account_id : $currentUserData->yt_channel_link}}">Visit {{$currentUserData->name}}'s Youtube profile</a>

{{--        @endempty--}}
    </div>


    <div x-data>
        <div class="bg-green-600 bg-opacity-80 p-4 rounded-xl "
             x-cloak
             x-show="$wire.channelId"
             x-transition.opacity.duration.500ms
        >

            <h4>Thank you, Id was succesfully send.</h4>
        </div>

    </div>

{{--    @empty($currentUserData->youtube_account_id or $channelId)--}}
{{--        <form wire:submit.prevent="postChannelId">--}}
{{--            <h2 class="p-2" >To see your Channel Data please submit your Channel Id</h2>--}}
{{--            <div class="">--}}
{{--                <input wire:model.defer="channelId" class="input-filler-color accent-bg textarea w-full  rounded-xl p-2" placeholder="Channel-Id" required>--}}

{{--                <div class="flex justify-end py-4">--}}
{{--                    <button type="submit" class="accent-blue rounded-lg p-2 px-5 text-white" >Submit</button>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    @endempty--}}

@empty($currentUserData->youtube_account_id or $channelId)

        <form wire:submit.prevent="postChannelId">
            <h2 class="p-2" >To see your Channel Data please submit your Channel Id</h2>
            <div class="">
                <input wire:model.defer="channelId" class="input-filler-color accent-bg textarea w-full  rounded-xl p-2" placeholder="Channel-Id" required>

                <div class="flex justify-end py-4">
                    <button type="submit" class="accent-blue rounded-lg p-2 px-5 text-white" >Submit</button>

                </div>
            </div>

        </form>
        <h2 class="p-5 mt-5 accent-blue-5 rounded-xxl">Please provide the Id of your YouTube Account to see your Channel Data and Rank in our Contendership Programm </h2>
@endempty







{{--    <div wire:click="updateChannelData" class="flex">--}}
{{--        <h2 >fetch channel data</h2>--}}
{{--        <svg class=" ml-5" width="28" height="auto" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--            <path d="M55.9556 34.8C56.2251 34.7996 56.4921 34.8526 56.7411 34.9559C56.9901 35.0593 57.2161 35.2109 57.4062 35.4021C57.5963 35.5932 57.7466 35.8201 57.8486 36.0697C57.9505 36.3193 58.002 36.5865 58.0001 36.8561V46.1477C58.002 46.4161 57.951 46.6821 57.8499 46.9308C57.7489 47.1794 57.5999 47.4056 57.4113 47.5966C57.2228 47.7876 56.9984 47.9395 56.7511 48.0437C56.5038 48.1479 56.2384 48.2023 55.9701 48.2038C55.7017 48.2023 55.4363 48.1479 55.189 48.0437C54.9417 47.9395 54.7173 47.7876 54.5288 47.5966C54.3402 47.4056 54.1912 47.1794 54.0902 46.9308C53.9892 46.6821 53.9381 46.4161 53.9401 46.1477V42.8852C48.6592 51.7476 38.8572 58 28.2954 58C15.5064 58 4.78795 50.1091 0.139252 37.9465C-0.0559349 37.4398 -0.0436379 36.8765 0.173479 36.3788C0.390596 35.881 0.795053 35.4889 1.29925 35.2872C2.34325 34.8783 3.52065 35.4032 3.92665 36.4617C7.98665 47.0815 17.2319 53.8907 28.2954 53.8907C38.0713 53.8907 47.2034 47.5629 51.4577 38.9441L47.1918 38.9731C46.9234 38.9735 46.6576 38.921 46.4096 38.8185C46.1615 38.7161 45.9361 38.5658 45.7463 38.3762C45.5564 38.1865 45.4057 37.9613 45.3029 37.7135C45.2002 37.4656 45.1473 37.1999 45.1473 36.9315C45.1403 36.3897 45.3486 35.8674 45.7265 35.4791C46.1045 35.0909 46.621 34.8685 47.1628 34.8609L55.9556 34.8ZM29.7106 0C42.4938 0 53.2151 7.8909 57.8638 20.0535C58.0589 20.5602 58.0466 21.1235 57.8295 21.6212C57.6124 22.119 57.208 22.5111 56.7038 22.7128C56.4543 22.8101 56.188 22.8568 55.9203 22.8503C55.6526 22.8438 55.3889 22.7842 55.1445 22.675C54.9 22.5657 54.6797 22.4089 54.4964 22.2138C54.313 22.0187 54.1702 21.7891 54.0764 21.5383C50.0164 10.9185 40.7712 4.1093 29.7077 4.1093C19.9318 4.1093 10.7997 10.4371 6.54535 19.0559L10.8113 19.0269C11.0796 19.0265 11.3454 19.079 11.5934 19.1815C11.8415 19.2839 12.0669 19.4342 12.2568 19.6238C12.4466 19.8135 12.5973 20.0387 12.7001 20.2865C12.8028 20.5344 12.8558 20.8001 12.8558 21.0685C12.8627 21.6103 12.6544 22.1326 12.2765 22.5209C11.8986 22.9091 11.382 23.1315 10.8403 23.1391L2.04455 23.2C1.77498 23.2004 1.50799 23.1474 1.25901 23.0441C1.01003 22.9407 0.783971 22.7891 0.593893 22.5979C0.403814 22.4068 0.253475 22.1799 0.151551 21.9303C0.0496269 21.6807 -0.00186337 21.4135 5.15116e-05 21.1439V11.8523C5.15116e-05 10.7155 0.907752 9.7962 2.03005 9.7962C3.14945 9.7962 4.06005 10.7155 4.06005 11.8523V15.1148C9.34095 6.2524 19.143 0 29.7048 0H29.7106Z" fill="#EEEEEE"/>--}}
{{--        </svg>--}}
{{--    </div>--}}

{{--    {{$currentUserData->youtube_account_id}}--}}


@if($channelData)

        <div class="flex justify-between items-start pt-3"

        >
            <div class="flex ">
                <img src="{{url($channelData['yt_channel_url'])}}" data-channel-img class="rounded-lg archive-profile-img mb-2" style="object-fit: cover"  height="64px" src="" >

                <h1 data-channel-name class="lg:font-semibold lg:text-xl md:text-xl pl-2" >{{$channelData['yt_channel_name']}}</h1>


                {{--            <p class="text-xs text-gray-300">{{}}</p>--}}
            </div>
            <div>
                <ul>
                    <li>Subscriber: <span data-channel-subsCount >{{$channelData['yt_channel_subs']}}</span></li>
                    <li>Total Videos: <span data-channel-videoCount >{{$channelData['yt_channel_video_count']}}</span></li>
                    <li>Total Views: <span data-channel-viewsCount >{{$channelData['yt_channel_views']}}</span></li>
                </ul>

            </div>
        </div>
    @elseif($currentUserData->yt_channel_url)
{{--        {{$currentUserData->youtube_account_id}}--}}
{{--    {{$currentUserData->yt_channel_url}}--}}

        <div class="flex justify-between items-start pt-3"
{{--             x-data--}}
{{--             x-cloak--}}
{{--             x-show="$wire.currentUserData"--}}
{{--             x-transition--}}
        >
            <div class="flex ">
                <img src="{{url($currentUserData->yt_channel_url)}}" data-channel-img class="rounded-lg archive-profile-img mb-2" style="object-fit: cover"  height="64px" src="" >

                <div class="pl-2">
                    <h1 data-channel-name class="lg:font-semibold lg:text-xl md:text-xl " >{{$currentUserData->yt_channel_name}}</h1>

                    <ul>
                        <li>Score: <span data-channel-viewsCount >{{number_format($currentUserData->score)}}</span></li>
                    </ul>
                </div>

                {{--            <p class="text-xs text-gray-300">{{}}</p>--}}
            </div>
            <div>
                <ul>
                    <li>Subscriber: <span data-channel-subsCount >{{number_format($currentUserData->yt_channel_subs)}}</span></li>
                    <li>Total Videos: <span data-channel-videoCount >{{number_format($currentUserData->yt_channel_video_count)}}</span></li>
                    <li>Total Views: <span data-channel-viewsCount >{{number_format($currentUserData->yt_channel_views)}}</span></li>
                </ul>

            </div>
        </div>


    @endif

    <div class="pt-5 pb-3">
        <h3>Recent Videos</h3>


        <div data-yt-video-container class="flex flex-wrap yt-video-container md:mx-auto">
            <div class="yt-videos">
                <iframe  width="100%" height="auto" data-yt-video src="https://www.youtube.com/embed/S-VeYcOCFZw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-videos">
                <iframe  width="100%" height="auto" data-yt-video src="https://www.youtube.com/embed/S-VeYcOCFZw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-videos">
                <iframe  width="100%" height="auto" data-yt-video src="https://www.youtube.com/embed/S-VeYcOCFZw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="yt-videos">
                <iframe  width="100%" height="auto" data-yt-video src="https://www.youtube.com/embed/S-VeYcOCFZw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>
    </div>

</div>


<script src="https://apis.google.com/js/plus.js?onload=init"></script>

<script >
    const getChannelNameElement = document.querySelector("[data-channel-name]")
    const getChannelSubsCountElement = document.querySelector("[data-channel-subsCount]")
    const getChannelVideoCountElement = document.querySelector("[data-channel-videoCount]")
    const getChannelViewsCountElement = document.querySelector("[data-channel-viewsCount]")
    const getChannelImgElement = document.querySelector("[data-channel-img]")
    const getChannelVideoElement = document.querySelector("[data-yt-video]")
    const getChannelVideoContainer = document.querySelector("[data-yt-video-container]")

    function start() {

        let part = 'snippet,contentDetails,statistics';
        let maxResults = 1;
        // let apiKey = config('services.youtube.api_key');
        let youtubeEndpoint = "https://youtube.googleapis.com/youtube/v3/channels";

        const channelId = "UCic48jpZWaG_kQ0sj9pTS1w";


        let url = `${youtubeEndpoint}?part=${part}&maxResults=${maxResults}&id=${channelId}`;
        // 2. Initialize the JavaScript client library.
        gapi.client.init({
            'apiKey': 'AIzaSyCekb0VOR5huTAL6M5Kt6RQUJIxdF6V494',

        }).then(function() {
            // 3. Initialize and make the API request.
            return gapi.client.request({
                'path': url,
            })
        }).then(function(response) {
            console.log(response.result);
            let object  = response.result

            // console.log(object.items[0].snippet.title);
            const channelName = object.items[0].snippet.title;
            const channelNameText = getChannelNameElement.innerHTML = channelName
            // console.log(channelNameText)

            // $formatedResponse->{'items'}[0]->{'statistics'}->{'subscriberCount'};
            // console.log(object.items[0].statistics.subscriberCount);
            const channelSubsCount = object.items[0].statistics.subscriberCount;
            const channelSubsCountNumber = getChannelSubsCountElement.innerHTML = formatNumber(channelSubsCount)
            // console.log(channelSubsCountNumber)


            const channelImageUrl = object.items[0].snippet.thumbnails.default.url;
            getChannelImgElement.src = channelImageUrl

            const channelVideoCount = object.items[0].statistics.videoCount;
            const channelViewsCount = object.items[0].statistics.viewCount;
            // console.log(parseInt(channelViewsCount).toLocaleString('de-De'))
            // const formated = channelViewsCount.toLocaleString('en-GB')
            getChannelVideoCountElement.innerHTML = formatNumber(channelVideoCount)
            getChannelViewsCountElement.innerHTML = formatNumber(channelViewsCount)

            const playlistId = object.items[0].contentDetails.relatedPlaylists.uploads;
            console.log(playlistId);
            requestVideoPlaylist(playlistId);




        }, function(reason) {
            console.log('Error: ' + reason.result.error.message);
        })
    };
    // 1. Load the JavaScript client library.
    // gapi.load('client', start);

    function api() {
        let part = 'snippet';
        let maxResults = 1;
        const playlistIdParam = 'nintendo de';
        let youtubeEndpoint = 'https://youtube.googleapis.com/youtube/v3/search'

        let url = `${youtubeEndpoint}?part=${part}&maxResults=${maxResults}&q=${playlistIdParam}`;
        // 2. Initialize the JavaScript client library.
        gapi.client.init({
            'apiKey': 'AIzaSyCekb0VOR5huTAL6M5Kt6RQUJIxdF6V494',

        }).then(function() {
            // 3. Initialize and make the API request.
            return gapi.client.request({
                'path': url,
            })
        }).then(function(response) {
            console.log(response.result);
            // let videos  = response.result.items;
            // console.log(videos)
            //
            // let output = ''
            // videos.forEach(video => {
            //     const videoId = video.snippet.resourceId.videoId
            //     output +=
            //         `<div class="yt-videos">
            //          <iframe  width="100%" height="auto" data-yt-video src="https://www.youtube.com/embed/${videoId}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            //          </div>`
            //
            // })
            // getChannelVideoContainer.innerHTML = output;

        }, function(reason) {
            console.log('Error: ' + reason.result.error.message);
        })
    }

    function requestVideoPlaylist(playlistId) {
        let part = 'snippet,contentDetails';
        let maxResults = 4;
        const playlistIdParam = playlistId;
        let youtubeEndpoint = 'https://youtube.googleapis.com/youtube/v3/playlistItems'

        let url = `${youtubeEndpoint}?part=${part}&maxResults=${maxResults}&playlistId=${playlistIdParam}`;
        // 2. Initialize the JavaScript client library.
        gapi.client.init({
            'apiKey': 'AIzaSyCekb0VOR5huTAL6M5Kt6RQUJIxdF6V494',

        }).then(function() {
            // 3. Initialize and make the API request.
            return gapi.client.request({
                'path': url,
            })
        }).then(function(response) {
            console.log(response.result);
            let videos  = response.result.items;
            console.log(videos)

            let output = ''
            videos.forEach(video => {
                const videoId = video.snippet.resourceId.videoId
                output +=
                    `<div class="yt-videos">
                     <iframe  width="100%" height="auto" data-yt-video src="https://www.youtube.com/embed/${videoId}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     </div>`

            })
            getChannelVideoContainer.innerHTML = output;

        }, function(reason) {
            console.log('Error: ' + reason.result.error.message);
        })
    }
    // .toLocaleString('de-DE');

    function formatNumber($number) {
        return parseInt($number).toLocaleString('de-DE')
    }

    var value = (100000).toLocaleString(
        'de-DE', // leave undefined to use the visitor's browser
        // locale or a string like 'en-US' to override it.

    );
    // console.log(23478239);
</script>
