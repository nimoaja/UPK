<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class penjualanController extends Controller
{
    public function halaman_penjualan()
    {
        $penjualans = Penjualan::all();
        return view('halaman_penjualan', compact('penjualans'));
    }

    public function jual(Request $request)
    {
        $request->validate([
            'namabarang' => 'required|string',
            'merek' => 'required|string',
            'hargabeli' => 'required', // Bukan image, saya asumsikan ini field harga beli
            'hargajual' => 'required',
            'diskon' => 'required',
            'stok' => 'required',
            'tanggal' => 'required|date', // Bukan image, saya asumsikan ini field tanggal
        ]);
        Penjualan::create([
            'namabarang' => $request->namabarang,
            'merek' => $request->merek,
            'hargabeli' => $request->hargabeli,
            'hargajual' => $request->hargajual,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
            'tanggal' => $request->tanggal,
        ]);

        // Setelah menyimpan data, Anda dapat melakukan redirect atau memberikan respon sesuai kebutuhan
        return redirect()->route('halamanpenjualan')->with('success', 'Data berhasil diekspor ke database');
    }

    public function updatePenjualan(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'namabarang' => 'required|string',
            'merek' => 'required|string',
            'hargabeli' => 'required', // Bukan image, saya asumsikan ini field harga beli
            'hargajual' => 'required',
            'diskon' => 'required',
            'stok' => 'required',
            'tanggal' => 'required|date',
        ]);

        // Temukan entitas Penjualan berdasarkan ID
        $penjualan = Penjualan::find($id);

        // Perbarui data penjualan dengan data baru
        $penjualan->update([
            'namabarang' => $request->namabarang,
            'merek' => $request->merek,
            'hargabeli' => $request->hargabeli,
            'hargajual' => $request->hargajual,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
            'tanggal' => $request->tanggal,
        ]);

        // Redirect ke halaman penjualan dengan pesan sukses
        return redirect()->route('halamanpenjualan')->with('success', 'Data penjualan berhasil diperbarui');
    }

    public function hapusPenjualan($id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            // Jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data penjualan tidak ditemukan');
        }

        $penjualan->delete();

        // Redirect ke halaman penjualan dengan pesan sukses
        return redirect()->back()->with('success', 'Data penjualan berhasil dihapus');
    }
}
