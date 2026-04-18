<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Migrant Connect — Find Your Community</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="antialiased bg-white text-gray-900 font-sans">

        <!-- ── HEADER ── -->
        <header id="header" class="fixed w-full z-50 transition-all duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">

                    <!-- Logo -->
                    <a href="/" class="flex items-center space-x-2.5 group flex-shrink-0">
                        <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-sm group-hover:bg-indigo-700 transition-colors duration-150">
                            <i class="fas fa-globe-americas text-white text-sm"></i>
                        </div>
                        <span class="text-base font-bold text-gray-900">Migrant Connect</span>
                    </a>

                    <!-- Desktop nav -->
                    <nav class="hidden md:flex items-center space-x-7 text-sm font-medium text-gray-500">
                        <a href="#features"     class="hover:text-gray-900 transition-colors duration-150">Features</a>
                        <a href="#how-it-works" class="hover:text-gray-900 transition-colors duration-150">How it works</a>
                        <a href="#community"    class="hover:text-gray-900 transition-colors duration-150">Community</a>
                    </nav>

                    <!-- Desktop auth buttons -->
                    <div class="hidden md:flex items-center space-x-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl shadow-sm transition-colors duration-150">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors duration-150 px-3 py-2">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl shadow-sm transition-colors duration-150">
                                        Get started free
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>

                    <!-- Mobile hamburger -->
                    <button id="mobile-menu-btn"
                            class="md:hidden p-2 rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors duration-150"
                            aria-label="Toggle menu">
                        <i id="menu-icon" class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-menu"
                 class="hidden md:hidden bg-white border-t border-gray-200 shadow-lg">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 py-4 flex flex-col space-y-1">
                    <a href="#features"
                       class="px-4 py-3 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-150">
                        Features
                    </a>
                    <a href="#how-it-works"
                       class="px-4 py-3 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-150">
                        How it works
                    </a>
                    <a href="#community"
                       class="px-4 py-3 text-sm font-medium text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-150">
                        Community
                    </a>
                    <div class="pt-3 border-t border-gray-100 flex flex-col space-y-2">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl transition-colors duration-150">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center justify-center px-4 py-2.5 border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-xl transition-colors duration-150">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-xl transition-colors duration-150">
                                        Get started free
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- ── HERO ── -->
        <section class="relative bg-white overflow-hidden pt-32 sm:pt-36 pb-24 sm:pb-32
                        [background-image:radial-gradient(#e5e7eb_1px,transparent_1px)]
                        [background-size:28px_28px]">

            <!-- Fade overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-white pointer-events-none"></div>

            <!-- Indigo glow orb -->
            <div class="absolute top-20 left-1/2 -translate-x-1/2 w-72 sm:w-96 h-72 sm:h-96 bg-indigo-100 rounded-full blur-3xl opacity-40 pointer-events-none"></div>

            <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">

                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 bg-white border border-indigo-100 text-indigo-600 text-xs font-semibold px-4 py-2 rounded-full mb-8 shadow-sm ring-4 ring-indigo-500/10">
                        <div class="w-1.5 h-1.5 bg-indigo-500 rounded-full"></div>
                        <span>Community Platform for Migrants</span>
                    </div>

                    <!-- Headline -->
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-tight tracking-tight mb-6">
                        Your new home<br class="hidden sm:block">
                        starts with
                        <span class="text-indigo-600"> people.</span>
                    </h1>

                    <p class="text-base sm:text-lg md:text-xl text-gray-500 leading-relaxed mb-10 max-w-2xl mx-auto">
                        Connect with events, join discussions, and message people in your new community.
                        Migrant Connect makes settling in feel less like starting over.
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-12 sm:mb-16">
                        @if (Route::has('login'))
                            @guest
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white text-base font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-150 active:scale-95">
                                        <i class="fas fa-arrow-right mr-2 text-sm"></i>
                                        Create free account
                                    </a>
                                @endif
                                <a href="{{ route('login') }}"
                                   class="w-full sm:w-auto inline-flex items-center justify-center px-7 py-3.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-base font-semibold rounded-xl shadow-sm transition-all duration-150 active:scale-95">
                                    Sign in
                                </a>
                            @else
                                <a href="{{ url('/dashboard') }}"
                                   class="inline-flex items-center justify-center px-7 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white text-base font-semibold rounded-xl shadow-md transition-all duration-150">
                                    Go to Dashboard
                                </a>
                            @endguest
                        @endif
                    </div>

                    <!-- Social proof -->
                    <div class="inline-flex flex-wrap justify-center gap-x-6 gap-y-3 bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl px-6 sm:px-8 py-4 shadow-sm text-sm">
                        <div class="flex items-center space-x-2 text-gray-500">
                            <span class="font-bold text-gray-900 text-base">15,000+</span>
                            <span>members</span>
                        </div>
                        <div class="w-px h-4 bg-gray-200 self-center hidden sm:block"></div>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <span class="font-bold text-gray-900 text-base">750+</span>
                            <span>events</span>
                        </div>
                        <div class="w-px h-4 bg-gray-200 self-center hidden sm:block"></div>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <span class="font-bold text-gray-900 text-base">85+</span>
                            <span>cities</span>
                        </div>
                        <div class="w-px h-4 bg-gray-200 self-center hidden sm:block"></div>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <span class="font-bold text-gray-900 text-base">98%</span>
                            <span>satisfaction</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ── FEATURES ── -->
        <section id="features" class="py-16 sm:py-24 bg-gray-50 border-t border-gray-100">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Section heading -->
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10 sm:mb-14">
                    <div class="max-w-lg">
                        <p class="text-xs font-semibold text-indigo-500 uppercase tracking-widest mb-3">What we offer</p>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 leading-tight">Everything in one place</h2>
                    </div>
                    <p class="text-sm sm:text-base text-gray-500 max-w-xs md:text-right">
                        Tools and spaces built to help you connect, learn, and grow in your new home.
                    </p>
                </div>

                <!-- Feature grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div class="bg-white border border-gray-200 hover:border-indigo-200 rounded-2xl p-6 sm:p-7 flex items-start space-x-5 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <div class="w-11 h-11 bg-indigo-50 border border-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-calendar-alt text-indigo-600"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-2">Community Events</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">Browse and join local meetups, cultural celebrations, and workshops. Create your own events and invite others.</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 hover:border-indigo-200 rounded-2xl p-6 sm:p-7 flex items-start space-x-5 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <div class="w-11 h-11 bg-indigo-50 border border-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-comments text-indigo-600"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-2">Discussion Forums</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">Ask questions, share advice, and learn from real experiences. Organised by topic so you always find what matters.</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 hover:border-indigo-200 rounded-2xl p-6 sm:p-7 flex items-start space-x-5 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <div class="w-11 h-11 bg-indigo-50 border border-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-envelope text-indigo-600"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-2">Direct Messaging</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">Send private messages to connect one-on-one. Build real relationships beyond the public forums.</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 hover:border-indigo-200 rounded-2xl p-6 sm:p-7 flex items-start space-x-5 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                        <div class="w-11 h-11 bg-indigo-50 border border-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-user-circle text-indigo-600"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-900 mb-2">Personal Profiles</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">Tell your story, share your background, and let people know who you are and what you're looking for.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ── HOW IT WORKS ── -->
        <section id="how-it-works" class="py-16 sm:py-24 bg-white border-t border-gray-100">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center max-w-xl mx-auto mb-12 sm:mb-16">
                    <p class="text-xs font-semibold text-indigo-500 uppercase tracking-widest mb-3">Simple to start</p>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4">Up and running in minutes</h2>
                    <p class="text-sm sm:text-base text-gray-500 leading-relaxed">No complicated setup. Just sign up and start connecting with your new community.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">

                    <div class="relative bg-gray-50 rounded-2xl p-6 sm:p-8 border border-gray-100">
                        <div class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center text-sm font-bold mb-5 sm:mb-6 shadow-sm">1</div>
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Create your account</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Sign up for free in under a minute. No credit card, no commitment.</p>
                        <!-- Connector arrow (desktop only) -->
                        <div class="hidden sm:block absolute top-11 -right-3 w-6 h-px bg-indigo-200 z-10"></div>
                    </div>

                    <div class="relative bg-gray-50 rounded-2xl p-6 sm:p-8 border border-gray-100">
                        <div class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center text-sm font-bold mb-5 sm:mb-6 shadow-sm">2</div>
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Set up your profile</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Add your location, background, and what you're looking for in your new community.</p>
                        <div class="hidden sm:block absolute top-11 -right-3 w-6 h-px bg-indigo-200 z-10"></div>
                    </div>

                    <div class="bg-indigo-600 rounded-2xl p-6 sm:p-8 border border-indigo-600 text-white">
                        <div class="w-10 h-10 bg-white/20 text-white rounded-full flex items-center justify-center text-sm font-bold mb-5 sm:mb-6">3</div>
                        <h3 class="text-base font-semibold mb-2">Start connecting</h3>
                        <p class="text-sm text-indigo-100 leading-relaxed">Browse events, join forums, and message people who share your interests and background.</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- ── COMMUNITY STATS ── -->
        <section id="community" class="border-t border-gray-100">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-y sm:divide-y-0 divide-gray-100 border border-gray-100 rounded-2xl overflow-hidden my-10 sm:my-12">

                    <div class="flex flex-col items-center justify-center py-8 sm:py-10 px-4 sm:px-6 bg-white hover:bg-gray-50 transition-colors duration-150">
                        <p class="text-3xl sm:text-4xl font-bold text-gray-900 mb-1">15,000+</p>
                        <p class="text-xs sm:text-sm text-gray-500 text-center">Active Members</p>
                    </div>

                    <div class="flex flex-col items-center justify-center py-8 sm:py-10 px-4 sm:px-6 bg-white hover:bg-gray-50 transition-colors duration-150">
                        <p class="text-3xl sm:text-4xl font-bold text-gray-900 mb-1">750+</p>
                        <p class="text-xs sm:text-sm text-gray-500 text-center">Events Created</p>
                    </div>

                    <div class="flex flex-col items-center justify-center py-8 sm:py-10 px-4 sm:px-6 bg-white hover:bg-gray-50 transition-colors duration-150">
                        <p class="text-3xl sm:text-4xl font-bold text-gray-900 mb-1">85+</p>
                        <p class="text-xs sm:text-sm text-gray-500 text-center">Cities Covered</p>
                    </div>

                    <div class="flex flex-col items-center justify-center py-8 sm:py-10 px-4 sm:px-6 bg-white hover:bg-gray-50 transition-colors duration-150">
                        <p class="text-3xl sm:text-4xl font-bold text-gray-900 mb-1">98%</p>
                        <p class="text-xs sm:text-sm text-gray-500 text-center">Satisfaction Rate</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- ── CTA ── -->
        <section class="py-16 sm:py-24 bg-gray-950 relative overflow-hidden">
            <!-- Top line accent -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-lg h-px bg-gradient-to-r from-transparent via-indigo-500/40 to-transparent"></div>
            <!-- Glow -->
            <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[500px] h-64 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

                <div class="inline-flex items-center space-x-2 bg-indigo-600/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold px-4 py-2 rounded-full mb-8">
                    <div class="w-1.5 h-1.5 bg-indigo-400 rounded-full"></div>
                    <span>Free to join</span>
                </div>

                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-5 leading-tight tracking-tight">
                    You don't have to<br class="hidden sm:block">
                    figure it out alone.
                </h2>

                <p class="text-sm sm:text-base lg:text-lg text-gray-400 mb-8 sm:mb-10 leading-relaxed">
                    Thousands of people are already here — sharing advice, hosting events, and making real connections.
                </p>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center bg-white hover:bg-gray-100 text-gray-900 font-semibold px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl transition-colors duration-150 shadow-lg text-sm sm:text-base">
                        <i class="fas fa-arrow-right mr-2 text-indigo-600 text-sm"></i>
                        Join the community — it's free
                    </a>
                @endif

                <p class="text-xs sm:text-sm text-gray-600 mt-5">No credit card required.</p>
            </div>
        </section>

        <!-- ── FOOTER ── -->
        <footer class="bg-[#0a0a0a] text-gray-400 py-12 sm:py-14 border-t border-white/5">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-5 gap-8 mb-10 sm:mb-12">

                    <!-- Brand -->
                    <div class="col-span-2">
                        <div class="flex items-center space-x-2.5 mb-4">
                            <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-sm">
                                <i class="fas fa-globe-americas text-white text-sm"></i>
                            </div>
                            <span class="text-sm font-bold text-white">Migrant Connect</span>
                        </div>
                        <p class="text-sm leading-relaxed max-w-xs text-gray-500">
                            Building bridges between communities, one connection at a time.
                        </p>
                    </div>

                    <!-- Platform links -->
                    <div>
                        <h4 class="text-xs font-semibold text-gray-300 uppercase tracking-wider mb-4">Platform</h4>
                        <ul class="space-y-2.5 text-sm text-gray-500">
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Events</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Forums</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Messages</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Community</a></li>
                        </ul>
                    </div>

                    <!-- Support links -->
                    <div>
                        <h4 class="text-xs font-semibold text-gray-300 uppercase tracking-wider mb-4">Support</h4>
                        <ul class="space-y-2.5 text-sm text-gray-500">
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Help Center</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Contact Us</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Resources</a></li>
                        </ul>
                    </div>

                    <!-- Legal links -->
                    <div>
                        <h4 class="text-xs font-semibold text-gray-300 uppercase tracking-wider mb-4">Legal</h4>
                        <ul class="space-y-2.5 text-sm text-gray-500">
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Terms of Service</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-150">Cookie Policy</a></li>
                        </ul>
                    </div>

                </div>

                <div class="border-t border-white/5 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs sm:text-sm text-gray-600">
                    <p>&copy; {{ date('Y') }} Migrant Connect. All rights reserved.</p>
                    <p>Made with care for communities worldwide.</p>
                </div>

            </div>
        </footer>

        <script>
            // Scroll-based header styling (Tailwind classes only)
            const header = document.getElementById('header');
            const scrollClasses = ['bg-white/95', 'backdrop-blur-md', 'border-b', 'border-gray-200', 'shadow-sm'];
            window.addEventListener('scroll', () => {
                if (window.scrollY > 20) {
                    scrollClasses.forEach(c => header.classList.add(c));
                } else {
                    scrollClasses.forEach(c => header.classList.remove(c));
                }
            });

            // Mobile menu toggle
            const btn  = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('menu-icon');
            btn.addEventListener('click', () => {
                const open = !menu.classList.contains('hidden');
                menu.classList.toggle('hidden', open);
                icon.className = open ? 'fas fa-bars text-lg' : 'fas fa-times text-lg';
            });

            // Close mobile menu when a link is clicked
            menu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    icon.className = 'fas fa-bars text-lg';
                });
            });
        </script>

    </body>
</html>
