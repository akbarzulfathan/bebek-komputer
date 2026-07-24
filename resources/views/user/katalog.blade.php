<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - Bebek Komputer</title>
    <!-- Memuat file CSS dari Vite bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen">
        
        <!-- Navbar -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-blue-600">Bebek Komputer</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        @if (Route::has('login'))
                            @auth
                                <!-- Jika yang login admin, tampilkan link dashboard -->
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600 font-semibold mr-4">Dashboard Admin</a>
                                @endif

                                <!-- Tombol Logout untuk semua yang sudah login -->
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                     @csrf
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">Logout</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Login</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Katalog Part Komputer</h2>
            
            <!-- Grid Tampilan Produk (Card Responsif) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($parts as $part)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <span class="inline-block px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full mb-3">
                            {{ $part->kategori }}
                        </span>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $part->nama_produk }}</h3>
                        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-xl font-extrabold text-gray-900">
                                Rp {{ number_format($part->harga, 0, ',', '.') }}
                            </span>
                            <span class="text-sm text-gray-500 font-medium">Stok: {{ $part->stok }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada part komputer yang dijual.</p>
                </div>
                @endforelse
            </div>
        </main>
        
    </div>
</body>
</html>