@extends('admin.layout')

@section('title', 'Prospek Kemitraan B2B')
@section('header', 'Kotak Masuk: Permohonan Demo Sekolah')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
        <h3 class="font-bold text-slate-800 text-lg">Daftar Prospek (Leads)</h3>
        <p class="text-xs text-slate-500 mt-1">Kelola permohonan demonstrasi dari guru dan sekolah.</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Info Kontak</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Pesan</th>
                    <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status & Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($partnerships as $lead)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="p-4 align-top">
                        <span class="text-sm font-medium text-slate-700">{{ $lead->created_at->format('d M Y') }}</span><br>
                        <span class="text-xs text-slate-400">{{ $lead->created_at->format('H:i') }} WIB</span>
                    </td>
                    <td class="p-4 align-top">
                        <p class="font-bold text-slate-800 text-sm">{{ $lead->school_name }}</p>
                        <p class="text-sm text-slate-600 mt-0.5">👤 {{ $lead->teacher_name }}</p>
                        <p class="text-sm text-emerald-600 font-medium mt-1">📱 {{ $lead->phone_number }}</p>
                    </td>
                    <td class="p-4 align-top">
                        <p class="text-sm text-slate-600 bg-slate-50 p-3 rounded-xl italic border border-slate-100 min-w-[200px]">
                            "{{ $lead->message ?? 'Tidak ada pesan tambahan.' }}"
                        </p>
                    </td>
                    <td class="p-4 align-top">
                        <!-- Status Form -->
                        <form action="{{ route('admin.partnerships.updateStatus', $lead->id) }}" method="POST" class="mb-3">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="text-xs font-bold rounded-lg border border-slate-200 px-3 py-1.5 w-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-emerald-500
                                @if($lead->status == 'pending') bg-amber-50 text-amber-700 
                                @elseif($lead->status == 'contacted') bg-blue-50 text-blue-700 
                                @elseif($lead->status == 'deal') bg-green-50 text-green-700 
                                @endif
                            ">
                                <option value="pending" {{ $lead->status == 'pending' ? 'selected' : '' }}>🟡 Status: BARU</option>
                                <option value="contacted" {{ $lead->status == 'contacted' ? 'selected' : '' }}>🔵 Status: DIHUBUNGI</option>
                                <option value="deal" {{ $lead->status == 'deal' ? 'selected' : '' }}>🟢 Status: DEAL / SELESAI</option>
                            </select>
                        </form>

                        <div class="flex flex-col gap-2">
                            <!-- WhatsApp CTA -->
                            @php
                                // Format nomor WA (ganti 0 dengan 62)
                                $waNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $lead->phone_number));
                                $waMessage = urlencode("Halo Bpk/Ibu {$lead->teacher_name} dari {$lead->school_name},\n\nTerima kasih telah menghubungi Paper Grow. Menanggapi permohonan jadwal demonstrasi edukasi AR di sekolah Anda, kami ingin berdiskusi lebih lanjut...");
                            @endphp
                            <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" target="_blank" class="text-center bg-[#25D366] hover:bg-[#128C7E] text-white px-3 py-1.5 rounded-lg text-xs font-bold transition-colors shadow-sm">
                                💬 Chat WhatsApp
                            </a>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('admin.partnerships.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-center bg-white border border-red-200 hover:bg-red-50 text-red-500 px-3 py-1.5 rounded-lg text-xs font-bold transition-colors">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-slate-500">
                        <div class="text-3xl mb-2">📭</div>
                        Belum ada sekolah yang mendaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
