<h2>Twitch Contendership</h2>


<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <table class="min-w-full">
                <thead class="border-b">

                <tr>
                    <th scope="col" class="text-sm font-base text-gray-200 px-6 py-4 text-left">
                        Rank
                    </th>
                    <th scope="col" class="text-sm font-base text-gray-200 px-6 py-4 text-left">
                        Creator
                    </th>
                    <th scope="col" class="text-sm font-base text-gray-200 px-6 py-4 text-left">
                        Score
                    </th>
                    <th scope="col" class="text-sm font-base text-gray-200 px-6 py-4 text-left">
                        ascent/descent
                    </th>
                </tr>
                </thead>
                <tbody>
                @php($counter = 0)
                @foreach($twitchUsers as $key => $user )
                    {{--                        {{$user}}--}}

                    @php($counter++)
                    <tr class="table-{{$counter}} border-b">

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-200">{{$twitchUsers->firstItem() + $key}}</td>

                        <td class="text-sm text-gray-200 font-light  whitespace-nowrap relative">
                            {{--                                <svg class="absolute top-0 -left-1/3" width="25" height="auto" viewBox="0 0 234 179" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                    <path d="M227.7 41.5C225.412 39.5898 222.633 38.3613 219.68 37.9546C216.727 37.548 213.719 37.9795 211 39.2L160.4 61.7L131 8.7C129.595 6.22558 127.559 4.16779 125.1 2.73623C122.64 1.30467 119.846 0.550476 117 0.550476C114.155 0.550476 111.36 1.30467 108.9 2.73623C106.441 4.16779 104.405 6.22558 103 8.7L73.6001 61.7L23.0001 39.2C20.2752 37.9813 17.2636 37.5492 14.306 37.9525C11.3483 38.3558 8.5624 39.5785 6.26327 41.4823C3.96413 43.3861 2.24342 45.8951 1.29566 48.7257C0.347897 51.5563 0.210878 54.5956 0.900092 57.5L26.3001 165.8C26.7858 167.897 27.6921 169.873 28.9641 171.609C30.2361 173.345 31.8473 174.805 33.7001 175.9C36.2085 177.402 39.0766 178.196 42.0001 178.2C43.4213 178.197 44.835 177.995 46.2001 177.6C92.4983 164.8 141.402 164.8 187.7 177.6C191.927 178.711 196.423 178.1 200.2 175.9C202.064 174.819 203.684 173.363 204.958 171.625C206.231 169.887 207.131 167.903 207.6 165.8L233.1 57.5C233.782 54.5948 233.637 51.557 232.683 48.7296C231.729 45.9022 230.003 43.3981 227.7 41.5ZM157 130.5C156.78 132.472 155.843 134.294 154.369 135.621C152.894 136.948 150.984 137.688 149 137.7H148.2C127.453 135.6 106.547 135.6 85.8001 137.7C83.6919 137.924 81.5809 137.302 79.9309 135.971C78.2808 134.64 77.2267 132.708 77.0001 130.6C76.8041 128.482 77.4494 126.371 78.7966 124.724C80.1438 123.078 82.0848 122.027 84.2001 121.8C106.006 119.5 127.994 119.5 149.8 121.8C151.897 122.028 153.822 123.064 155.166 124.688C156.511 126.313 157.169 128.398 157 130.5Z" fill="#FFC053"/>--}}
                            {{--                                </svg>--}}
                            <a class="px-6 py-4" href="{{route('users.show', $user->id)}}">
                                {{$user->name}}
                            </a>

                        </td>
                        <td class="text-sm text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                            {{number_format($user->twitch_score)}}

                        </td>
                        <td class="text-sm text-gray-200 font-light px-6 py-4 whitespace-nowrap">
                            <img width="15px" src="{{url('svgs/arrow-up.svg')}}">
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            <div class="pt-3">
                {{$twitchUsers->links()}}

            </div>

        </div>
    </div>
</div>
