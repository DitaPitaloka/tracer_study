<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Alumni Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white flex flex-col justify-between">
            <div>
                <div class="p-6 text-center text-xl font-bold border-b border-blue-700">
                    Alumni Panel
                </div>
                <nav class="p-6 space-y-3">
                    <a href="{{ route('alumni.dashboard') }}" class="block px-4 py-2 rounded transition-all duration-300 hover:bg-blue-700 hover:translate-x-1 hover:shadow-md">
                        <i class="fas fa-home mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('alumni.kuesioner') }}" class="block px-4 py-2 rounded transition-all duration-300 hover:bg-blue-700 hover:translate-x-1 hover:shadow-md">
                        <i class="fas fa-question-circle mr-2"></i> Isi Kuesioner
                    </a>
                    <a href="{{ route('alumni.riwayat.index') }}" class="block px-4 py-2 rounded transition-all duration-300 hover:bg-blue-700 hover:translate-x-1 hover:shadow-md">
                        <i class="fas fa-briefcase mr-2"></i> Riwayat Pekerjaan
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 flex flex-col">
            <!-- Header atas -->
            <header class="flex items-center justify-end bg-white p-4 shadow-sm relative">
                    <div class="relative">
                        <button onclick="toggleDropdown()" class="flex items-center gap-3 focus:outline-none">
                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-white font-bold uppercase">
                                {{ strtoupper(auth()->user()->name[0] ?? 'A') }}
                            </div>
                            <span class="font-semibold text-gray-700">{{ auth()->user()->name ?? 'Alumni' }}</span>
                            <!-- <i class="fas fa-chevron-down text-gray-500"></i> -->
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg z-10">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </header>

            <!-- Content -->
            <div class="flex-1 p-8 overflow-y-auto">
                @yield('content')
            </div>
        </main>

        <script>
            function toggleDropdown() {
                const dropdown = document.getElementById('profileDropdown');
                dropdown.classList.toggle('hidden');
            }
            window.onclick = function(event) {
                if (!event.target.closest('.relative')) {
                    document.getElementById('profileDropdown')?.classList.add('hidden');
                }
            }
        </script>

    </div>

</body>
</html>
