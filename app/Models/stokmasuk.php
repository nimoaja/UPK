<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokmasuk extends Model
{
    // use HasFactory;
    protected $table = 'stokmasuk';

    protected $fillable = [
        'barcode',
        'tanggal',
        'namaproduk',
        'jumlah',
        'keterangan', // Tambahkan kolom keteragan jika diperlukan
    ];
}
