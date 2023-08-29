<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;

    protected $fillabe = [
        'nama',
        'pegawai',
        'instansi',
        'no_hp',
        'email',
        'jk',
        'keperluan',
        'tanggal',
        'datang',
        'pulang',
        'lokasi'
    ];
    

    public function scopeCari($query, $term){
        $term = "%$term%";
        $query->where('nama','like', $term)
        ->orWhere('tanggal', 'like', $term)
        ->orWhere('datang', 'like', $term)
        ->orWhere('pulang', 'like', $term)
        ->orWhere('keperluan', 'like', $term)
        ->orWhere('lokasi', 'like', $term);
    }

}
