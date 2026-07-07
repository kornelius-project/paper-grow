@extends('admin.layout')

@section('title', 'Katalog Produk')
@section('header', 'Manajemen Katalog')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
        <h3 class="font-bold text-slate-800 text-lg">Daftar Produk Aktif</h3>
        <a href="{{ route('admin.products.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-5 rounded-xl text-sm transition-colors shadow-sm">
            + Tambah Produk Baru
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Info Produk</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Harga</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Stok</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($products as $product)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="p-4 flex items-center gap-4">
                        <img src="{{ asset('images/' . ($product->image ?? 'product-mockup.png')) }}" alt="{{ $product->name }}" class="w-16 h-16 rounded-xl object-cover border border-slate-200 shadow-sm">
                        <div>
                            <p class="font-bold text-slate-800">{{ $product->name }}</p>
                            <p class="text-xs text-slate-500 mt-1">Varian: <span class="font-semibold text-emerald-600">{{ $product->seed_type }}</span></p>
                        </div>
                    </td>
                    <td class="p-4">
                        <span class="font-bold text-slate-700">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </td>
                    <td class="p-4">
                        @if($product->stock > 10)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-green-100 text-green-800">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> {{ $product->stock }} Pcs
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-amber-100 text-amber-800 animate-pulse">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> {{ $product->stock }} Pcs (Tipis)
                            </span>
                        @endif
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-block bg-slate-100 hover:bg-blue-100 text-slate-600 hover:text-blue-600 px-3 py-1.5 rounded-lg text-sm font-medium transition-colors">
                            Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-slate-100 hover:bg-red-100 text-slate-600 hover:text-red-600 px-3 py-1.5 rounded-lg text-sm font-medium transition-colors">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-slate-500">Belum ada produk yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
