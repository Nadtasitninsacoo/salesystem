@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    /*
    body {
        background-image: url("{{ asset('images/back1.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }
        */
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-white dark:bg-gray-900 shadow-lg fixed top-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/index" class="text-2xl font-bold text-indigo-600 dark:text-white no-underline">MyBrand</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6">
                <a href="/index" class="text-gray-700 dark:text-white hover:text-indigo-500 no-underline">Home</a>
                <a href="/about" class="text-gray-700 dark:text-white hover:text-indigo-500 no-underline">About</a>
                <a href="/services" class="text-gray-700 dark:text-white hover:text-indigo-500 no-underline">Services</a>
                <a href="/contact" class="text-gray-700 dark:text-white hover:text-indigo-500 no-underline">Contact</a>
            </div>

            <!-- Dark Mode Toggle + Mobile Menu Button -->
            <div class="flex items-center">
                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" class="p-2 text-gray-700 dark:text-white">
                    <svg id="theme-icon" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 2a9.95 9.95 0 00-7.07 2.93A9.95 9.95 0 002 12a9.95 9.95 0 002.93 7.07A9.95 9.95 0 0012 22a9.95 9.95 0 007.07-2.93A9.95 9.95 0 0022 12a9.95 9.95 0 00-2.93-7.07A9.95 9.95 0 0012 2z"></path>
                    </svg>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="ml-4 md:hidden text-gray-700 dark:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-900 p-4 space-y-2">
        <a href="/" class="block text-gray-700 dark:text-white hover:text-indigo-500">Home</a>
        <a href="/about" class="block text-gray-700 dark:text-white hover:text-indigo-500">About</a>
        <a href="/services" class="block text-gray-700 dark:text-white hover:text-indigo-500">Services</a>
        <a href="/contact" class="block text-gray-700 dark:text-white hover:text-indigo-500">Contact</a>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Mobile Menu Toggle
    document.getElementById('mobile-menu-btn').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Dark Mode Toggle
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;

    themeToggle.addEventListener('click', function () {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });

    // Load Theme from Local Storage
    if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
    }
});
</script>
@yield('title')
@yield('content')
