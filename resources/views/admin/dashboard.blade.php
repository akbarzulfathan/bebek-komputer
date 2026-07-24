<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Dashboard Admin Bebek Komputer</h2>
                <div class="flex justify-between items-center mb-6">
                    <p class="text-gray-600">Total Stok Keseluruhan: <strong>{{ $total_stok }} Unit</strong></p>
                    <a href="{{ route('admin.exportPdf') }}" class="bg-red-500 text-white px-4 py-2 rounded shadow">Export Laporan PDF</a>
                </div>

                <!-- Form Tambah (Create) -->
                <form action="{{ route('parts.store') }}" method="POST" class="mb-8 grid grid-cols-1 md:grid-cols-4 gap-4">
                    @csrf
                    <input type="text" name="nama_produk" placeholder="Nama Part" class="border rounded p-2" required>
                    <input type="text" name="kategori" placeholder="Kategori (e.g., RAM)" class="border rounded p-2" required>
                    <input type="number" name="harga" placeholder="Harga" class="border rounded p-2" required>
                    <input type="number" name="stok" placeholder="Stok" class="border rounded p-2" required>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded md:col-span-4 hover:bg-blue-700">Tambah Part Komputer</button>
                </form>

                <!-- Tabel Data (Read & Delete) -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="p-3 border-b">Nama Produk</th>
                                <th class="p-3 border-b">Kategori</th>
                                <th class="p-3 border-b">Harga</th>
                                <th class="p-3 border-b">Stok</th>
                                <th class="p-3 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parts as $part)
                            <tr>
                                <td class="p-3 border-b">{{ $part->nama_produk }}</td>
                                <td class="p-3 border-b">{{ $part->kategori }}</td>
                                <td class="p-3 border-b">Rp {{ number_format($part->harga, 0, ',', '.') }}</td>
                                <td class="p-3 border-b">{{ $part->stok }}</td>
                                <td class="p-3 border-b">
                                    <form action="{{ route('parts.destroy', $part->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>