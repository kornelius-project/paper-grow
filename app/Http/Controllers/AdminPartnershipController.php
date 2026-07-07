<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;

class AdminPartnershipController extends Controller
{
    // READ: Tampilkan daftar prospek
    public function index()
    {
        $partnerships = Partnership::latest()->get();
        return view('admin.partnerships.index', compact('partnerships'));
    }

    // UPDATE: Mengubah status prospek
    public function updateStatus(Request $request, Partnership $partnership)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,deal'
        ]);

        $partnership->update(['status' => $request->status]);

        return back()->with('success', 'Status permohonan sekolah berhasil diperbarui!');
    }

    // DELETE: Menghapus data prospek (spam)
    public function destroy(Partnership $partnership)
    {
        $partnership->delete();
        return back()->with('success', 'Data permohonan berhasil dihapus.');
    }
}
