<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FlashSaleController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('pages.admin.flashsale.index', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.admin.flashsale.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'discount_price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);

        if ($request->discount_price >= $product->price) {
            Alert::error('Gagal!', 'Harga flash sale harus lebih kecil dari harga normal.');
            return redirect()->back();
        }

        $product->update([
            'discount_price' => $request->discount_price,
            'is_flash_sale' => true,
        ]);

        Alert::success('Berhasil!', 'Produk berhasil dimasukkan ke Flash Sale.');
        return redirect()->route('admin.flashsale');
    }

    public function remove($id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'discount_price' => null,
            'is_flash_sale' => false,
        ]);

        Alert::success('Berhasil!', 'Produk berhasil dihapus dari Flash Sale.');
        return redirect()->route('admin.flashsale');
    }
}
