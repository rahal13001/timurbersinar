<?php

namespace App\Http\Livewire\Admin\Catalog;

use App\Models\admin\catalog\Catalog;
use App\Models\admin\catalog\CatalogCategoriesCatalogs;
use App\Models\admin\catalog\Catalogcategory;
use Livewire\Component;

class Addcatalog extends Component
{
    public $nama, $tahun, $penyusun, $penerbit, $url, $keterangan, $category_id;

  
    public function rules(){
        return [
            'nama' => 'required|max:250',
            'tahun' => 'required|min:1900|integer|max:2050',
            'penyusun' => 'required|max:2000',
            'penerbit' => 'required|max:250',
            'url' => 'required|max:1000',
            'category_id' => 'required',
            'keterangan' => 'nullable|max:2000'
        ];
    }

    public function messages(){
        return [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Jumlah karakter maksimal sebanyak 250',
            'tahun.required' => 'Tahun wajib diisi',
            'tahun.max' => 'Tahun terlampau jauh dimasa depan',
            'tahun.min' => 'Tahun terlampau jauh dimasa lalu',
            'penyusun.required' => 'Penyusun wajib diisi',
            'penyusun.max' => 'Karakter maksimal sebanyak 2000',
            'penerbit.required' => 'Penerbit wajib diisi',
            'penerbit.max' => 'Jumlah karakter maksimal sebanyak 250',
            'url.required' => 'URL wajib diisi',
            'url.max' => 'Jumlah karakter maksimal sebanyak 1000',
            'category_id.required' => 'Kategori wajib diisi',
            'keterangan.max' => 'Karakter maksimal sebanyak 2000',
        ];
    }
    
    public function updated($inputcatalog)
    {
        $this->validateOnly($inputcatalog);
    }

    public function submit(){
        $this->validate();
        $catalog = new Catalog();
        $catalog->nama = $this->nama;
        $catalog->tahun = $this->tahun;
        $catalog->penyusun = $this->penyusun;
        $catalog->penerbit = $this->penerbit;
        $catalog->keterangan = $this->keterangan;
        $catalog->url = $this->url;
        $catalog->save();

        $catalogselect = Catalog::find($catalog->id);
        $catalogselect->category()->sync($this->category_id);

        $this->reset();
        $this->emit('updatecatalog');

        session()->flash('message', 'Data Berhasil Ditambah');

        return redirect()->route('catalog_dashboard');

    }

    public function render()
    {
        $categories = Catalogcategory::get();

        return view('livewire.admin.catalog.addcatalog', compact('categories'));
    }

}
