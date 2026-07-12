<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('distributor')->get();

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.admin.product.index', compact('products'));
    }

    public function create()
    {
        $distributor = Distributor::all();

        return view(
            'pages.admin.product.create',
            compact('distributor')
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_distributor' => 'required|exists:distributors,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error(
                'Gagal!',
                'Pastikan semua data terisi dengan benar!'
            );

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' .
            $image->getClientOriginalExtension();

        $image->move(public_path('images'), $imageName);

        $product = Product::create([
            'id_distributor' => $request->id_distributor,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
            'discount_price' => null,
            'is_flash_sale' => false,
        ]);

        if ($product) {
            Alert::success(
                'Berhasil!',
                'Produk berhasil ditambahkan!'
            );

            return redirect()->route('admin.product');
        }

        if (File::exists(public_path('images/' . $imageName))) {
            File::delete(public_path('images/' . $imageName));
        }

        Alert::error('Gagal!', 'Produk gagal ditambahkan!');

        return redirect()->back()->withInput();
    }

    public function detail($id)
    {
        $product = Product::with('distributor')->findOrFail($id);

        return view(
            'pages.admin.product.detail',
            compact('product')
        );
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $distributor = Distributor::all();

        return view(
            'pages.admin.product.edit',
            compact('product', 'distributor')
        );
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_distributor' => 'required|exists:distributors,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            Alert::error(
                'Gagal!',
                'Pastikan semua data terisi dengan benar!'
            );

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::findOrFail($id);
        $imageName = $product->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $newImageName = time() . '_' . uniqid() . '.' .
                $image->getClientOriginalExtension();

            $image->move(public_path('images'), $newImageName);

            $oldPath = public_path('images/' . $product->image);

            if ($product->image && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $imageName = $newImageName;
        }

        $product->update([
            'id_distributor' => $request->id_distributor,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        Alert::success(
            'Berhasil!',
            'Produk berhasil diperbarui!'
        );

        return redirect()->route('admin.product');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $imagePath = public_path('images/' . $product->image);

        if ($product->image && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $product->delete();

        Alert::success(
            'Berhasil!',
            'Produk berhasil dihapus!'
        );

        return redirect()->route('admin.product');
    }
}
