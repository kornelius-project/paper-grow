<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data tiruan untuk varian bibit (bisa dipindah ke database nanti)
        $seeds = [
            ['name' => 'Tomat Cherry', 'description' => 'Mudah tumbuh dalam 7-14 hari.', 'icon' => '🌱'],
            ['name' => 'Sawi Hijau', 'description' => 'Cocok untuk edukasi anak karena cepat bertunas.', 'icon' => '🥬'],
            ['name' => 'Bunga Matahari', 'description' => 'Menghasilkan bunga cantik yang disukai anak-anak.', 'icon' => '🌻'],
        ];

        return view('welcome', compact('seeds'));
    }
}