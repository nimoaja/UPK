<?php

namespace App\Http\Controllers;

use App\Models\Kategoriproduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function kategori_produks()
    {
        $kategori = Kategoriproduk::all();
        return view('Kategoriproduk', compact('kategori'));
    }

    public function kategore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'kategori' => 'required|string',
            'satuan' => 'required',
            // Add other validation rules as needed
        ]);

        // Store the data in the database using the Kategoriproduk model
        Kategoriproduk::create([
            'kategori' => $request->kategori,
            'satuan' => $request->satuan,
        ]);

        // Optionally, you can redirect back or return a response
        return redirect()->route('kategoriproduk')->with('success', 'Data berhasil diekspor ke database');
    }

    public function updatekategori(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'kategori' => 'required|string',
            'satuan' => 'required',
            // Add other validation rules as needed
        ]);

        $kategori = Kategoriproduk::find($id);

        // Update the data in the database using the Kategoriproduk model
        $kategori->update([
            'kategori' => $request->kategori,
            'satuan' => $request->satuan,
        ]);

        // Optionally, you can redirect back or return a response
        return redirect()->route('kategoriproduk')->with('success', 'Data berhasil diekspor ke database');
    }

    public function kategori($id)
    {
        $kategori = Kategoriproduk::find($id);

        if (!$kategori) {
            // If data not found
            return redirect()->back()->with('error', 'Data kategori produk tidak ditemukan');
        }

        $kategori->delete();

        // Redirect to the category page with success message
        return redirect()->route('kategoriproduk')->with('success', 'Data kategori produk berhasil dihapus');
    }
}
