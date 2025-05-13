<x-layouts.app :title="'Daftar Produk'">
    @if(session('success'))
        <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Daftar Produk</h2>

        <a href="{{ route('products.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded">
            + Tambah Produk
        </a>

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                <th class="border p-2">Nama</th>
                <th class="border p-2">Deskripsi</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Gambar</th>
                <th class="border p-2">Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="border p-2">{{ $product->name }}</td>
                    <td class="border p-2">{{ $product->description }}</td>
                    <td class="border p-2">Rp{{ number_format($product->price, 2) }}</td>
                    <td class="border p-2">{{ $product->stock }}</td>
                    <td class="border p-2">{{ $product->product_category_id }}</td>
                    <td class="border p-2">
                        @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="Gambar" width="50">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.app>
