<?php

namespace App\Livewire\Admin\Catalog;

use App\Models\admin\catalog\Catalog;
use App\Models\admin\catalog\Catalogcategory;
use Livewire\Component;
use Livewire\WithPagination;

class CatalogDashboard extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['sendnotifTambah' => 'notif'];

    public $paginate = 10;
    public $orderby = "created_at";
    public $asc = "DESC";
    public $checked = [];
    public $cari = "";
    public $mulai = 1900;
    public $akhir = 2100;
    public $selectPage= false;
    public $selectAll=false;
    public $selectedSubkategori = Null;
    public $subkategori = [];
    public $kategori = [];

    public function mulai(){
        $validatedData = $this->validate([
            'mulai' => 'nullable'
        ]);
    }

    public function notif(){
        return $this->dispatchBrowserEvent('swal:modal', [
                'icon' => 'success',
                'title' => 'Tambah Data Berhasil',
                'text' => '',
                'timer' => 5000,
                'timerProgressBar' => true,
        ]);
    }

    public function akhir(){
        $validatedData = $this->validate([
            'akhir' => 'after_or_equal:mulai_',
        ], [
            'after_or_equal' => 'Tanggal Harus Sama Dengan Atau Lebih Dari Tanggal Awal',
            ]);
    }


    public function render()
    {
       
        return view('livewire.admin.catalog.catalog-dashboard',[
            "datas" => $this->datas,
             "year" => Catalog::groupBy('tahun')->select('tahun')->orderBy('tahun', 'DESC')->get(),         
            "categories" => Catalogcategory::all(),
        ]);
    }

    // public function updatedKategori($kategori_id){
 
    //     $this->selectedSubkategori = Catalogcategory::with('subcategories')->whereKey($kategori_id)->get();
        
    // }

    public function updatedSelectPage($value){
        if ($value) {
            $this->checked = $this->datas->pluck('id')->toArray();
        } else {
            $this->checked = [];
        }
        
    }

    public function updatedChecked(){
        $this->selectPage =false;
    }

    
    public function isChecked($data_id)
    {
        return in_array($data_id, $this->checked);
    }

    public function selectAll(){
        $this->selectAll=true;
        $this->checked = $this->datasQuery->pluck('id')->toArray();
    }

    public function selectPart(){
        $this->selectAll=false;
        $this->checked = $this->datas->pluck('id')->toArray();
    }

    public function getDatasProperty(){
        return $this->datasQuery->paginate($this->paginate);
    }

    public function getDatasQueryProperty(){
       return Catalog::with('category')
                        ->when($this->mulai && $this->akhir, function($query){
                            $query->whereBetween('tahun', [trim($this->mulai), trim($this->akhir)]);})
                        ->when($this->kategori, function($query){
                                $query->whereHas('category', function($categoryId){
                                $categoryId->whereIn('catalogcategory_id', $this->kategori);
                            });
                        })
                        ->cari(trim($this->cari))
                        ->orderBy($this->orderby, $this->asc);
    }


    public function deleteDatas(){
        
        $reports = Catalog::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll=false;
        $this->selectPage=false;
        
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Data Berhasil Terhapus',
            'text' => '',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);
    }


    public function deleteSatuData($data_id){
        
        Catalog::where('id', $data_id)->delete();

        $this->checked = array_diff($this->checked, [$data_id]);
        
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Data Berhasil Terhapus',
            'text' => '',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);
    }


}
