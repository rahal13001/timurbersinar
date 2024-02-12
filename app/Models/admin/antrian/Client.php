<?php

namespace App\Models\admin\antrian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'no_antrian',
        'service_id',
        'location_id'
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function scopeCari($query, $term){
        $term = "%$term%";
        $query->where('nama','like', $term)
                ->orWhere('email', 'like', $term)
                ->orWhere('no_hp', 'like', $term)
                ->orWhere('no_antrian', 'like', $term)
                ->whereHas('service', function($query) use ($term){
                    $query->where('nama_layanan', 'like', $term);
                })
                ->whereHas('location', function($query) use ($term){
                    $query->where('lokasi', 'like', $term);
                });
    }
}
