<nav x-data="{ open: false }" class="bg-[#082567] ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex items-center space-x-6 flex-grow">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('image/Logo.png') }}" alt="Logo" class="block h-9 w-auto">
                    </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:space-x-2 md:space-x-2 lg:space-x-4 xl:space-x-10 sm:flex ml-auto justify-center flex-grow">

                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        @lang('messages.home')
                    </x-nav-link>

                    <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        @lang('messages.about')
                    </x-nav-link>

                    <x-nav-link href="{{ route('services') }}" :active="request()->is('services') || request()->is('manager/bookings*')">
                        @lang('messages.services')
                    </x-nav-link>

                    <x-nav-link href="{{ route('contacts') }}" :active="request()->routeIs('contacts')">
                        @lang('messages.contacts')
                    </x-nav-link>

                    <!-- Language Switcher -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="inline-flex items-center px-1 py-2 border border-transparent text-lg leading-4 font-medium rounded-md text-white bg-[#082567] hover:text-white focus:outline-none hover:bg-blue-700 transition ease-in-out duration-150">
                            {{ strtoupper(app()->getLocale()) }}
                            <svg :class="{'rotate-180': open}" class="ms-2 -me-0.5 h-4 w-4 transform transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute mt-2 rounded-md shadow-lg bg-[#082567] focus:outline-none z-50 w-32">
                            <div class="py-1 space-y-1">
                                <a href="{{ url('locale/en') }}" class="text-sm text-white hover:bg-blue-700 block px-2 py-1 rounded">English</a>
                                <a href="{{ url('locale/ru') }}" class="text-sm text-white hover:bg-blue-700 block px-2 py-1 rounded">Русский</a>
                                <a href="{{ url('locale/lv') }}" class="text-sm text-white hover:bg-blue-700 block px-2 py-1 rounded">Latviešu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side of Navbar -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <!-- Settings Dropdown for Authenticated Users -->
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-[#082567] hover:text-white focus:outline-none focus:bg-blue-700 active:bg-blue-700 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                @auth
                                    @if (Auth::user()->usertype === 'admin')
                                        <x-dropdown-link href="{{ url('/admin/users') }}" :active="request()->is('admin/users')">
                                            @lang('messages.admin_panel')
                                        </x-dropdown-link>
                                        <x-dropdown-link href="{{ url('/admin/computers/index') }}" :active="request()->is('admin/computers/index')">
                                            @lang('messages.computers')
                                        </x-dropdown-link>
                                    @endif
                                @endauth
                                <!-- Account Management -->
                                <x-dropdown-link href="{{ route('profile.show') }}" class="bg-[#082567] text-white hover:bg-blue-700 border-0">
                                    {{ __('messages.profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="bg-[#082567] text-white hover:bg-blue-700 border-0">
                                        {{ __('messages.log_out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <!-- Login/Register Links for Guests -->
                    <x-button href="{{ route('login') }}" :active="request()->routeIs('login')" class="mr-2">
                        @lang('messages.login')
                    </x-button>
                    <x-button href="{{ route('register') }}" :active="request()->routeIs('register')">
                        @lang('messages.register')
                    </x-button>
                @endauth
                <!-- Social Media Icons -->
                <div class="hidden lg:flex space-x-4 ml-4">
                    <!-- Facebook Icon -->
                    <a href="#" class="w-8 h-8 bg-white rounded-full flex items-center justify-center hover:opacity-75">
                        <i class="fab fa-facebook-f text-[#2E69A9]"></i>
                    </a>
                    <!-- Instagram Icon -->
                    <a href="#" class="w-8 h-8 bg-white rounded-full flex items-center justify-center hover:opacity-75">
                        <i class="fab fa-instagram text-[#2E69A9]"></i>
                    </a>
                </div>
            </div>

            <!-- Hamburger Menu -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-[#082567] fixed top-16 left-0 right-0 z-50 shadow-lg">
                <div class="pt-2 pb-3 space-y-1">
                    
                    @if (!Auth::check())
                        <!-- Guest Links - These will be aligned horizontally -->
                        <div class="flex justify-around space-x-4 pt-2 pb-3">
                            <x-button href="{{ route('login') }}" :active="request()->routeIs('login')" class="px-10" >
                                @lang('messages.login')
                            </x-button>

                            <x-button href="{{ route('register') }}" :active="request()->routeIs('register')" class="px-10">
                                @lang('messages.register')
                            </x-button>
                        </div>
                    @endif
                                
                    <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        @lang('messages.home')
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        @lang('messages.about')
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('services') }}" :active="request()->routeIs('services')">
                        @lang('messages.services')
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('contacts') }}" :active="request()->routeIs('contacts')">
                        @lang('messages.contacts')
                    </x-responsive-nav-link>

                    @if (Auth::check())
                        <!-- Admin Panel Link (Only for Admins) -->
                        @if (Auth::user()->usertype === 'admin')
                            <x-responsive-nav-link href="{{ url('/admin/users') }}" :active="request()->is('admin/users')">
                                @lang('messages.admin_panel')
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ url('/admin/computers/index') }}" :active="request()->is('admin/computers/index')">
                                @lang('messages.computers')
                            </x-responsive-nav-link>
                        @endif
                    @endif
                </div>

                <!-- Language Switcher -->
                <div class="pt-6 pb-3 w-full flex space-x-4">
                    <x-responsive-nav-link href="{{ url('locale/en') }}" :active="app()->getLocale() == 'en'" class="flex justify-center items-center px-4 py-2">
                        English
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ url('locale/ru') }}" :active="app()->getLocale() == 'ru'" class="flex justify-center items-center px-4 py-2">
                        Русский
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ url('locale/lv') }}" :active="app()->getLocale() == 'lv'" class="flex justify-center items-center px-4 py-2">
                        Latviešu
                    </x-responsive-nav-link>
                </div>

                @if (Auth::check())
                    <!-- Responsive Settings Options for Authenticated Users -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 me-3">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('messages.profile') }}
                            </x-responsive-nav-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-responsive-nav-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-responsive-nav-link href="{{ route('logout') }}"
                                                    @click.prevent="$root.submit();">
                                    {{ __('messages.log_out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>



