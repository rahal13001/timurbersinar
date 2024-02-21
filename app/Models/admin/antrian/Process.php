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

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function scopeCari($query, $term){
        $term = "%$term%";
        $query->where('nama_proses','like', $term)
                ->orWhere('no_urut', 'like', $term)
                ->whereHas('services', function($query) use ($term){
                    $query->where('nama_layanan', 'like', $term);
                });
    }
}
