<?php

namespace App\Models\admin\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'tahun', 'penyusun', 'penerbit', 'keterangan', 'url'
    ];

    public function category(){
        return $this->belongsToMany(Catalogcategory::class,'catalog_categories_catalogs')->withTimestamps();
    }

    
    public function scopeCari($query, $term){
        $term = "%$term%";
        $query->whereHas('category', function($query) use ($term){
            $query->where('nama_kategori', 'like', $term);
        })->orWhere('nama','like', $term)
        ->orWhere('tahun', 'like', $term)
        ->orWhere('penerbit', 'like', $term)
        ->orWhere('penyusun', 'like', $term);
    }

}
