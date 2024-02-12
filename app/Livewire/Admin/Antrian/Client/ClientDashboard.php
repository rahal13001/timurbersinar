<?php

namespace App\Livewire\Admin\Antrian\Client;

use App\Models\admin\antrian\Client;
use App\Models\admin\antrian\Location;
use App\Models\admin\antrian\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ClientDashboard extends Component
{
    use WithPagination;
    use LivewireAlert;

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
    public $location = [];
    public $service = [];

    public function mulai(){
        $this->validate([
            'mulai' => 'nullable'
        ]);
    }


    public function akhir(){
        $this->validate([
            'akhir' => 'after_or_equal:mulai_',
        ], [
            'after_or_equal' => 'Tanggal Harus Sama Dengan Atau Lebih Dari Tanggal Awal',
            ]);
    }



    public function render()
    {
        return view('livewire.admin.antrian.client.client-dashboard',
        ["datas" => $this->datas,
        "locations" => Location::get(),
        "services" => Service::get(),
        ]
    );
    }

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

       return Client::with('location', 'service')                 
                    ->when($this->mulai && $this->akhir, function($query){
                     $query->whereBetween('created_at', [trim($this->mulai), trim($this->akhir)]);})
                     ->when($this->mulai, function($query){
                        $query->whereDate('created_at', '>=', trim($this->mulai));
                     })
                     ->when($this->akhir, function($query){
                        $query->whereDate('created_at', '<=', trim($this->akhir));
                     })
                    ->cari(trim($this->cari))
                    ->when($this->location, function($query){
                        $query->where('location_id', $this->location);
                    })
                    ->when($this->service, function($query){
                        $query->where('service_id', $this->service);
                    })
                    ->orderBy($this->orderby, $this->asc);
    }


    public function deleteDatas(){
        
        $reports = Client::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll=false;
        $this->selectPage=false;
        
        $this->alert('success','Hapus Data Berhasil ! 😁😁😁', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
           ]);
    }


    public function deleteSatuData($data_id){
  
        
        Client::where('id', $data_id)->delete();

        $this->checked = array_diff($this->checked, [$data_id]);
        
        $this->alert('success','Hapus Data Berhasil ! 😁😁😁', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
           ]);
    }
}

    // public function eksporExcel(){
    //     return Excel::download(new GuestbooksExport($this->checked), 'bukutamu.xlsx');
    // 
