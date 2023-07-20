<?php

namespace App\Models\admin\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CatalogCategoriesCatalogs extends Pivot
{
    use HasFactory;

    protected $table = 'catalog_categories_catalogs';

    protected $fillable = [
        'catalogcategory_id',
        'catalog_id',
    ];

    public function catalogcategory()
    {
        return $this->belongsTo(Catalogcategory::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
 
}
