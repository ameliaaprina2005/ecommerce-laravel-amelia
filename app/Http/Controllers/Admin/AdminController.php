<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::count();
        $products = Product::count();

        return view('pages.admin.index', compact('users', 'products'));
    }
}
