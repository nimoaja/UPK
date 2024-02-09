<?php

namespace App\Http\Controllers;

use App\Models\Kategoriproduk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategoriproduks()
    {
        $kategori = Kategoriproduk::all();
        // return $kategori;
        return view('kategori.kategori', compact('kategori'));
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        // Store the data in the database using the Kategoriproduk model
        Kategoriproduk::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        // Optionally, you can redirect back or return a response
        return redirect()->route('kategoriproduk')->with('success', 'Data berhasil diekspor ke database');
    }

    public function updatekategori(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        $kategori = Kategoriproduk::find($id);

        // Update the data in the database using the Kategoriproduk model
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        // Optionally, you can redirect back or return a response
        return redirect()->route('kategoriproduk')->with('success', 'Data berhasil diekspor ke database');
    }

    public function deleteKategori($id)
    {
        $kategori = Kategoriproduk::find($id)->delete();

        return redirect()->route('kategoriproduk')->with('success', 'Data berhasil dihapus');
    }
}
