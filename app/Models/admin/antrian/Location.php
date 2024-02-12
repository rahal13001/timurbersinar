<?php

namespace App\Models\admin\antrian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi',
        'status'
    ];

    public function scopeCari($query, $term){
        $term = "%$term%";
        $query->where('lokasi','like', $term)->orWhere('status', 'like', $term);
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'location_id');
    }
}
