<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'productCount' => Product::count(),
            'stockTotal' => (int) Product::sum('stock'),
            'userCount' => User::count(),
            'latestProducts' => Product::latest()->take(5)->get(),
        ]);
    }
}
