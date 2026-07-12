@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-black text-[#1E352F]">Pengiriman & Pembayaran 🚚</h1>
        <a href="{{ route('cart.index') }}" class="text-sm font-bold text-emerald-600 hover:text-emerald-700">&larr; Kembali ke Keranjang</a>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm font-medium">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.checkout') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Alamat -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-100">
                    <h3 class="font-black text-xl text-slate-800 border-b border-slate-100 pb-4 mb-6">Detail Pengiriman</h3>
                    
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Penerima</label>
                            <input type="text" name="shipping_name" value="{{ old('shipping_name', auth()->user()->name) }}" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white text-slate-800">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Handphone / WhatsApp</label>
                            <input type="text" name="shipping_phone" value="{{ old('shipping_phone') }}" required placeholder="Contoh: 081234567890" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white text-slate-800">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap</label>
                            <textarea name="shipping_address" required rows="4" placeholder="Contoh: Jl. Merdeka No. 123, RT 01/RW 02, Kelurahan, Kecamatan, Kota, Provinsi, Kode Pos" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors bg-slate-50 focus:bg-white text-slate-800">{{ old('shipping_address') }}</textarea>
                            <p class="text-xs text-slate-500 mt-2">Pastikan alamat diisi dengan lengkap dan benar untuk menghindari gagal kirim.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Belanja -->
            <div class="bg-white rounded-3xl p-6 shadow-xl shadow-slate-200/40 border border-slate-100 h-fit sticky top-24">
                <h3 class="font-black text-xl text-slate-800 border-b border-slate-100 pb-4 mb-4">Ringkasan Belanja</h3>
                
                <div class="space-y-3 mb-6">
                    @foreach($carts as $item)
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-600 truncate mr-2">{{ $item->product->name }} (x{{ $item->quantity }})</span>
                            <span class="text-slate-800 font-bold">Rp {{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-slate-100 pt-4 space-y-3">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-slate-500 font-medium text-sm">Subtotal</span>
                        <span class="text-slate-800 font-bold text-sm">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-slate-500 font-medium text-sm">Pajak (PPN 12%)</span>
                        <span class="text-slate-800 font-bold text-sm">Rp {{ number_format($tax, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-slate-500 font-medium text-sm">Biaya Pengiriman</span>
                        <span class="text-emerald-600 font-bold text-sm">Gratis</span>
                    </div>
                    
                    <div class="flex justify-between items-center border-t border-slate-100 pt-4 mb-6">
                        <span class="font-bold text-slate-800">Total Tagihan</span>
                        <span class="font-black text-2xl text-[#1E352F]">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>

                    <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-emerald-500/30 transition-transform transform hover:-translate-y-1">
                        Bayar Sekarang ➔
                    </button>
                    <p class="text-xs text-center text-slate-400 mt-4 flex items-center justify-center gap-1">
                        🔒 Pembayaran aman dengan Midtrans
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
