<nav class="bg-gradient-to-r from-blue-600 to-blue-800 p-4 text-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo & Judul -->
        <div class="text-2xl font-bold flex items-center">
            <svg class="h-8 w-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Pesan Travel Sekarang
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <button id="menu-toggle" class="lg:hidden block text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Menu Items -->
        <div id="menu" class="hidden lg:flex flex-col lg:flex-row lg:space-x-4 absolute lg:relative top-16 lg:top-0 left-0 w-full lg:w-auto bg-blue-700 lg:bg-transparent p-4 lg:p-0 shadow-md lg:shadow-none">
            <a href="/" class="block lg:inline-block hover:bg-blue-700 px-3 py-2 rounded transition-all duration-300">Pesan Travel</a>
            @guest
            <a href="/login" class="block lg:inline-block hover:bg-blue-700 px-3 py-2 rounded transition-all duration-300">Login</a>
            <a href="/register" class="block lg:inline-block hover:bg-blue-700 px-3 py-2 rounded transition-all duration-300">Register</a>
            @endguest
            @auth
            <a href="{{ route('frontend.riwayat.index') }}" class="block lg:inline-block hover:bg-blue-700 px-3 py-2 rounded transition-all duration-300">Riwayat</a>

            <!-- Dropdown Button -->
            <div class="relative">
                <button id="dropdown-toggle" class="block lg:inline-block hover:bg-blue-700 px-3 py-2 rounded transition-all duration-300">
                    {{ Auth::user()->name }}
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-900 rounded shadow-lg">
                    @role('Admin')
                    <a href="{{ route('backend.dashboard.index') }}" class="block w-full text-left px-4 py-2 hover:bg-gray-200">Dashboard</a>
                    @endrole
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</nav>

<!-- Script untuk Toggle Menu di Mobile dan Dropdown -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('menu').classList.toggle('hidden');
    });

    document.getElementById('dropdown-toggle').addEventListener('click', function(event) {
        event.stopPropagation();
        document.getElementById('dropdown-menu').classList.toggle('hidden');
    });

    document.addEventListener('click', function(event) {
        if (!document.getElementById('dropdown-toggle').contains(event.target)) {
            document.getElementById('dropdown-menu').classList.add('hidden');
        }
    });
</script>