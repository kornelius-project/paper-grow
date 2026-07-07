@extends('layouts.app')

@section('content')
@php
    $expiresAt = $order->created_at->addMinutes(10);
    $isExpired = now()->greaterThanOrEqualTo($expiresAt);
    $remainingSeconds = $isExpired ? 0 : now()->diffInSeconds($expiresAt);
@endphp

<div class="max-w-xl mx-auto px-4 py-8 relative">
    @if($isExpired)
        <!-- UI PESANAN HANGUS -->
        <div class="bg-red-50 border border-red-200 rounded-3xl p-8 text-center mt-10">
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
            <h1 class="text-2xl font-black text-red-700 mb-2">Waktu Pembayaran Habis</h1>
            <p class="text-red-600 mb-6">Pesanan Anda telah dibatalkan secara otomatis karena melewati batas waktu 10 menit.</p>
            <a href="{{ route('products.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-xl transition-colors inline-block shadow-lg shadow-red-500/30">Kembali Belanja</a>
        </div>
    @else
        <!-- Header -->
        <div class="mb-6 flex items-center justify-between mt-4">
            <div>
                <h1 class="text-2xl font-black text-[#1E352F]">Metode Pembayaran</h1>
                <p class="text-slate-500 text-sm">Yuk pilih cara bayar yang kamu mau!</p>
            </div>
            <!-- Icon silang seperti di referensi -->
            <a href="{{ route('products.index') }}" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition-colors">
                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </a>
        </div>

        <!-- STEP 1: Pemilihan Pembayaran -->
        <div id="step-1-selection" class="pb-24">
            
            <!-- Category: Virtual Account -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-3 px-1">
                    <h2 class="font-bold text-slate-800 text-lg">Virtual Account</h2>
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <!-- Bank BRI -->
                    <label class="flex items-center justify-between p-4 border-b border-slate-100 cursor-pointer hover:bg-slate-50 transition-colors group">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-[10px] font-black tracking-tighter text-blue-800">BANK BRI</div>
                            <span class="font-medium text-slate-700">BRI</span>
                        </div>
                        <input type="radio" name="payment_method" value="bri" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('bri')">
                    </label>
                    <!-- Bank Mandiri -->
                    <label class="flex items-center justify-between p-4 border-b border-slate-100 cursor-pointer hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-[10px] font-black tracking-tighter text-yellow-600">mandiri</div>
                            <span class="font-medium text-slate-700">Mandiri</span>
                        </div>
                        <input type="radio" name="payment_method" value="mandiri" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('mandiri')">
                    </label>
                    <!-- Bank BCA -->
                    <label class="flex items-center justify-between p-4 border-b border-slate-100 cursor-pointer hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-[10px] font-black tracking-tighter text-blue-600">BCA</div>
                            <span class="font-medium text-slate-700">BCA</span>
                        </div>
                        <input type="radio" name="payment_method" value="bca" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('bca')">
                    </label>
                    <!-- Bank BNI -->
                    <label class="flex items-center justify-between p-4 cursor-pointer hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-[10px] font-black tracking-tighter text-orange-600">BNI</div>
                            <span class="font-medium text-slate-700">BNI</span>
                        </div>
                        <input type="radio" name="payment_method" value="bni" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('bni')">
                    </label>
                </div>
            </div>

            <!-- Category: E-Wallet -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-3 px-1">
                    <h2 class="font-bold text-slate-800 text-lg">E-Wallet & QRIS</h2>
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <!-- QRIS -->
                    <label class="flex items-center justify-between p-4 border-b border-slate-100 cursor-pointer hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-xs font-black text-red-600">QRIS</div>
                            <span class="font-medium text-slate-700">QRIS (Semua Bank/E-Wallet)</span>
                        </div>
                        <input type="radio" name="payment_method" value="qris" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('qris')">
                    </label>
                    <!-- GoPay -->
                    <label class="flex items-center justify-between p-4 border-b border-slate-100 cursor-pointer hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-[10px] font-black tracking-tighter text-blue-500">gopay</div>
                            <span class="font-medium text-slate-700">GoPay</span>
                        </div>
                        <input type="radio" name="payment_method" value="gopay" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('gopay')">
                    </label>
                    <!-- OVO -->
                    <label class="flex items-center justify-between p-4 border-b border-slate-100 cursor-pointer hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-[10px] font-black tracking-tighter text-purple-600">OVO</div>
                            <span class="font-medium text-slate-700">OVO</span>
                        </div>
                        <input type="radio" name="payment_method" value="ovo" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('ovo')">
                    </label>
                    <!-- DANA -->
                    <label class="flex items-center justify-between p-4 cursor-pointer hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-8 bg-slate-100 rounded flex items-center justify-center text-[10px] font-black tracking-tighter text-blue-400">DANA</div>
                            <span class="font-medium text-slate-700">DANA</span>
                        </div>
                        <input type="radio" name="payment_method" value="dana" class="w-5 h-5 text-[#1E352F] focus:ring-[#1E352F] border-slate-300" onchange="selectPayment('dana')">
                    </label>
                </div>
            </div>

            <!-- Bottom Bar (Inline) -->
            <div class="bg-white border border-slate-200 p-5 rounded-3xl shadow-sm mt-2 mb-8">
                <div class="flex justify-between items-center px-2">
                    <div>
                        <p class="text-xs text-slate-500 mb-1">Total Pembayaran</p>
                        <div class="flex items-center gap-2">
                            <p class="text-xl font-black text-[#1E352F]">Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                        </div>
                    </div>
                    <button id="btn-proceed" onclick="proceedToPayment()" class="bg-slate-300 text-white font-bold py-3.5 px-10 rounded-full transition-colors cursor-not-allowed text-lg" disabled>
                        Bayar
                    </button>
                </div>
            </div>
        </div>

        <!-- STEP 2: Detail Pembayaran & Timer -->
        <div id="step-2-details" class="hidden">
            <!-- Timer Pembayaran -->
            <div class="bg-red-50 border border-red-200 rounded-3xl p-6 mb-6 flex flex-col items-center justify-center gap-1 shadow-sm">
                <span class="text-sm text-red-700 font-medium">Selesaikan pembayaran dalam</span>
                <span id="countdown-timer" class="font-bold text-red-600 text-4xl tracking-widest my-2">00:00</span>
                <p class="text-xs text-red-500 bg-red-100 py-1 px-3 rounded-full mt-1">Jatuh tempo: <span class="font-bold">{{ $expiresAt->format('H:i') }} WIB</span></p>
            </div>
            
            <div id="timeout-msg" class="hidden bg-red-100 border border-red-300 text-red-700 p-6 rounded-3xl mb-6 text-center font-bold shadow-sm">
                <p class="text-xl mb-2">Waktu Habis!</p>
                <p class="text-sm font-normal">Pesanan ini telah kedaluwarsa. Silakan buat pesanan baru.</p>
            </div>

            <!-- Kontainer Detail -->
            <div id="payment-details-container" class="bg-white rounded-3xl p-8 shadow-lg shadow-slate-200/50 border border-slate-100 mb-6 text-center">
                <!-- Diisi oleh JS -->
            </div>
            
            <p class="text-sm text-slate-500 mb-2 text-center">Nomor Pesanan Anda:</p>
            <div class="font-mono bg-slate-100 py-3 px-4 rounded-xl block text-center text-slate-700 font-bold tracking-widest border border-slate-200 mb-8">
                #PG-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
            </div>

            <div id="action-buttons" class="flex flex-col gap-3 pb-8">
                <a id="wa-confirm-btn" href="#" target="_blank" class="bg-[#1E352F] hover:bg-[#152520] text-white font-bold py-4 px-8 rounded-full shadow-lg shadow-[#1E352F]/30 transition-transform transform hover:-translate-y-1 text-center w-full">
                    Konfirmasi via WhatsApp
                </a>
                <a href="{{ route('products.index') }}" class="text-slate-500 font-bold py-3 text-center w-full hover:text-slate-800 transition-colors">
                    Kembali ke Beranda
                </a>
            </div>
        </div>

        <script>
            let selectedMethod = '';
            let selectedMethodName = '';
            let timerInterval;
            const remainingSeconds = {{ $remainingSeconds }};
            
            function selectPayment(method) {
                selectedMethod = method;
                
                // Set nama metode untuk UI
                const names = {
                    'bri': 'Bank BRI',
                    'mandiri': 'Bank Mandiri',
                    'bca': 'Bank BCA',
                    'bni': 'Bank BNI',
                    'qris': 'QRIS',
                    'gopay': 'GoPay',
                    'ovo': 'OVO',
                    'dana': 'DANA'
                };
                selectedMethodName = names[method];
                
                // Aktifkan tombol Bayar
                const proceedBtn = document.getElementById('btn-proceed');
                proceedBtn.disabled = false;
                proceedBtn.classList.remove('bg-slate-300', 'cursor-not-allowed');
                proceedBtn.classList.add('bg-[#1E352F]', 'hover:bg-[#152520]', 'shadow-lg');
            }
            
            function proceedToPayment() {
                if(!selectedMethod) return;
                
                // Sembunyikan layar 1, tampilkan layar 2
                document.getElementById('step-1-selection').classList.add('hidden');
                document.getElementById('step-2-details').classList.remove('hidden');
                
                // Hapus background body jika diperlukan, tapi ini default layout
                
                // Render detail pembayaran sesuai pilihan
                renderPaymentDetail();
                
                // Update link WA
                updateWALink();
                
                // Mulai Timer dari server time
                startTimer(remainingSeconds);
                
                // Scroll ke atas
                window.scrollTo(0,0);
            }

            function renderPaymentDetail() {
                const container = document.getElementById('payment-details-container');
                let html = '';

                if (['bri', 'mandiri', 'bca', 'bni'].includes(selectedMethod)) {
                    // Virtual Account Style
                    html = `
                        <p class="text-sm text-slate-500 mb-3">No. Virtual Account ${selectedMethodName}:</p>
                        <p class="text-3xl font-black text-[#1E352F] tracking-wider mb-2">8800 1234 5678</p>
                        <p class="text-sm text-slate-400 border-b border-slate-100 pb-6 mb-6">a.n. Paper Grow Indonesia</p>
                        <button class="text-[#1E352F] font-bold text-sm bg-slate-100 hover:bg-slate-200 py-2 px-6 rounded-full transition-colors">Salin Nomor</button>
                    `;
                } else if (selectedMethod === 'qris') {
                    // QRIS Style
                    html = `
                        <p class="text-sm text-slate-500 mb-6">Scan QRIS menggunakan m-Banking / e-Wallet:</p>
                        <div class="w-56 h-56 bg-white border border-slate-200 p-4 mx-auto rounded-3xl shadow-sm mb-6">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=QRIS_PAPERGROW_{{ $order->id }}" alt="QRIS" class="w-full h-full object-contain">
                        </div>
                        <p class="text-lg font-black text-[#1E352F]">PAPER GROW OFFICIAL</p>
                        <p class="text-sm text-slate-400 mt-1">NMID: ID1029384756</p>
                    `;
                } else {
                    // E-Wallet (GoPay / OVO / DANA) Style
                    html = `
                        <p class="text-sm text-slate-500 mb-3">Transfer ke nomor ${selectedMethodName}:</p>
                        <p class="text-3xl font-black text-[#1E352F] tracking-wider mb-2">0812-3456-7890</p>
                        <p class="text-sm text-slate-400 border-b border-slate-100 pb-6 mb-6">a.n. Paper Grow Official</p>
                        <button class="text-[#1E352F] font-bold text-sm bg-slate-100 hover:bg-slate-200 py-2 px-6 rounded-full transition-colors">Salin Nomor</button>
                    `;
                }

                container.innerHTML = html;
            }
            
            function startTimer(duration) {
                if (duration <= 0) {
                    paymentTimeout();
                    return;
                }

                let timer = duration;
                const display = document.getElementById('countdown-timer');
                
                timerInterval = setInterval(function () {
                    let minutes = parseInt(timer / 60, 10);
                    let seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        clearInterval(timerInterval);
                        paymentTimeout();
                    }
                }, 1000);
            }
            
            function paymentTimeout() {
                // Sembunyikan timer & detail, tampilkan pesan habis waktu
                document.getElementById('countdown-timer').parentElement.classList.add('hidden');
                document.getElementById('payment-details-container').classList.add('hidden');
                document.getElementById('timeout-msg').classList.remove('hidden');
                
                // Matikan tombol WA
                const waBtn = document.getElementById('wa-confirm-btn');
                waBtn.classList.add('opacity-50', 'pointer-events-none', 'bg-slate-300', 'text-slate-500');
                waBtn.classList.remove('bg-[#1E352F]', 'hover:bg-[#152520]', 'hover:-translate-y-1', 'shadow-lg');
                waBtn.removeAttribute('href');
                waBtn.innerText = 'Waktu Habis';
            }
            
            function updateWALink() {
                const waBtn = document.getElementById('wa-confirm-btn');
                const orderId = "{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}";
                const total = "{{ number_format($order->total_price, 0, ',', '.') }}";
                
                const message = `Halo Paper Grow, saya ingin mengonfirmasi pembayaran untuk nomor pesanan #PG-${orderId} sejumlah Rp ${total} menggunakan metode pembayaran ${selectedMethodName}. Saya sudah mentransfer dana tersebut.`;
                
                waBtn.href = `https://wa.me/6281234567890?text=${encodeURIComponent(message)}`;
            }
        </script>
    @endif
</div>
@endsection
