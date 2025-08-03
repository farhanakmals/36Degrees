<nav class="border-gray-200 bg-[#B96D40]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium n flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 justify-center items-center">
                @auth
                    @if(auth()->user()->isAdmin())
                        <div class="space-x-8 my-3 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('admin.karyawan')" :active="request()->routeIs('admin.karyawan')">
                                {{ __('List Karyawan') }}
                            </x-nav-link>
                        </div>
                        <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('admin.score')" :active="request()->routeIs('admin.score')">
                                {{ __('Scoring') }}
                            </x-nav-link>
                        </div>
                        <div class="space-x-8 my-3 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Reward') }}
                            </x-nav-link>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @elseif(auth()->user()->isEmployee())
                        <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('employee.score')" :active="request()->routeIs('employee.score')">
                                {{ __('Scoring') }}
                            </x-nav-link>
                        </div>
                        <div class="space-x-8 my-3 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('employee.reward')" :active="request()->routeIs('employee.reward')">
                                {{ __('Reward') }}
                            </x-nav-link>
                        </div>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
