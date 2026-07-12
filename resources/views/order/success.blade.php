@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 py-12 relative text-center">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-black text-[#1E352F] mb-2">Pesanan Berhasil! 🎉</h1>
        <p class="text-slate-500">Terima kasih telah berbelanja di Paper Grow. Silakan selesaikan pembayaran Anda di bawah ini.</p>
    </div>

    <!-- Kontainer Detail -->
    <div class="bg-white rounded-3xl p-8 shadow-lg shadow-slate-200/50 border border-slate-100 mb-8">
        <p class="text-sm text-slate-500 mb-2">Nomor Pesanan Anda:</p>
        <div class="font-mono bg-slate-100 py-3 px-4 rounded-xl block text-center text-slate-700 font-bold tracking-widest border border-slate-200 mb-6">
            #PG-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
        </div>

        <div class="flex justify-between items-center border-t border-slate-100 pt-6 mb-6">
            <span class="font-bold text-slate-600">Total Pembayaran</span>
            <span class="font-black text-2xl text-[#1E352F]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
        </div>

        <!-- Tombol Bayar Midtrans -->
        @if($order->status == 'pending')
            <button id="pay-button" class="w-full bg-[#1E352F] hover:bg-[#152520] text-white font-bold py-4 px-8 rounded-full shadow-lg shadow-[#1E352F]/30 transition-transform transform hover:-translate-y-1">
                Lanjutkan Pembayaran Sekarang ➔
            </button>
        @else
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 font-bold py-4 rounded-xl">
                ✅ Pesanan Sudah Dibayar / Diproses
            </div>
        @endif
    </div>
    
    <a href="{{ route('products.index') }}" class="text-slate-500 font-bold hover:text-slate-800 transition-colors">
        Kembali ke Beranda
    </a>
</div>

@if($order->status == 'pending' && $order->snap_token)
<!-- Midtrans Snap JS -->
<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        // SnapToken dari controller
        snap.pay('{{ $order->snap_token }}', {
            // Optional
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                window.location.href = "{{ route('profile.index') }}";
            },
            onPending: function(result){
                alert("Menunggu pembayaran Anda!");
            },
            onError: function(result){
                alert("Pembayaran gagal!");
            },
            onClose: function(){
                console.log('Customer menutup popup tanpa menyelesaikan pembayaran');
            }
        });
    };
</script>
@endif
@endsection
