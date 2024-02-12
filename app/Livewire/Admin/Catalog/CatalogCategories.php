<?php

namespace App\Livewire\Admin\Catalog;

use App\Models\admin\catalog\Catalogcategory;
use Livewire\Component;

class CatalogCategories extends Component
{
    public $nama_kategori, $submit;

    public function rules(){
    
        return [
            'nama_kategori' => 'required|max:250',       
        ];
       

    }
    public function messages(){
        return  [
            'required' => 'Kolom nama kategori wajib diisi',
            'max' => 'Jumlah maksimal karakter adalah 250'
        ];
    }

    public function updated($inputcategory)
    {
        $this->validateOnly($inputcategory);
    }

    public function submit(){
        $this->validate();

        Catalogcategory::create([
            'nama_kategori' => $this->nama_kategori
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Data Berhasil Ditambah',
            'text' => '',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);
        $this->dispatch('updatecatalogcategory');
    }

    public function render()
    {
        return view('livewire.admin.catalog.catalog-categories');
    }
}
