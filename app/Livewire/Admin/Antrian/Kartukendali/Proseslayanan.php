<?php

namespace App\Livewire\Admin\Antrian\Kartukendali;

use App\Models\admin\antrian\Process;
use App\Models\admin\antrian\Service;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Proseslayanan extends Component
{

    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';

    #[Rule ('required', message:"Nama Proses Wajib Diisi")]
    #[Rule ('max:255', message:"Nama Proses Maksimal 255 Karakter")]
    public $nama_proses;
    #[Rule ('required', message:"Nomor Urut Wajib Diisi")]
    public $no_urut;
    #[Rule ('required', message:"Standar Waktu Wajib Diisi")]
    public $standar;
    #[Rule ('required', message:"Status Wajib Diisi")]
    public $status;
    #[Rule ('required', message:"Layanan Wajib Diisi")]
    public $service_id = [];
    
    public $service = [];
    public $process_id;
    public $paginate = 10;
    public $orderby = "created_at";
    public $asc = "DESC";
    public $selectPage= false;
    public $selectAll=false;
    public $checked = [];
    public $cari = "";

    public function submit(){
        $this->validate();
        $process = New Process();
        $process->nama_proses = $this->nama_proses;
        $process->no_urut = $this->no_urut;
        $process->standar = $this->standar;
        $process->status = $this->status;
        $process->save();
        $process->services()->sync($this->service_id);

        $this->dispatch('tambahproses')->self();
    }
    public function render()
    {

        return view('livewire.admin.antrian.kartukendali.proseslayanan', ([
            'services'=>Service::get(),
            'datas' => $this->datas
        ]));
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

       return Process::with('services')                 
                    ->cari(trim($this->cari))
                    ->when($this->service, function($query){
                        $query->where('service_id', $this->service);
                    })
                    ->orderBy($this->orderby, $this->asc);
    }


    public function deleteDatas(){
        
        $reports = Process::whereKey($this->checked)->delete();
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
  
        
        Process::where('id', $data_id)->delete();

        $this->checked = array_diff($this->checked, [$data_id]);
        
        $this->alert('success','Hapus Data Berhasil ! 😁😁😁', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
           ]);
    }
}
