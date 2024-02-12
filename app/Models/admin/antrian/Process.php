<?php

namespace App\Models\admin\antrian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'kelengkapan_berkas',
        'verifikasi_produk',
        'penerbitan_SPP',
        'validasi_pembayaran',
        'penerbitan'
    ];
}
