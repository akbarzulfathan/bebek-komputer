<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stok Bebek Komputer</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Inventaris Part - Bebek Komputer</h2>
    <p>Dicetak pada: {{ date('d M Y') }}</p>
    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
        @foreach($parts as $part)
        <tr>
            <td>{{ $part->nama_produk }}</td>
            <td>{{ $part->kategori }}</td>
            <td>{{ $part->stok }}</td>
            <td>Rp {{ number_format($part->harga, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>