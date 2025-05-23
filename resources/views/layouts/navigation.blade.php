<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-8 sm:flex items-center">
                    <!-- Attendance Dropdown -->
                    <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                        <button @click="open = !open" class="inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 hover:text-gray-900 hover:border-indigo-400 focus:outline-none focus:text-gray-900 focus:border-indigo-500 transition duration-150 ease-in-out">
                            {{ __('Attendance') }}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-1 w-48 rounded-lg shadow-lg origin-top-right right-0 bg-white ring-1 ring-black ring-opacity-5" style="display: none;">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                <a href="{{ route('timesheet') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:bg-gray-50 focus:text-gray-900 transition duration-150 ease-in-out">{{ __('Timesheet') }}</a>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Dropdown -->
                    <div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
                        <button @click="open = !open" class="inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 hover:text-gray-900 hover:border-indigo-400 focus:outline-none focus:text-gray-900 focus:border-indigo-500 transition duration-150 ease-in-out">
                            {{ __('Employee') }}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 mt-1 w-48 rounded-lg shadow-lg origin-top-right right-0 bg-white ring-1 ring-black ring-opacity-5" style="display: none;">
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:bg-gray-50 focus:text-gray-900 transition duration-150 ease-in-out">{{ __('Dashboard') }}</a>
                                @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'hr')
                                    <a href="{{ route('employees') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:bg-gray-50 focus:text-gray-900 transition duration-150 ease-in-out">{{ __('Employee List') }}</a>
                                @endif
                                <a href="{{ route('leave') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:bg-gray-50 focus:text-gray-900 transition duration-150 ease-in-out">{{ __('Leave') }}</a>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->role === 'hr' || Auth::user()->role === 'super_admin')
                        <div class="relative">
                            <button class="inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 hover:text-gray-900 hover:border-indigo-400 focus:outline-none focus:text-gray-900 focus:border-indigo-500 transition duration-150 ease-in-out">
                                <a href="{{ route('users.index') }}" class="text-current no-underline">
                                    {{ __('User Management') }}
                                </a>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
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

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-0.5">
            <!-- Attendance Section -->
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="w-full flex items-center px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-indigo-50 focus:outline-none focus:text-gray-900 focus:bg-indigo-50 transition duration-150 ease-in-out">
                    {{ __('Attendance') }}
                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" class="mt-2 space-y-1" style="display: none;">
                    <x-responsive-nav-link :href="route('timesheet')" :active="request()->routeIs('timesheet')">
                        {{ __('Timesheet') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <!-- Employee Section -->
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="w-full flex items-center px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-indigo-50 focus:outline-none focus:text-gray-900 focus:bg-indigo-50 transition duration-150 ease-in-out">
                    {{ __('Employee') }}
                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" class="mt-2 space-y-1" style="display: none;">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'hr')
                        <x-responsive-nav-link :href="route('employees')" :active="request()->routeIs('employees')">
                            {{ __('Employee List') }}
                        </x-responsive-nav-link>
                    @endif
                    <x-responsive-nav-link :href="route('leave')" :active="request()->routeIs('leave')">
                        {{ __('Leave') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            @if(Auth::user()->role === 'hr' || Auth::user()->role === 'super_admin')
                <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" class="w-full flex items-center px-4 py-2 text-base font-medium text-gray-600 hover:text-gray-900 hover:bg-indigo-50 focus:outline-none focus:text-gray-900 focus:bg-indigo-50 transition duration-150 ease-in-out">
                    {{ __('User Management') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
