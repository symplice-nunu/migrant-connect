<div class="relative">
    <!-- Mobile Hamburger Button -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button id="sidebar-toggle"
                class="hamburger-btn bg-indigo-600 backdrop-blur-xl rounded-xl p-3 shadow-md hover:bg-indigo-700 transition-all duration-200">
            <div class="w-6 h-6 flex flex-col justify-center items-center space-y-1.5">
                <span class="hamburger-line w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
                <span class="hamburger-line w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
                <span class="hamburger-line w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
            </div>
        </button>
    </div>

    <!-- Mobile Overlay -->
    <div id="sidebar-overlay"
         class="lg:hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-40 opacity-0 pointer-events-none transition-opacity duration-300"></div>

    <!-- Sidebar -->
    <div id="sidebar"
         class="flex flex-col w-64 fixed inset-y-0 left-0 z-40 bg-white border-r border-gray-200  shadow-sm sidebar-responsive transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

        <div class="flex flex-col h-full">
            <!-- Header -->
            <div class="flex items-center justify-between h-16 px-5 border-b border-gray-200 ">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-globe-americas text-white text-sm"></i>
                    </div>
                    <span class="text-lg font-bold text-gray-900 ">MigrantConnect</span>
                </div>
                <button id="sidebar-close" class="lg:hidden p-1.5 rounded-lg hover:bg-gray-100 :bg-gray-800 transition-colors duration-200">
                    <i class="fas fa-times text-gray-500 text-sm"></i>
                </button>
            </div>

            <!-- User Profile -->
            <div class="px-5 py-4 border-b border-gray-200 ">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 bg-indigo-100 rounded-full flex items-center justify-center">
                        <span class="text-indigo-700 font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto sidebar-scrollbar">
                <p class="px-3 pt-1 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu</p>

                <a href="{{ route('dashboard') }}"
                   class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700 ' : 'text-gray-700  hover:bg-gray-100 :bg-gray-800 hover:text-gray-900 :text-gray-100' }}">
                    <i class="fas fa-home w-4 text-center {{ request()->routeIs('dashboard') ? 'text-indigo-600 ' : 'text-gray-400' }}"></i>
                    <span>Dashboard</span>
                    @if(request()->routeIs('dashboard'))
                        <div class="ml-auto w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                    @endif
                </a>

                <a href="{{ route('events.index') }}"
                   class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150 {{ request()->routeIs('events.*') ? 'bg-indigo-50 text-indigo-700 ' : 'text-gray-700  hover:bg-gray-100 :bg-gray-800 hover:text-gray-900 :text-gray-100' }}">
                    <i class="fas fa-calendar-alt w-4 text-center {{ request()->routeIs('events.*') ? 'text-indigo-600 ' : 'text-gray-400' }}"></i>
                    <span>Events</span>
                    @if(request()->routeIs('events.*'))
                        <div class="ml-auto w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                    @endif
                </a>

                <a href="{{ route('forums.index') }}"
                   class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150 {{ request()->routeIs('forums.*') ? 'bg-indigo-50 text-indigo-700 ' : 'text-gray-700  hover:bg-gray-100 :bg-gray-800 hover:text-gray-900 :text-gray-100' }}">
                    <i class="fas fa-comments w-4 text-center {{ request()->routeIs('forums.*') ? 'text-indigo-600 ' : 'text-gray-400' }}"></i>
                    <span>Forums</span>
                    @if(request()->routeIs('forums.*'))
                        <div class="ml-auto w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                    @endif
                </a>

                <a href="{{ route('messages.index') }}"
                   class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-150 {{ request()->routeIs('messages.*') ? 'bg-indigo-50 text-indigo-700 ' : 'text-gray-700  hover:bg-gray-100 :bg-gray-800 hover:text-gray-900 :text-gray-100' }}">
                    <i class="fas fa-envelope w-4 text-center {{ request()->routeIs('messages.*') ? 'text-indigo-600 ' : 'text-gray-400' }}"></i>
                    <span>Messages</span>
                    @if(request()->routeIs('messages.*'))
                        <div class="ml-auto w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                    @endif
                </a>

                <div class="border-t border-gray-200 my-3"></div>

                <p class="px-3 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Quick Actions</p>

                <a href="{{ route('events.create') }}"
                   class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100 :bg-gray-800 hover:text-gray-900 :text-gray-100 transition-all duration-150">
                    <i class="fas fa-plus w-4 text-center text-gray-400"></i>
                    <span>New Event</span>
                </a>

                <a href="{{ route('forums.create') }}"
                   class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100 :bg-gray-800 hover:text-gray-900 :text-gray-100 transition-all duration-150">
                    <i class="fas fa-plus w-4 text-center text-gray-400"></i>
                    <span>New Forum</span>
                </a>

                <div class="border-t border-gray-200 my-3"></div>

                <p class="px-3 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Account</p>

                <a href="{{ route('profile.edit') }}"
                   class="sidebar-link flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-100 :bg-gray-800 hover:text-gray-900 :text-gray-100 transition-all duration-150">
                    <i class="fas fa-user-circle w-4 text-center text-gray-400"></i>
                    <span>Profile</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit"
                            class="sidebar-link w-full flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-red-50 :bg-red-900/20 hover:text-red-600 :text-red-400 transition-all duration-150">
                        <i class="fas fa-sign-out-alt w-4 text-center text-gray-400"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>

            <!-- Footer -->
            <div class="px-5 py-3 border-t border-gray-200 ">
                <p class="text-xs text-gray-400 text-center">Migrant Connect v1.0.0</p>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    function initSidebar() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const hamburgerLines = document.querySelectorAll('.hamburger-line');

        if (!sidebar || !sidebarToggle || !sidebarClose || !sidebarOverlay) return;

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
            if (hamburgerLines.length >= 3) {
                hamburgerLines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                hamburgerLines[1].style.opacity = '0';
                hamburgerLines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            }
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = '';
            if (hamburgerLines.length >= 3) {
                hamburgerLines[0].style.transform = '';
                hamburgerLines[1].style.opacity = '';
                hamburgerLines[2].style.transform = '';
            }
        }

        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault(); e.stopPropagation();
            sidebar.classList.contains('-translate-x-full') ? openSidebar() : closeSidebar();
        });

        sidebarClose.addEventListener('click', function(e) { e.preventDefault(); e.stopPropagation(); closeSidebar(); });
        sidebarOverlay.addEventListener('click', function(e) { e.preventDefault(); e.stopPropagation(); closeSidebar(); });

        sidebar.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() { if (window.innerWidth < 1024) closeSidebar(); });
        });

        window.addEventListener('resize', function() { if (window.innerWidth >= 1024) closeSidebar(); });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full') && window.innerWidth < 1024) closeSidebar();
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSidebar);
    } else {
        initSidebar();
    }
})();
</script>
