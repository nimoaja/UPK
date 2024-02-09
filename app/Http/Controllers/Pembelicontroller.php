<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use Illuminate\Http\Request;

class pembelicontroller extends Controller
{
    public function halaman_pembeli()
    {
        $pembeli = pembeli::all();
        return view('halaman_pembeli', compact('pembeli'));
    }

    public function pembeli(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'namapembeli' => 'required|string',
            'alamat' => 'required',
            'nomortelepon' => 'required',
            'email' => 'required|email',
            // Add other validation rules as needed
        ]);

        // Store the data in the database using the pembeli model
        pembeli::create([
            'namapembeli' => $request->namapembeli,
            'alamat' => $request->alamat,
            'nomortelepon' => $request->nomortelepon,
            'email' => $request->email,
        ]);

        // Optionally, you can redirect back or return a response
        return redirect()->route('halamanpembeli')->with('success', 'Data berhasil diekspor ke database');
    }

    public function updatepembeli(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'namapembeli' => 'required|string',
            'alamat' => 'required',
            'nomortelepon' => 'required',
            'email' => 'required|email',
            // Add other validation rules as needed
        ]);

        $pembeli = pembeli::find($id);

        // Store the data in the database using the pembeli model
        $pembeli->update([
            'namapembeli' => $request->namapembeli,
            'namapembeli' => $request->namapembeli,
            'alamat' => $request->alamat,
            'nomortelepon' => $request->nomortelepon,
            'email' => $request->email,
        ]);

        // Optionally, you can redirect back or return a response
        return redirect()->route('halamanpembeli')->with('success', 'Data berhasil diekspor ke database');
    }

    public function hapuspembeli($id)
    {
        $pembeli = pembeli::find($id);

        if (!$pembeli) {
            // Jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data penjualan tidak ditemukan');
        }

        $pembeli->delete();

        // Redirect ke halaman penjualan dengan pesan sukses
        return redirect()->back()->with('success', 'Data penjualan berhasil dihapus');
    }
}
