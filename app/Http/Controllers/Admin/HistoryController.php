<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $data = History::join('users', 'histories.id_user', '=', 'users.id')
            ->join('products', 'histories.id_product', '=', 'products.id')
            ->select(
                'histories.id',
                'histories.total_harga',
                'histories.created_at',
                'users.name',
                'products.name as nama_produk'
            )
            ->latest('histories.created_at')
            ->get();

        return view('pages.admin.history.index', compact('data'));
    }

    public function detail($id)
    {
        $data = History::join('users', 'histories.id_user', '=', 'users.id')
            ->join('products', 'histories.id_product', '=', 'products.id')
            ->where('histories.id', $id)
            ->select(
                'histories.id',
                'histories.total_harga',
                'histories.created_at',
                'users.name',
                'users.email',
                'products.name as nama_produk',
                'products.category',
                'products.description',
                'products.image'
            )
            ->firstOrFail();

        return view('pages.admin.history.detail', compact('data'));
    }
}
