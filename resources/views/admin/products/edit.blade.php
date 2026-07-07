@extends('admin.layout')

@section('title', 'Edit Produk')
@section('header', 'Edit Produk')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
        <h3 class="font-bold text-slate-800 text-lg">Edit: {{ $product->name }}</h3>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf
        @method('PUT')

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
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Varian Benih (Seed Type)</label>
                <input type="text" name="seed_type" value="{{ old('seed_type', $product->seed_type) }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Jumlah Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Ganti Foto (Opsional)</label>
                <input type="file" name="image_file" accept="image/*" class="w-full border border-slate-200 p-2.5 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm text-slate-500 file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                <p class="text-xs text-slate-400 mt-2">Biarkan kosong jika tidak ingin mengganti gambar.</p>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Produk</label>
            <textarea name="description" rows="4" required class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="pt-4 flex gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-md transition-colors">Perbarui Produk</button>
        </div>
    </form>
</div>
@endsection
