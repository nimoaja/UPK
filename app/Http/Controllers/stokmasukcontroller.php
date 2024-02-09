<?php

namespace App\Http\Controllers;

use App\Models\stokmasuk;
use Illuminate\Http\Request;

class stokmasukcontroller extends Controller
{
    public function stok_masuk()
    {
        $stok = stokmasuk::all();
        return view('stok_masuk', compact('stok'));
    }

    public function stok(Request $request)
    {

        $request->validate([

            'barcode' => 'required|string',
            'tanggal' => 'required|date',
            'namaproduk' => 'required', // Bukan image, saya asumsikan ini field harga beli
            'jumlah' => 'required',
            'keterangan' => 'required', // Bukan image, saya asumsikan ini field tanggal
        ]);
        stokmasuk::create([
            'barcode' => $request->barcode,
            'tanggal' => $request->tanggal,
            'namaproduk' => $request->namaproduk,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan, // Pastikan memberikan nilai untuk 'keteragan'
        ]);



        // Setelah menyimpan data, Anda dapat melakukan redirect atau memberikan respon sesuai kebutuhan
        return redirect()->route('stokmasuk')->with('success', 'Data berhasil diekspor ke database');
    }

    public function updatestok(Request $request, $id)
    {
        $request->validate([
            'barcode' => 'required|string',
            'tanggal' => 'required|date',
            'namaproduk' => 'required|string', // Mengasumsikan 'namaproduk' adalah string
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        // Temukan entitas Penjualan berdasarkan ID
        $stokmasuk = stokmasuk::find($id);

        // Perbarui data penjualan dengan data baru
        $stokmasuk->update([
            'barcode' => $request->barcode,
            'tanggal' => $request->tanggal,
            'keteragan' => $request->keteragan,
            'namaproduk' => $request->namaproduk,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan, // Pastikan memberikan nilai untuk 'keteragan'
        ]);



        // Setelah menyimpan data, Anda dapat melakukan redirect atau memberikan respon sesuai kebutuhan
        return redirect()->route('stokmasuk')->with('success', 'Data stok berhasil diperbarui');
    }


    public function hapusstok($id)
    {
        $stokmasuk = stokmasuk::find($id);

        if (!$stokmasuk) {
            // Jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data penjualan tidak ditemukan');
        }

        $stokmasuk->delete();

        // Redirect ke halaman penjualan dengan pesan sukses
        return redirect()->back()->with('success', 'Data penjualan berhasil dihapus');
    }
}
