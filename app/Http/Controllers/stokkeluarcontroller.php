<?php

namespace App\Http\Controllers;

use App\Models\stokkeluar;
use Illuminate\Http\Request;

class stokkeluarcontroller extends Controller
{

    public function stok_keluar()
    {
        $stokkeluar = Stokkeluar::all();
        return view('stok_keluar', compact('stokkeluar'));
    }


    public function stokkeluar(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'barcode' => 'required|string',
            'namaproduk' => 'required|string',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);



        stokkeluar::create([
            'tanggal' => $request->tanggal,
            'barcode' => $request->barcode,
            'namaproduk' => $request->namaproduk,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan, // Pastikan memberikan nilai untuk 'keteragan'
        ]);



        // Setelah menyimpan data, Anda dapat melakukan redirect atau memberikan respon sesuai kebutuhan
        return redirect()->route('stokkeluar')->with('success', 'Data berhasil diekspor ke database');
    }

    public function updatestokkeluar(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'barcode' => 'required|string',
            'namaproduk' => 'required|string',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        $stokkeluar = stokkeluar::find($id);

        if (!$stokkeluar) {
            return redirect()->back()->with('error', 'Data stok tidak ditemukan');
        }

        $stokkeluar->update([
            'tanggal' => $request->input('tanggal'),
            'barcode' => $request->input('barcode'),
            'namaproduk' => $request->input('namaproduk'),
            'jumlah' => $request->input('jumlah'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect()->route('stokkeluar')->with('success', 'Data stok berhasil diperbarui');
    }


    public function hapusstokkeluar($id)
    {
        $stokkeluar = stokkeluar::find($id);

        if (!$stokkeluar) {
            // Jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data penjualan tidak ditemukan');
        }

        $stokkeluar->delete();

        // Redirect ke halaman penjualan dengan pesan sukses
        return redirect()->back()->with('success', 'Data penjualan berhasil dihapus');
    }
}
