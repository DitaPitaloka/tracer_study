<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex flex-col justify-between">
            <div>
                <div class="p-6 text-center text-xl font-bold border-b border-gray-700">
                    Admin Panel
                </div>
                <nav class="p-6 space-y-3 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-chart-line text-lg"></i> Dashboard
                    </a>
                    <a href="{{ route('alumni.index') }}" class="nav-link">
                        <i class="fas fa-users text-lg"></i> Data Alumni
                    </a>
                    <a href="{{ route('alumni.create') }}" class="nav-link">
                        <i class="fas fa-user-plus text-lg"></i> Tambah Alumni
                    </a>
                    <a href="{{ route('pertanyaan.index') }}" class="nav-link">
                        <i class="fas fa-question-circle text-lg"></i> Pertanyaan Kuesioner
                    </a>
                    <a href="{{ route('admin.jawaban.index') }}" class="nav-link">
                        <i class="fas fa-file-alt text-lg"></i> Jawaban Alumni
                    </a>
                    <a href="{{ route('admin.riwayat.index') }}" class="nav-link">
                        <i class="fas fa-briefcase text-lg"></i> Riwayat Pekerjaan Alumni
                    </a>
                    <a href="{{ route('grup-kuesioner.index') }}" class="nav-link">
                        <i class="fas fa-folder text-lg"></i> Grup Kuesioner
                    </a>
                </nav>
            </div>
            <!-- <div class="p-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-white flex items-center justify-center gap-2">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div> -->
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
                    <!-- <span class="font-semibold text-gray-700">{{ auth()->user()->name ?? 'Admin' }}</span> -->
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

    </div>

    <style>
        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease-in-out;
        }
        .nav-link:hover {
            background-color: #4B5563; /* gray-700 */
            transform: translateX(4px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
    </style>

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

</body>
</html>
