@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-8">
        
        <!-- Kolom Kiri: Profil & Ganti Password -->
        <div class="w-full md:w-1/3 space-y-6">
            <!-- Kartu Identitas -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-24 bg-gradient-to-r from-emerald-500 to-green-600"></div>
                
                <div class="relative mt-8">
                    <div class="w-24 h-24 mx-auto rounded-full border-4 border-white shadow-lg bg-slate-100 flex items-center justify-center overflow-hidden">
                        @if($user->profile_photo)
                            <img src="{{ Storage::url($user->profile_photo) }}" alt="Foto Profil" class="w-full h-full object-cover">
                        @else
                            <span class="text-3xl font-black text-slate-400">{{ substr($user->name, 0, 1) }}</span>
                        @endif
                    </div>
                </div>
                
                <h2 class="text-xl font-bold text-[#1E352F] mt-4">{{ $user->name }}</h2>
                <p class="text-slate-500 text-sm mb-6">{{ $user->email }}</p>
                
                <!-- Form Upload Foto -->
                <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data" class="text-left border-t border-slate-100 pt-4">
                    @csrf
                    <label class="block text-xs font-bold text-slate-500 mb-2">Ubah Foto Profil</label>
                    <div class="flex gap-2">
                        <input type="file" name="profile_photo" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer border border-slate-200 rounded-full" required>
                        <button type="submit" class="bg-[#1E352F] text-white px-4 py-2 rounded-full text-sm font-bold hover:bg-[#152520] transition-colors">Simpan</button>
                    </div>
                    @error('profile_photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </form>
            </div>

            <!-- Ganti Password -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
                <h3 class="font-bold text-[#1E352F] mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Ganti Password
                </h3>
                <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1">Password Lama</label>
                        <input type="password" name="current_password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" required>
                        @error('current_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1">Password Baru</label>
                        <input type="password" name="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" required>
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all" required>
                    </div>
                    
                    <button type="submit" class="w-full bg-emerald-50 text-emerald-700 font-bold py-2.5 rounded-xl hover:bg-emerald-100 transition-colors border border-emerald-200 text-sm">Update Password</button>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Riwayat Pesanan -->
        <div class="w-full md:w-2/3">
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 h-full">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold text-xl text-[#1E352F] flex items-center gap-2">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        Riwayat Pesanan
                    </h3>
                    <span class="text-xs font-bold bg-slate-100 text-slate-500 px-3 py-1 rounded-full">{{ $orders->count() }} Pesanan</span>
                </div>

                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 font-medium text-sm">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @if($orders->count() > 0)
                    <div class="space-y-4">
                        @foreach($orders as $order)
                            <div class="border border-slate-200 rounded-2xl p-5 hover:shadow-md transition-shadow">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="font-mono text-sm font-bold text-slate-700 bg-slate-100 px-2 py-0.5 rounded">#PG-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                                            <span class="text-xs text-slate-400">{{ $order->created_at->format('d M Y, H:i') }}</span>
                                        </div>
                                        <p class="font-black text-lg text-[#1E352F]">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                                    </div>
                                    
                                    <div>
                                        @if($order->status == 'pending')
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1.5 rounded-full border border-yellow-200">Menunggu Pembayaran</span>
                                        @elseif($order->status == 'processing')
                                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1.5 rounded-full border border-blue-200">Diproses</span>
                                        @elseif($order->status == 'shipped')
                                            <span class="bg-purple-100 text-purple-800 text-xs font-bold px-3 py-1.5 rounded-full border border-purple-200">Dikirim</span>
                                        @elseif($order->status == 'completed')
                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1.5 rounded-full border border-emerald-200">Selesai</span>
                                        @elseif($order->status == 'cancelled')
                                            <span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1.5 rounded-full border border-red-200">Dibatalkan</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="bg-slate-50 rounded-xl p-3 border border-slate-100">
                                    <p class="text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Item yang dibeli:</p>
                                    <div class="space-y-2">
                                        @foreach($order->items as $item)
                                            <div class="flex justify-between items-center text-sm">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-slate-700 font-medium">{{ $item->product->name }}</span>
                                                    <span class="text-xs text-slate-400">x{{ $item->quantity }}</span>
                                                </div>
                                                <span class="text-slate-600 font-medium">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                @if($order->status == 'pending')
                                    <div class="mt-4 text-right">
                                        <a href="{{ route('order.success', $order->id) }}" class="inline-block bg-[#1E352F] hover:bg-[#152520] text-white text-xs font-bold py-2 px-4 rounded-full transition-colors shadow-sm">
                                            Lanjutkan Pembayaran
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-slate-100">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <p class="text-slate-500 font-medium mb-4">Anda belum memiliki riwayat pesanan.</p>
                        <a href="{{ route('products.index') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-6 rounded-full transition-colors text-sm shadow-md shadow-emerald-500/20">Mulai Belanja</a>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
