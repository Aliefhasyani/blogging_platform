<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="font-sans antialiased">


   @if(session('success'))
        <div id="toast-success" class="custom-toast toast-success">
            <i class="fa fa-check-circle text-lg"></i>
            <span>{{ session('success') }}</span>
            <div class="toast-progress"></div>
        </div>
        @endif

        @if(session('error'))
        <div id="toast-error" class="custom-toast toast-error">
            <i class="fa fa-times-circle text-lg"></i>
            <span>{{ session('error') }}</span>
            <div class="toast-progress"></div>
        </div>
    @endif


    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
            {{ $slot }}
            <footer class="bg-dark text-white py-12 mt-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-rocket text-white"></i>
                        </div>
                        <span class="text-xl font-bold">BlogSpace</span>
                    </div>
                    <p class="text-gray-400">
                        A community-driven platform for sharing knowledge and stories.
                    </p>
                    </div>
                    
                    <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('posts') }}" class="hover:text-white transition-colors">Browse Posts</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Popular Topics</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Community Guidelines</a></li>
                    </ul>
                    </div>
                    
                    <div>
                    <h4 class="font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                    </div>
                    
                    <div>
                    <h4 class="font-semibold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                        <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2025 BlogSpace. All rights reserved.</p>
                </div>
                </div>
            </footer>
        </main>
    </div>

   <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toasts = document.querySelectorAll('.custom-toast');
            toasts.forEach(toast => {
                setTimeout(() => {
                    toast.classList.add('toast-hide');
                    setTimeout(() => toast.remove(), 600); 
                }, 3000); 
            });
        });
    </script>

</body>
</html>
