<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokkeluar extends Model
{
    //use HasFactory;

    protected $table = 'stokkeluar';


    protected $fillable = [
        'tanggal',
        'barcode',
        'namaproduk',
        'jumlah',
        'keterangan', // Tambahkan kolom keteragan jika diperlukan
    ];
}
