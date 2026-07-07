@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-black text-[#1E352F]">Keranjang Belanja 🛒</h1>
        <a href="{{ route('products.index') }}" class="text-sm font-bold text-emerald-600 hover:text-emerald-700">&larr; Lanjut Belanja</a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 text-sm font-medium">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($carts->count() > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Daftar Produk -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($carts as $item)
                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 flex gap-4 items-center">
                        <img src="{{ asset('images/' . ($item->product->image ?? 'product-mockup.png')) }}" alt="{{ $item->product->name }}" class="w-24 h-24 rounded-xl object-cover border border-slate-100">
                        
                        <div class="flex-1">
                            <h3 class="font-bold text-slate-800 text-lg">{{ $item->product->name }}</h3>
                            <p class="text-emerald-600 font-black">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                            
                            <div class="flex items-center gap-4 mt-3">
                                <!-- Update Quantity -->
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border border-slate-200 rounded-lg py-1 focus:outline-none focus:border-emerald-500 text-sm font-bold text-slate-700">
                                    <button type="submit" class="text-xs font-bold text-slate-400 hover:text-emerald-600 bg-slate-50 px-2 py-1.5 rounded-lg border border-slate-200">Update</button>
                                </form>
                                
                                <!-- Remove -->
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-700 px-2 py-1.5 rounded-lg hover:bg-red-50 transition-colors">🗑️ Hapus</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="text-right hidden sm:block">
                            <p class="text-xs font-bold text-slate-400 uppercase">Subtotal</p>
                            <p class="font-black text-slate-800 text-lg">Rp {{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Ringkasan Belanja -->
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/40 border border-slate-100 h-fit sticky top-24">
                <h3 class="font-black text-xl text-slate-800 border-b border-slate-100 pb-4 mb-4">Ringkasan Belanja</h3>
                
                <div class="flex justify-between items-center mb-3">
                    <span class="text-slate-500 font-medium text-sm">Total Harga ({{ $carts->sum('quantity') }} barang)</span>
                    <span class="text-slate-800 font-bold text-sm">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center mb-6">
                    <span class="text-slate-500 font-medium text-sm">Biaya Pengiriman</span>
                    <span class="text-emerald-600 font-bold text-sm">Gratis</span>
                </div>
                
                <div class="flex justify-between items-center border-t border-slate-100 pt-4 mb-6">
                    <span class="font-bold text-slate-800">Total Tagihan</span>
                    <span class="font-black text-2xl text-[#1E352F]">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>

                <form action="{{ route('order.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-emerald-500/30 transition-transform transform hover:-translate-y-1">
                        Checkout Sekarang ➔
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="text-center bg-white rounded-3xl p-12 shadow-sm border border-slate-100">
            <div class="text-6xl mb-4">🛒</div>
            <h2 class="text-2xl font-black text-slate-800 mb-2">Keranjang Anda Kosong</h2>
            <p class="text-slate-500 mb-6">Yuk, mulai bertani organik dengan benih-benih ajaib dari Paper Grow!</p>
            <a href="{{ route('products.index') }}" class="inline-block bg-[#1E352F] text-white font-bold py-3 px-8 rounded-xl hover:bg-emerald-700 transition-colors">
                Jelajahi Produk
            </a>
        </div>
    @endif
</div>
@endsection
