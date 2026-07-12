<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $flashsale = Product::where('is_flash_sale', true)->get();

        return view('pages.user.index', compact('products', 'flashsale'));
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.user.detail', compact('product'));
    }

    public function purchase($productId, $userId)
    {
        if ((int) $userId !== (int) Auth::id()) {
            abort(403);
        }

        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);

        if ($product->stock <= 0) {
            Alert::error('Gagal!', 'Stock produk habis!');
            return redirect()->back();
        }

        $harga = $product->is_flash_sale && $product->discount_price
            ? $product->discount_price
            : $product->price;

        if ($user->point < $harga) {
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();
        }

        DB::transaction(function () use ($user, $product, $harga) {
            $user->update([
                'point' => $user->point - $harga,
            ]);

            $product->update([
                'stock' => $product->stock - 1,
            ]);

            History::create([
                'id_user' => $user->id,
                'id_product' => $product->id,
                'total_harga' => $harga,
            ]);
        });

        Alert::success('Berhasil!', 'Produk berhasil dibeli dan masuk ke history!');

        return redirect()->route('user.dashboard');
    }

    public function history($id)
    {
        if ((int) $id !== (int) Auth::id()) {
            abort(403);
        }

        $data = History::join(
            'products',
            'histories.id_product',
            '=',
            'products.id'
        )
            ->where('histories.id_user', $id)
            ->select(
                'histories.id as history_id',
                'histories.total_harga',
                'histories.created_at as tanggal_pembelian',
                'products.*'
            )
            ->latest('histories.created_at')
            ->get();

        return view('pages.user.history', compact('data'));
    }

    public function detail_history($id)
    {
        $data = History::join(
            'products',
            'histories.id_product',
            '=',
            'products.id'
        )
            ->where('histories.id', $id)
            ->where('histories.id_user', Auth::id())
            ->select(
                'histories.id as history_id',
                'histories.total_harga',
                'histories.created_at as tanggal_pembelian',
                'products.*'
            )
            ->firstOrFail();

        return view('pages.user.detail-history', compact('data'));
    }
}
