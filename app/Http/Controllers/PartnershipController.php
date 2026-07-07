<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'teacher_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        // 2. Simpan ke database menggunakan model Partnership
        Partnership::create([
            'school_name' => $validated['school_name'],
            'teacher_name' => $validated['teacher_name'],
            'phone_number' => $validated['phone_number'],
            'message' => $request->message, // Opsional boleh kosong
            'status' => 'pending', // Status awal default sesuai migration
        ]);

        // 3. Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengajuan demonstrasi berhasil dikirim! Tim Paper Grow akan segera menghubungi Anda melalui WhatsApp.');
    }
}