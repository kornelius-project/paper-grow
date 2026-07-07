@extends('admin.layout')

@section('header', '📦 Pesanan Masuk')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="p-6 border-b border-slate-200 bg-slate-50">
        <h2 class="text-lg font-black text-[#1E352F]">Daftar Pesanan Pelanggan</h2>
        <p class="text-sm text-slate-500">Kelola pesanan yang masuk dan perbarui status pengirimannya.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 px-6 py-4 border-b border-emerald-100 font-bold text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-600 text-sm border-b border-slate-200">
                    <th class="px-6 py-4 font-bold">No. Pesanan</th>
                    <th class="px-6 py-4 font-bold">Pelanggan</th>
                    <th class="px-6 py-4 font-bold">Rincian Barang</th>
                    <th class="px-6 py-4 font-bold">Total Harga</th>
                    <th class="px-6 py-4 font-bold">Status</th>
                    <th class="px-6 py-4 font-bold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($orders as $order)
                <tr class="transition-colors {{ $order->status == 'cancelled' ? 'bg-red-50/50 hover:bg-red-50' : 'hover:bg-slate-50' }}">
                    <td class="px-6 py-4 font-mono font-bold text-slate-700 {{ $order->status == 'cancelled' ? 'border-l-4 border-red-500' : '' }}">
                        #PG-{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}
                    </td>
                    <td class="px-6 py-4">
                        <p class="font-bold text-slate-800">{{ $order->user->name }}</p>
                        <p class="text-xs text-slate-500">{{ $order->user->email }}</p>
                        <p class="text-xs text-slate-400 mt-1">{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <ul class="list-disc list-inside text-slate-600">
                            @foreach($order->items as $item)
                                <li>{{ $item->product->name }} (x{{ $item->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-6 py-4 font-black text-[#1E352F]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        @if($order->status == 'pending')
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 font-bold rounded-full text-xs">Menunggu Bayar</span>
                        @elseif($order->status == 'processing')
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 font-bold rounded-full text-xs">Diproses</span>
                        @elseif($order->status == 'shipped')
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 font-bold rounded-full text-xs">Dikirim</span>
                        @elseif($order->status == 'completed')
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 font-bold rounded-full text-xs">Selesai</span>
                        @else
                            <span class="px-3 py-1 bg-red-100 text-red-700 font-bold rounded-full text-xs">Dibatalkan</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="inline-flex gap-2 items-center">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="text-sm border border-slate-300 rounded-lg px-2 py-1.5 focus:outline-none focus:border-emerald-500 bg-white">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Diproses</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Dikirim</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Batal</option>
                            </select>
                            <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-1.5 px-3 rounded-lg transition-colors text-xs">Update</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                        <div class="text-4xl mb-3">📭</div>
                        Belum ada pesanan masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
