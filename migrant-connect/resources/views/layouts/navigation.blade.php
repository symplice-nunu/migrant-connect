<nav x-data="{ open: false }" class="bg-white border-b border-gray-200  sticky top-0 z-50 shadow-sm">
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2.5 group">
                        <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center group-hover:bg-teal-700 transition-colors duration-150">
                            <i class="fas fa-globe-americas text-white text-sm"></i>
                        </div>
                        <span class="text-base font-bold text-gray-900 ">Migrant Connect</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-home text-sm mr-1.5"></i>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.*')">
                        <i class="fas fa-calendar-alt text-sm mr-1.5"></i>
                        Events
                    </x-nav-link>

                    <x-nav-link href="{{ route('forums.index') }}" :active="request()->routeIs('forums.*')">
                        <i class="fas fa-comments text-sm mr-1.5"></i>
                        Forums
                    </x-nav-link>

                    <x-nav-link href="{{ route('messages.index') }}" :active="request()->routeIs('messages.*')" class="relative">
                        <i class="fas fa-envelope text-sm mr-1.5"></i>
                        Chats
                        @if(isset($unreadMessageCount) && $unreadMessageCount > 0)
                            <span class="ml-1.5 bg-teal-600 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center" data-unread-count>
                                {{ $unreadMessageCount > 99 ? '99+' : $unreadMessageCount }}
                            </span>
                        @else
                            <span class="ml-1.5 bg-teal-600 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center hidden" data-unread-count>0</span>
                        @endif
                    </x-nav-link>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center space-x-2.5 px-3 py-1.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100 :bg-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 :ring-offset-gray-800 transition-colors duration-150">
                            <div class="w-7 h-7 bg-teal-100 rounded-full flex items-center justify-center">
                                <span class="text-teal-700 text-xs font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-2">
                            <i class="fas fa-user-circle text-gray-400 text-sm"></i>
                            <span>{{ __('Profile') }}</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center space-x-2 text-red-600 ">
                                <i class="fas fa-sign-out-alt text-sm"></i>
                                <span>{{ __('Log Out') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-500 hover:bg-gray-100 :bg-gray-700 focus:outline-none transition-colors duration-150">
                    <i class="fas fa-bars" x-show="!open"></i>
                    <i class="fas fa-times" x-show="open"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-200 ">
        <div class="pt-2 pb-3 space-y-0.5 px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center space-x-2 px-3 py-2.5 rounded-lg">
                <i class="fas fa-home text-sm text-gray-400"></i>
                <span>{{ __('Dashboard') }}</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.*')" class="flex items-center space-x-2 px-3 py-2.5 rounded-lg">
                <i class="fas fa-calendar-alt text-sm text-gray-400"></i>
                <span>Events</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('forums.index') }}" :active="request()->routeIs('forums.*')" class="flex items-center space-x-2 px-3 py-2.5 rounded-lg">
                <i class="fas fa-comments text-sm text-gray-400"></i>
                <span>Forums</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('messages.index') }}" :active="request()->routeIs('messages.*')" class="flex items-center space-x-2 px-3 py-2.5 rounded-lg">
                <i class="fas fa-envelope text-sm text-gray-400"></i>
                <span>Chats</span>
                @if(isset($unreadMessageCount) && $unreadMessageCount > 0)
                    <span class="ml-auto bg-teal-600 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center" data-unread-count>
                        {{ $unreadMessageCount > 99 ? '99+' : $unreadMessageCount }}
                    </span>
                @endif
            </x-responsive-nav-link>
        </div>

        <!-- Mobile User Section -->
        <div class="pt-3 pb-2 border-t border-gray-200 px-3">
            <div class="flex items-center space-x-3 px-3 py-2 mb-1">
                <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center">
                    <span class="text-teal-700 text-xs font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div>
                    <div class="text-sm font-semibold text-gray-900 ">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-gray-500 ">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center space-x-2 px-3 py-2.5 rounded-lg">
                <i class="fas fa-user-circle text-sm text-gray-400"></i>
                <span>{{ __('Profile') }}</span>
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center space-x-2 px-3 py-2.5 rounded-lg text-red-600 ">
                    <i class="fas fa-sign-out-alt text-sm"></i>
                    <span>{{ __('Log Out') }}</span>
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
