<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Migrant Connect') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        
        <!-- Additional Font Awesome for enhanced icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Additional custom styles for enhanced beauty */
            .bg-animated {
                background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
                background-size: 400% 400%;
                animation: gradient 15s ease infinite;
            }
            
            .floating-particles {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: -1;
                pointer-events: none;
            }
            
            .particle {
                position: absolute;
                background: rgba(99, 102, 241, 0.1);
                border-radius: 50%;
                animation: float 6s ease-in-out infinite;
            }
            
            .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
            .particle:nth-child(2) { left: 20%; animation-delay: 2s; }
            .particle:nth-child(3) { left: 30%; animation-delay: 4s; }
            .particle:nth-child(4) { left: 40%; animation-delay: 1s; }
            .particle:nth-child(5) { left: 50%; animation-delay: 3s; }
            .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
            .particle:nth-child(7) { left: 70%; animation-delay: 2s; }
            .particle:nth-child(8) { left: 80%; animation-delay: 4s; }
            .particle:nth-child(9) { left: 90%; animation-delay: 1s; }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
        <!-- Floating particles background -->
        <div class="floating-particles">
            <div class="particle w-4 h-4"></div>
            <div class="particle w-6 h-6"></div>
            <div class="particle w-3 h-3"></div>
            <div class="particle w-5 h-5"></div>
            <div class="particle w-4 h-4"></div>
            <div class="particle w-6 h-6"></div>
            <div class="particle w-3 h-3"></div>
            <div class="particle w-5 h-5"></div>
            <div class="particle w-4 h-4"></div>
        </div>
        
        <div class="min-h-screen relative">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="glass dark:glass-dark border-b border-gray-200/50 dark:border-gray-700/50 shadow-soft">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 animate-fade-in-up">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                @yield('content')
            </main>
        </div>
        
        <!-- JavaScript for enhanced interactions -->
        <script>
            // Add smooth scrolling
            document.addEventListener('DOMContentLoaded', function() {
                // Smooth scroll for anchor links
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
                
                // Add intersection observer for animations
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };
                
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-fade-in-up');
                        }
                    });
                }, observerOptions);
                
                // Observe all cards and sections
                document.querySelectorAll('.card, .stat-card, .feature-card, section').forEach(el => {
                    observer.observe(el);
                });
            });
        </script>
    </body>
</html>
