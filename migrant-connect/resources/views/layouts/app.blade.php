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

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Flatpickr Datepicker -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .flatpickr-calendar {
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
                border: 1px solid #e5e7eb;
            }
            .flatpickr-day.selected {
                background: #4f46e5;
                border-color: #4f46e5;
            }
            .flatpickr-day.selected:hover {
                background: #4338ca;
                border-color: #4338ca;
            }
            .flatpickr-day.today {
                border-color: #4f46e5;
                color: #4f46e5;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50 min-h-screen">
        <div class="min-h-screen relative flex">
            <!-- Sidebar -->
            <x-sidebar />

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col main-content-responsive">
                <!-- Page Heading -->
                @hasSection('header')
                    <header class="bg-white border-b border-gray-200  shadow-sm relative z-10">
                        <div class=" mx-auto py-5 px-4 sm:px-6 lg:px-8 animate-fade-in-up">
                            @yield('header')
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="flex-1 py-8 px-4 sm:px-6 lg:px-8 animate-fade-in-up" style="animation-delay: 0.05s;">
                    @yield('content')
                </main>

                <!-- Notification Component -->
                <x-notification />
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        }
                    });
                });
            });
        </script>
    </body>
</html>
