<?php

namespace App\Models\admin\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogcategory extends Model
{
   
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    public function scopeCari($query, $term){
        $term = "%$term%";
        $query->where('nama_kategori','like', $term);
    }
}
