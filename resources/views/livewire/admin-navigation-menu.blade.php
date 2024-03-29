    <nav x-data="{ open: false }" class="card-bg text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-white text lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex ">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard.index') }}">
                        <!-- LOGO HERE -->
                        <h1>E-Games-Guru</h1>
                    </a>
                </div>

            </div>

            <div class="sm:ml-10 sm:flex ">
                <!-- Navigation Links -->
                <div id="" class="hidden space-x-8 sm:-my-px sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard.index') }}" :active="request()->routeIs('dashboard.index')">
                        <img width="30px" src="{{url('svgs/home.svg')}}" >

                        {{ __('News') }}
                    </x-jet-nav-link>
                </div>
                <div data-dropdown class="hidden text-white space-x-8 sm:-my-px sm:ml-10 sm:flex relative">
                    <x-jet-nav-link data-dropdown-btn href="{{ route('contendership.index') }}" :active="request()->routeIs('contendership.index')">

                        <img width="28px" src="{{url('svgs/ranking-icon.svg')}}" >

                        {{ __('Contendership') }}



                    </x-jet-nav-link>
                    <div data-drop-menu class=" ">
                        <div data-drop class="block card-bg-100  py-3 rounded-b-md absolute left-0 space-x-8">
                            <ul>
                                <li class="p-2 ">
                                    <a class="p-2" href="{{url('/contendership')}}">Youtube Ranking</a>
                                </li>
                                <li class="p-2">
                                    <a class="p-2" href="{{url('/contendership/twitch-ranking')}}">Twitch Ranking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div  class="profile hidden text-white space-x-8 sm:-my-px sm:ml-0 sm:flex">
                    @if(auth()->user() && auth()->user()->role_id === 1 )
                    <x-jet-nav-link href="{{route('admin.archive.index')}}" :active="request()->routeIs('admin.archive.index')">
                        <img width="32px" src="{{url('svgs/profile.svg')}}" >

                        {{ __('Profil') }}
                    </x-jet-nav-link>

                    @else
                        <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                            <img width="32px" src="{{url('svgs/profile.svg')}}" >

                            {{ __('Profil') }}
                        </x-jet-nav-link>
                    @endif


                </div>
                <div class="hidden text-white space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.index')">
                        <img class="pr-1" width="27px"  src="{{url('svgs/shop.svg')}}" >

                        {{ __('Webshop') }}
                    </x-jet-nav-link>
                </div>

                <div class="hidden text-white space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    @if(auth()->user() && auth()->user()->role_id === 1 )
                        <x-jet-nav-link href="{{ route('admin.articles.index') }}" :active="request()->routeIs('admin.articles.index')">
                            <img width="32px" src="{{url('svgs/article.svg')}}" >

                            {{ __('Artikel') }}

                        </x-jet-nav-link>

                    @else

                    @endif
                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative ">
                        <x-jet-dropdown class="accent-bg" align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->artikel) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
            @endif

            <!-- Settings Dropdown -->
                <div class="ml-3 relative text-gray-200 ">
                    <x-jet-dropdown class=" text-gray-200" align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-md object-cover" src="{{Auth::user()->profile_photo_url }}" alt="{{Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md text-gray-200">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 accent-bg  hover:text-gray-200 focus:outline-none transition">


                                        {{Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content" class="">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link class="text-gray-300" href="{{ route('dashboard.index') }}">
                                {{ __('News') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link class="text-gray-300" href="{{ route('contendership.index') }}">
                                {{ __('Contendership') }}
                            </x-jet-dropdown-link>

{{--                            @if(auth()->user() && auth()->user()->role_id === 1 )--}}
{{--                                <x-jet-dropdown-link href="{{ route('admin.archive.index') }}" :active="request()->routeIs('admin.articles.index')">--}}
{{--                                    --}}{{--                                    <img width="32px" src="{{url('svgs/article.svg')}}" >--}}

{{--                                    {{ __('Profile') }}--}}

{{--                                </x-jet-dropdown-link>--}}
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Manage Account') }}
                                </x-jet-dropdown-link>

{{--                            @else--}}
{{--                                <x-jet-dropdown-link href="{{ route('profile.show') }}">--}}
{{--                                    {{ __('Profile') }}--}}
{{--                                </x-jet-dropdown-link>--}}

{{--                            @endif--}}


                            @if(auth()->user() && auth()->user()->role_id === 1 )
                                <x-jet-dropdown-link href="{{ route('admin.articles.index') }}" :active="request()->routeIs('admin.articles.index')">
{{--                                    <img width="32px" src="{{url('svgs/article.svg')}}" >--}}

                                    {{ __('Artikel') }}

                                </x-jet-dropdown-link>

                            @else

                            @endif

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-500"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden text-gray-200">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:accent-bg focus:outline-none  focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden card-bg">
        <div class="pt-2 pb-3 space-y-1 text-gray-100 card-bg">
            <x-jet-responsive-nav-link class="burger-link text-gray-200" href="{{ route('dashboard.index') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link class="burger-link text-gray-200"  href="{{ route('admin.archive.index') }}" :active="request()->routeIs('admin.archive.index')">
                {{ __('Admin-Archive') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link class="burger-link text-gray-200"  href="{{ route('admin.articles.index') }}" :active="request()->routeIs('admin.articles.index')">
                {{ __('Artikels') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name}}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-600">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

            <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->artikel) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>

