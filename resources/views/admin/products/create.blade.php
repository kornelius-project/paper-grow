@extends('admin.layout')

@section('title', 'Tambah Produk Baru')
@section('header', 'Tambah Produk')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
        <h3 class="font-bold text-slate-800 text-lg">Informasi Produk Baru</h3>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf

        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-xl text-sm mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="Contoh: Paper Grow - Paket Sayur Kangkung">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Varian Benih (Seed Type)</label>
                <input type="text" name="seed_type" value="{{ old('seed_type') }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none" placeholder="Contoh: Kangkung">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', 15000) }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Jumlah Stok</label>
                <input type="number" name="stock" value="{{ old('stock', 50) }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Upload Foto Produk (Opsional)</label>
                <input type="file" name="image_file" accept="image/*" class="w-full border border-slate-200 p-2.5 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm text-slate-500 file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Produk</label>
            <textarea name="description" rows="4" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('description') }}</textarea>
        </div>

        <div class="pt-4 flex gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-md transition-colors">Simpan Produk</button>
        </div>
    </form>
</div>
@endsection
