<?php

namespace App\Livewire\Admin\Bukutamu;

use App\Exports\admin\bukutamu\GuestbooksExport;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Guestbook;
use Maatwebsite\Excel\Facades\Excel;

class Bukutamudashboard extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['sendnotifTambah' => 'notif'];

    public $paginate = 10;
    public $orderby = "created_at";
    public $asc = "DESC";
    public $checked = [];
    public $cari = "";
    public $mulai;
    public $akhir;
    public $selectPage= false;
    public $selectAll=false;
    public $selectedSubkategori = Null;
    public $subkategori = [];
    public $kategori = [];
    public $lokasi;

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
       
        return view('livewire.admin.bukutamu.bukutamudashboard',[
            "datas" => $this->datas,
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
       return Guestbook::when($this->mulai && $this->akhir, function($query){
                            $query->whereBetween('tanggal', [trim($this->mulai), trim($this->akhir)]);})
                        ->when($this->lokasi, function($query){
                            $query->where('lokasi', $this->lokasi);
                        })
                        ->cari(trim($this->cari))
                        ->orderBy($this->orderby, $this->asc);
    }


    public function deleteDatas(){
        
        $reports = Guestbook::whereKey($this->checked)->delete();
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
  
        
        Guestbook::where('id', $data_id)->delete();

        $this->checked = array_diff($this->checked, [$data_id]);
        
        $this->dispatchBrowserEvent('swal:modal', [
            'icon' => 'success',
            'title' => 'Data Berhasil Terhapus',
            'text' => '',
            'timer' => 5000,
            'timerProgressBar' => true,
        ]);
    }

    public function eksporExcel(){
        return Excel::download(new GuestbooksExport($this->checked), 'bukutamu.xlsx');
    }

}

