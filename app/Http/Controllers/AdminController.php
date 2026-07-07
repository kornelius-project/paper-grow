<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Partnership;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalPartnerships = Partnership::count();
        
        return view('admin.dashboard', compact('totalProducts', 'totalPartnerships'));
    }
}
