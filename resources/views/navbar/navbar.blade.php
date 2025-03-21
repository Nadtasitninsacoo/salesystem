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

<style>
    @keyframes subtleMoveLogo {
        0% {
            transform: translateX(-5px);
        }

        50% {
            transform: translateX(5px);
        }

        100% {
            transform: translateX(-5px);
        }
    }

    .animate-logo {
        animation: subtleMoveLogo 1s ease-in-out infinite;
    }
</style>

<body x-data="{ open: false, darkMode: localStorage.getItem('darkMode') === 'true' || false }">
    <nav :class="{ 'bg-white text-gray-900': !darkMode, 'bg-gray-900 text-white': darkMode }" class="shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- โลโก้ -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-2xl font-bold no-underline text-secondary animate-logo">
                            Software.Net
                        </a>
                    </div>
                    <!-- เมนู Dropdown -->
                    <div class="dropdown ml-4">
                        <button class="btn btn-outline-secondary border-gray-500 text-gray-900 my-2 fw-bold"
                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a href="{{ route('home') }}"
                                    class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">หน้าหลัก</a>
                            </li>
                            <hr>
                            <li><a href="{{ route('product') }}"
                                    class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">จัดการสินค้า</a>
                            </li>
                            <hr>
                            <li><a href="{{ route('category') }}"
                                    class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">จัดการหมวดหมู่</a>
                            </li>
                            <hr>
                            <li><a href="{{ route('member') }}"
                                    class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">จัดการผู้ใช้งาน</a>
                            </li>
                            <hr>
                            <li><a href="{{ route('reports') }}"
                                    class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">ยอดขายทั้งหมด</a>
                            </li>
                            <hr>
                            <li><a href="{{ route('orders.index') }}"
                                    class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">จัดการยอดขาย</a>
                            </li>
                            <hr>
                            <li><a href="{{ route('customer') }}"
                                    class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">จัดการข้อมูลลูกค้า</a>
                            </li><hr>
                            <li><a href="{{ route('index') }}"
                                class="text-gray-900 hover:text-gray-500 px-3 py-2 text-sm font-medium no-underline">Navbar_ชั่วคราว</a>
                        </li>                                  
                        </ul>
                    </div>

                    <!-- ปุ่ม Dark Mode Toggle -->
                    <div class="flex items-center ml-4">
                        <button
                            @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); document.documentElement.classList.toggle('dark', darkMode);"
                            :class="{ 'text-white': darkMode, 'text-gray-900': !darkMode }" class="focus:outline-none">

                            <!-- ดวงอาทิตย์ (เมื่อไม่อยู่ในโหมดมืด) -->
                            <svg x-show="!darkMode" class="w-8 h-8" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"
                                    fill="none" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M19.78 19.78l-1.42-1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M19.78 4.22l-1.42 1.42" />
                            </svg>
                            <!-- ดวงจันทร์ (เมื่ออยู่ในโหมดมืด) -->
                            <svg x-show="darkMode" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.293 14.707A8 8 0 119.293 6.707a5.5 5.5 0 008 8z"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- เมนู Hamburger (Mobile) -->
                    <button @click="open = !open" class="sm:hidden ml-4 text-gray-900 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="ml-auto flex items-center space-x-4">
                @auth
                    <div class="flex items-center space-x-2 justify-end">
                        <!-- แสดงคำว่า Welcome Admin -->
                        <span class="text-gray-900">Welcome {{ Auth::user()->name }}</span>
                        <!-- แสดงรูปผู้ใช้งาน -->
                        <div class="relative">
                            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}"
                                alt="Profile" class="w-10 h-10 rounded-full border border-gray-300">
                        </div>
                    </div>
                @endauth
            </div>

    </nav>
</body>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("navbar", () => ({
            open: false,
            darkMode: localStorage.getItem("darkMode") === "true" || false,
            toggleDarkMode() {
                this.darkMode = !this.darkMode;
                localStorage.setItem("darkMode", this.darkMode);
                document.documentElement.classList.toggle("dark", this.darkMode);
            },
        }));
    });
</script>
@yield('title')
@yield('content')
