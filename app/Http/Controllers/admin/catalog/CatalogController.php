<?php

namespace App\Http\Controllers\admin\catalog;

use App\Http\Controllers\Controller;
use App\Models\admin\catalog\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    
    public function detail(Catalog $catalog){
        $catalog = Catalog::where('id', $catalog->id)->with('category')->first();
        return view('admin.catalog.catalog_detail', compact('catalog'));
    }

    public function detail_user(Catalog $catalog){
        $catalog = Catalog::where('id', $catalog->id)->with('category')->first();
        return view('user.catalog.catalog_detail', compact('catalog'));
    }
}
