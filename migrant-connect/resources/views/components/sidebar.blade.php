<div class="relative">
    <!-- Mobile Hamburger Button - Only visible on mobile/tablet -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button id="sidebar-toggle" 
                class="hamburger-btn bg-red-500/90 dark:bg-red-600/90 backdrop-blur-xl border border-red-300/50 dark:border-red-400/50 rounded-xl p-3 shadow-strong hover:shadow-glow transition-all duration-200">
            <div class="w-6 h-6 flex flex-col justify-center items-center space-y-1.5">
                <span class="hamburger-line w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
                <span class="hamburger-line w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
                <span class="hamburger-line w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
            </div>
        </button>
    </div>

    <!-- Mobile Overlay - Only visible on mobile/tablet -->
    <div id="sidebar-overlay" 
         class="lg:hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-40 opacity-0 pointer-events-none transition-opacity duration-300"></div>

    <!-- Sidebar (Hidden by default on mobile, visible on desktop) -->
    <div id="sidebar" 
         class="flex flex-col w-64 fixed inset-y-0 left-0 z-40 bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl border-r border-gray-200/50 dark:border-gray-700/50 shadow-strong sidebar-responsive transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
        
        <!-- Sidebar Content -->
        <div class="flex flex-col h-full">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200/50 dark:border-gray-700/50">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-globe-americas text-white text-lg"></i>
                    </div>
                    <span class="text-xl font-bold text-gradient">MC</span>
                </div>
                <!-- Mobile Close Button - Only visible on mobile/tablet -->
                <button id="sidebar-close" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200">
                    <i class="fas fa-times text-gray-600 dark:text-gray-400"></i>
                </button>
            </div>

            <!-- User Profile Section -->
            <div class="px-6 py-4 border-b border-gray-200/50 dark:border-gray-700/50">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                        <span class="text-white font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto sidebar-scrollbar">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 shadow-soft' : '' }}">
                    <i class="fas fa-tachometer-alt text-lg w-5"></i>
                    <span class="font-medium">Dashboard</span>
                    @if(request()->routeIs('dashboard'))
                        <div class="ml-auto w-2 h-2 bg-blue-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Events -->
                <a href="{{ route('events.index') }}" 
                   class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-600 dark:hover:text-green-400 transition-all duration-200 {{ request()->routeIs('events.*') ? 'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 shadow-soft' : '' }}">
                    <i class="fas fa-calendar-alt text-lg w-5"></i>
                    <span class="font-medium">Events</span>
                    @if(request()->routeIs('events.*'))
                        <div class="ml-auto w-2 h-2 bg-green-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Forums -->
                <a href="{{ route('forums.index') }}" 
                   class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:text-purple-600 dark:hover:text-purple-400 transition-all duration-200 {{ request()->routeIs('forums.*') ? 'bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 shadow-soft' : '' }}">
                    <i class="fas fa-comments text-lg w-5"></i>
                    <span class="font-medium">Forums</span>
                    @if(request()->routeIs('forums.*'))
                        <div class="ml-auto w-2 h-2 bg-purple-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Messages -->
                <a href="{{ route('messages.index') }}" 
                   class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-orange-50 dark:hover:bg-orange-900/20 hover:text-orange-600 dark:hover:text-orange-400 transition-all duration-200 {{ request()->routeIs('messages.*') ? 'bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 shadow-soft' : '' }}">
                    <i class="fas fa-envelope text-lg w-5"></i>
                    <span class="font-medium">Messages</span>
                    @if(request()->routeIs('messages.*'))
                        <div class="ml-auto w-2 h-2 bg-orange-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Divider -->
                <div class="border-t border-gray-200/50 dark:border-gray-700/50 my-4"></div>

                <!-- Quick Actions -->
                <div class="px-2">
                    <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Quick Actions</h3>
                    
                    <a href="{{ route('events.create') }}" 
                       class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-600 dark:hover:text-green-400 transition-all duration-200">
                        <i class="fas fa-plus text-lg w-5"></i>
                        <span class="font-medium">New Event</span>
                    </a>

                    <a href="{{ route('forums.create') }}" 
                       class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-purple-900/20 hover:text-purple-600 dark:hover:text-purple-400 transition-all duration-200">
                        <i class="fas fa-plus text-lg w-5"></i>
                        <span class="font-medium">New Forum</span>
                    </a>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200/50 dark:border-gray-700/50 my-4"></div>

                <!-- User Menu -->
                <div class="px-2">
                    <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">Account</h3>
                    
                    <a href="{{ route('profile.edit') }}" 
                       class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-200">
                        <i class="fas fa-user-circle text-lg w-5"></i>
                        <span class="font-medium">Profile</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" 
                                class="sidebar-link w-full flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 dark:hover:text-red-400 transition-all duration-200">
                            <i class="fas fa-sign-out-alt text-lg w-5"></i>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="px-6 py-4 border-t border-gray-200/50 dark:border-gray-700/50">
                <div class="text-center">
                    <p class="text-xs text-gray-500 dark:text-gray-400">Migrant Connect</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500">v1.0.0</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for mobile sidebar functionality -->
<script>
(function() {
    console.log('Sidebar script loaded');
    
    // Wait for DOM to be ready
    function initSidebar() {
        console.log('Initializing sidebar...');
        
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const hamburgerLines = document.querySelectorAll('.hamburger-line');

        console.log('Elements found:', {
            sidebar: !!sidebar,
            sidebarToggle: !!sidebarToggle,
            sidebarClose: !!sidebarClose,
            sidebarOverlay: !!sidebarOverlay,
            hamburgerLines: hamburgerLines.length
        });

        // Check if elements exist
        if (!sidebar || !sidebarToggle || !sidebarClose || !sidebarOverlay) {
            console.error('Sidebar elements not found');
            return;
        }

        function openSidebar() {
            console.log('Opening sidebar');
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
            
            // Animate hamburger to X
            if (hamburgerLines.length >= 3) {
                hamburgerLines[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                hamburgerLines[1].style.opacity = '0';
                hamburgerLines[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            }
        }

        function closeSidebar() {
            console.log('Closing sidebar');
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = '';
            
            // Reset hamburger animation
            if (hamburgerLines.length >= 3) {
                hamburgerLines[0].style.transform = '';
                hamburgerLines[1].style.opacity = '';
                hamburgerLines[2].style.transform = '';
            }
        }

        // Toggle sidebar (mobile only)
        sidebarToggle.addEventListener('click', function(e) {
            console.log('Hamburger clicked');
            e.preventDefault();
            e.stopPropagation();
            if (sidebar.classList.contains('-translate-x-full')) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });

        // Close sidebar when clicking close button (mobile only)
        sidebarClose.addEventListener('click', function(e) {
            console.log('Close button clicked');
            e.preventDefault();
            e.stopPropagation();
            closeSidebar();
        });

        // Close sidebar when clicking overlay (mobile only)
        sidebarOverlay.addEventListener('click', function(e) {
            console.log('Overlay clicked');
            e.preventDefault();
            e.stopPropagation();
            closeSidebar();
        });

        // Close sidebar when clicking on navigation links (mobile only)
        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 1024) { // lg breakpoint
                    closeSidebar();
                }
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) { // lg breakpoint
                closeSidebar();
            }
        });

        // Close sidebar on escape key (mobile only)
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full') && window.innerWidth < 1024) {
                closeSidebar();
            }
        });

        console.log('Sidebar functionality initialized successfully');
    }

    // Try to initialize immediately if DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSidebar);
    } else {
        initSidebar();
    }
})();
</script> 