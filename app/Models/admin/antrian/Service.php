<?php

namespace App\Models\admin\antrian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable =[
        'nama_layanan',
        'kode_layanan',
        'status_layanan'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function location(){
        return $this->hasManyThrough(Location::class, Client::class);
    }

    public function scopeCari($query, $term){
        $term = "%$term%";
        $query->where('nama_layanan','like', $term)
                ->orWhere('kode_layanan', 'like', $term)
                ->orWhere('status_layanan', 'like', $term);
    }
}
