<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Migrant Connect</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        
        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
            .floating {
                animation: float 3s ease-in-out infinite;
            }
            .particle {
                position: absolute;
                background: rgba(255, 255, 255, 0.6);
                border-radius: 50%;
                pointer-events: none;
                animation: float-up linear infinite;
            }
            @keyframes float-up {
                0% { 
                    transform: translateY(100vh) scale(0.5); 
                    opacity: 0;
                }
                20% { opacity: 1; }
                100% { 
                    transform: translateY(-100px) scale(1); 
                    opacity: 0;
                }
            }
            .hero-gradient {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                background-size: 400% 400%;
                animation: gradient 15s ease infinite;
            }
            .feature-card {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                transition: all 0.3s ease;
            }
            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }
            .stat-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                transition: all 0.3s ease;
            }
            .stat-card:hover {
                transform: translateY(-5px);
                background: rgba(255, 255, 255, 0.15);
            }
        </style>
    </head>
    <body class="bg-gradient-to-br from-blue-50 to-indigo-50 font-sans antialiased">
        <div class="particles fixed inset-0 overflow-hidden z-0" id="particles"></div>
        
        <header id="header" class="fixed w-full transition-all duration-300 z-50">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap gap-4 items-center justify-between py-4">
                    <a href="/" class="flex items-center space-x-3 text-2xl font-bold text-gradient hover:scale-105 transition-transform">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-globe-americas text-white text-xl"></i>
                        </div>
                        <span>Migrant Connect</span>
                    </a>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-primary inline-flex items-center">
                                    <i class="fas fa-tachometer-alt mr-2"></i>
                                    <span>Dashboard</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-secondary inline-flex items-center">
                                    <i class="fas fa-sign-in-alt mr-2"></i>
                                    <span>Log in</span>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-primary inline-flex items-center">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        <span>Register</span>
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </header>

            <section class="hero min-h-screen flex items-center mt-10 pt-20 pb-32">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto text-center">
                        <div class="inline-flex items-center bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 px-6 py-3 rounded-full mb-8 text-sm font-semibold shadow-lg animate-pulse-slow">
                            <i class="fas fa-star mr-2"></i>
                            Join thousands of migrants building connections
                        </div>
                        <h1 class="text-6xl md:text-7xl font-bold text-gray-900 mb-8 leading-tight">
                            Welcome to <span class="text-gradient">Migrant Connect</span>
                        </h1>
                        <p class="text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                            A vibrant community platform designed to empower migrants by connecting them with local events, 
                            forums, and support networks. Join thousands of people building meaningful connections in their new home.
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center gap-6 mb-20">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn-primary inline-flex items-center text-lg px-8 py-4">
                                    <i class="fas fa-rocket mr-3"></i>
                                    <span>Get Started Today</span>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-secondary inline-flex items-center text-lg px-8 py-4">
                                        <i class="fas fa-user-plus mr-3"></i>
                                        <span>Sign Up Free</span>
                                    </a>
                                @endif
                            @endif
                        </div>
                        <div class="flex flex-wrap justify-center gap-12">
                            <div class="stat-item text-center">
                                <div class="text-4xl font-bold text-gradient mb-2">15,000+</div>
                                <div class="text-gray-600 font-medium">Active Members</div>
                            </div>
                            <div class="stat-item text-center">
                                <div class="text-4xl font-bold text-gradient-secondary mb-2">750+</div>
                                <div class="text-gray-600 font-medium">Events Created</div>
                            </div>
                            <div class="stat-item text-center">
                                <div class="text-4xl font-bold text-gradient mb-2">85+</div>
                                <div class="text-gray-600 font-medium">Cities Covered</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-24 bg-white">
                <div class="container mx-auto px-4">
                    <div class="text-center max-w-3xl mx-auto mb-20">
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Why Choose Migrant Connect?</h2>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Everything you need to thrive in your new community, all in one beautiful platform
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="feature-card p-8 rounded-3xl shadow-soft hover:shadow-strong transition-all duration-500">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl flex items-center justify-center text-3xl mb-8 mx-auto shadow-lg">
                                <i class="fas fa-calendar-alt text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Community Events</h3>
                            <p class="text-gray-600 text-center leading-relaxed">
                                Discover and join local events, meetups, and cultural celebrations. 
                                Connect with people who share your interests and background.
                            </p>
                        </div>
                        <div class="feature-card p-8 rounded-3xl shadow-soft hover:shadow-strong transition-all duration-500">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl flex items-center justify-center text-3xl mb-8 mx-auto shadow-lg">
                                <i class="fas fa-comments text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Discussion Forums</h3>
                            <p class="text-gray-600 text-center leading-relaxed">
                                Participate in vibrant forums to ask questions, share advice, 
                                and learn from others' experiences in your new community.
                            </p>
                        </div>
                        <div class="feature-card p-8 rounded-3xl shadow-soft hover:shadow-strong transition-all duration-500">
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-3xl flex items-center justify-center text-3xl mb-8 mx-auto shadow-lg">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Direct Messaging</h3>
                            <p class="text-gray-600 text-center leading-relaxed">
                                Send private messages to other members for support, networking, 
                                and building personal connections.
                            </p>
                        </div>
                        <div class="feature-card p-8 rounded-3xl shadow-soft hover:shadow-strong transition-all duration-500">
                            <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-3xl flex items-center justify-center text-3xl mb-8 mx-auto shadow-lg">
                                <i class="fas fa-user-circle text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">User Profiles</h3>
                            <p class="text-gray-600 text-center leading-relaxed">
                                Create your unique profile, share your story, showcase your skills, 
                                and manage your community connections.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-24 hero-gradient text-white">
                <div class="container mx-auto px-4">
                    <div class="max-w-5xl mx-auto">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                            <div class="stat-card text-center p-6 rounded-3xl">
                                <div class="text-5xl font-bold mb-3">15,000+</div>
                                <div class="text-xl text-blue-100">Active Members</div>
                            </div>
                            <div class="stat-card text-center p-6 rounded-3xl">
                                <div class="text-5xl font-bold mb-3">750+</div>
                                <div class="text-xl text-blue-100">Events Created</div>
                            </div>
                            <div class="stat-card text-center p-6 rounded-3xl">
                                <div class="text-5xl font-bold mb-3">85+</div>
                                <div class="text-xl text-blue-100">Cities Covered</div>
                            </div>
                            <div class="stat-card text-center p-6 rounded-3xl">
                                <div class="text-5xl font-bold mb-3">98%</div>
                                <div class="text-xl text-blue-100">Satisfaction Rate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white pt-20 pb-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <div class="footer-brand">
                        <h3 class="flex items-center text-3xl font-bold mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mr-3">
                                <i class="fas fa-globe-americas text-white text-xl"></i>
                            </div>
                            Migrant Connect
                        </h3>
                        <p class="text-gray-400 leading-relaxed">
                            Building bridges between communities and empowering migrants to thrive in their new homes. 
                            Join our growing network of supportive individuals and organizations.
                        </p>
                    </div>
                    <div class="footer-links">
                        <h4 class="text-xl font-semibold mb-6 text-blue-300">Platform</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-calendar-alt mr-3 text-blue-400"></i> Events</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-comments mr-3 text-blue-400"></i> Forums</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-envelope mr-3 text-blue-400"></i> Messages</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-users mr-3 text-blue-400"></i> Community</a></li>
                        </ul>
                    </div>
                    <div class="footer-links">
                        <h4 class="text-xl font-semibold mb-6 text-blue-300">Support</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-question-circle mr-3 text-blue-400"></i> Help Center</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-envelope mr-3 text-blue-400"></i> Contact Us</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-book mr-3 text-blue-400"></i> Resources</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-hands-helping mr-3 text-blue-400"></i> Get Help</a></li>
                        </ul>
                    </div>
                    <div class="footer-links">
                        <h4 class="text-xl font-semibold mb-6 text-blue-300">Legal</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-shield-alt mr-3 text-blue-400"></i> Privacy Policy</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-file-contract mr-3 text-blue-400"></i> Terms of Service</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-cookie-bite mr-3 text-blue-400"></i> Cookie Policy</a></li>
                            <li><a href="#" class="flex items-center text-gray-400 hover:text-white transition-colors duration-200"><i class="fas fa-gavel mr-3 text-blue-400"></i> Legal Notice</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-700 pt-8 text-center text-gray-500">
                    <p class="text-lg">&copy; {{ date('Y') }} Migrant Connect. All rights reserved. | Building bridges between communities</p>
                </div>
            </div>
        </footer>

        <script>
            // Header scroll effect
            window.addEventListener('scroll', () => {
                const header = document.getElementById('header');
                if (window.scrollY > 100) {
                    header.classList.add('glass', 'shadow-soft', 'py-2');
                    header.classList.remove('py-4');
                } else {
                    header.classList.remove('glass', 'shadow-soft', 'py-2');
                    header.classList.add('py-4');
                }
            });

            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.feature-card, .stat-card').forEach(el => {
                observer.observe(el);
            });

            // Particle effect
            function createParticles() {
                const particlesContainer = document.getElementById('particles');
                const particleCount = 50;

                for (let i = 0; i < particleCount; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    
                    const size = Math.random() * 4 + 2;
                    const left = Math.random() * 100;
                    const delay = Math.random() * 6;
                    const duration = Math.random() * 3 + 3;
                    
                    particle.style.cssText = `
                        width: ${size}px;
                        height: ${size}px;
                        left: ${left}%;
                        animation-delay: ${delay}s;
                        animation-duration: ${duration}s;
                    `;
                    
                    particlesContainer.appendChild(particle);
                }
            }

            // Initialize particles
            createParticles();

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        </script>
    </body>
</html>