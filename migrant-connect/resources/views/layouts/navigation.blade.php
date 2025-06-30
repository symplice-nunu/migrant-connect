<nav x-data="{ open: false }" class="glass dark:glass-dark border-b border-gray-200/50 dark:border-gray-700/50 sticky top-0 z-50 shadow-soft">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group animate-fade-in-left">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-glow transition-all duration-300 group-hover:scale-110">
                            <i class="fas fa-globe-americas text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold text-gradient">Migrant Connect</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-enhanced">
                        <i class="fas fa-tachometer-alt text-lg"></i>
                        <span class="font-medium">{{ __('Dashboard') }}</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.*')" class="nav-link-enhanced">
                        <i class="fas fa-calendar-alt text-lg"></i>
                        <span class="font-medium">Events</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('forums.index') }}" :active="request()->routeIs('forums.*')" class="nav-link-enhanced">
                        <i class="fas fa-comments text-lg"></i>
                        <span class="font-medium">Forums</span>
                    </x-nav-link>
                    
                    <x-nav-link href="{{ route('messages.index') }}" :active="request()->routeIs('messages.*')" class="nav-link-enhanced">
                        <i class="fas fa-envelope text-lg"></i>
                        <span class="font-medium">Messages</span>
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-xl text-gray-700 dark:text-gray-300 glass dark:glass-dark hover:shadow-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition-all duration-200">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                                    <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-2">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-3 hover:bg-blue-50 dark:hover:bg-blue-900/20">
                            <i class="fas fa-user-circle text-blue-600"></i>
                            <span class="font-medium">{{ __('Profile') }}</span>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="flex items-center space-x-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="font-medium">{{ __('Log Out') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition-all duration-200">
                    <i class="fas fa-bars h-6 w-6" x-show="!open"></i>
                    <i class="fas fa-times h-6 w-6" x-show="open"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden glass dark:glass-dark border-t border-gray-200/50 dark:border-gray-700/50">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center space-x-3 px-4 py-3 rounded-xl mx-2">
                <i class="fas fa-tachometer-alt text-lg"></i>
                <span class="font-medium">{{ __('Dashboard') }}</span>
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.*')" class="flex items-center space-x-3 px-4 py-3 rounded-xl mx-2">
                <i class="fas fa-calendar-alt text-lg"></i>
                <span class="font-medium">Events</span>
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('forums.index') }}" :active="request()->routeIs('forums.*')" class="flex items-center space-x-3 px-4 py-3 rounded-xl mx-2">
                <i class="fas fa-comments text-lg"></i>
                <span class="font-medium">Forums</span>
            </x-responsive-nav-link>
            
            <x-responsive-nav-link href="{{ route('messages.index') }}" :active="request()->routeIs('messages.*')" class="flex items-center space-x-3 px-4 py-3 rounded-xl mx-2">
                <i class="fas fa-envelope text-lg"></i>
                <span class="font-medium">Messages</span>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <div class="font-semibold text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center space-x-3 px-4 py-3 rounded-xl mx-2">
                    <i class="fas fa-user-circle text-blue-600"></i>
                    <span class="font-medium">{{ __('Profile') }}</span>
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="flex items-center space-x-3 text-red-600 dark:text-red-400 px-4 py-3 rounded-xl mx-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="font-medium">{{ __('Log Out') }}</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
