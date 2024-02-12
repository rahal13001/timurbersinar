<?php

namespace App\Livewire\Admin\Catalog;

use App\Models\admin\catalog\Catalog;
use App\Models\admin\catalog\Catalogcategory;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;


class DetailCatalog extends Component
{
    public $listeners = ['refreshNotes' => '$refresh'];

    public $nama, $tahun, $penyusun, $penerbit, $url, $keterangan, $category_id, $catalog, $catalog_id,
            $categoryselected, $edit_toggle;

            
    public function mount($catalog){
    
        $this->catalog_id = $catalog->id;
        $this->nama = $catalog->nama;
        $this->tahun = $catalog->tahun;
        $this->penyusun = $catalog->penyusun;
        $this->penerbit = $catalog->penerbit;
        $this->url = $catalog->url;
        $this->categoryselected = $catalog->category;
        $this->keterangan = $catalog->keterangan;

    }

    public function edit_toggle(){
        return $this->edit_toggle;
    }

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

    public function submit(){

      
        Catalog::whereKey($this->catalog_id)->update([
            'nama' => $this->nama,
            'penyusun' => $this->penyusun,
            'penerbit' => $this->penerbit,
            'tahun' => $this->tahun,
            'url' => $this->url,
            'keterangan' => $this->keterangan
        ]);
        
            if ($this->category_id == NULL) {
                $this->category_id = $this->categoryselected;
            }
            $catalogselect = Catalog::find($this->catalog_id);
            $catalogselect->category()->sync($this->category_id);
    
       
        
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Edit Data Berhasil',
            'text' => '',
            'timer' => 3000,
            'timerProgressBar' => true,
        ]);

        $this->edit_toggle = false;
        // return redirect()->route('catalog_detail', $this->catalog_id);
    }

    

    public function render()
    {
        return view('livewire.admin.catalog.detail-catalog',[
            'categories' => Catalogcategory::get()
        ]);
    }
}
