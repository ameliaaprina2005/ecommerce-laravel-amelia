<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Imports\DistributorImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');

        return view('pages.admin.distributor.index', compact('distributor'));
    }

    public function create()
    {
        return view('pages.admin.distributor.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|unique:distributors,email',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua data terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Distributor::create([
            'nama_distributor' => $request->nama_distributor,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ]);

        Alert::success('Berhasil!', 'Distributor berhasil ditambahkan!');

        return redirect()->route('admin.distributor');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);

        return view('pages.admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $distributor = Distributor::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'email' => 'required|email|unique:distributors,email,' . $id,
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua data terisi dengan benar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $distributor->update([
            'nama_distributor' => $request->nama_distributor,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kontak' => $request->kontak,
            'email' => $request->email,
        ]);

        Alert::success('Berhasil!', 'Distributor berhasil diperbarui!');

        return redirect()->route('admin.distributor');
    }

    public function delete($id)
    {
        $distributor = Distributor::findOrFail($id);

        if ($distributor->products()->exists()) {
            Alert::error('Gagal!', 'Distributor masih digunakan oleh produk!');
            return redirect()->back();
        }

        $distributor->delete();

        Alert::success('Berhasil!', 'Distributor berhasil dihapus!');

        return redirect()->back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            $file = $request->file('file');

            Excel::import(new DistributorImport(), $file);

            Alert::success('Berhasil!', 'Data berhasil di-import!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $messages = '';

            foreach ($failures as $failure) {
                $messages .= 'Kesalahan pada baris ' . $failure->row() . ': '
                    . implode(', ', $failure->errors()) . '. ';
            }

            Alert::error('Gagal!', 'Validasi gagal: ' . $messages);
        } catch (\Exception $e) {
            Alert::error(
                'Gagal!',
                'Pastikan format dan isi file sudah benar! Error: ' . $e->getMessage()
            );
        }

        return redirect()->back();
    }

    public function export()
    {
        $distributors = Distributor::all();

        $pdf = Pdf::loadView(
            'pages.admin.distributor.export',
            compact('distributors')
        )->setPaper('a4', 'landscape');

        return $pdf->download('distributor.pdf');
    }
}
