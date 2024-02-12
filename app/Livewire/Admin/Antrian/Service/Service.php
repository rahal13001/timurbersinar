<?php

namespace App\Livewire\Admin\Antrian\Service;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\admin\antrian\Service as ServiceModel;
use Livewire\Component;

class Service extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $nama_layanan, $kode_layanan, $status_layanan;
    protected $paginationTheme = 'bootstrap';
    public $cari ="";
    public $checked = [];
    public $selectPage= false;
    public $selectAll=false;
    public $paginate = 10;
    public $orderby = "created_at";
    public $asc = "DESC";
    public $editedserviceIndex = Null;
    public $setservices = [];
    public $tambah = false;
    
    #[On('tambahservice')]
    public function updatePostList($service)
    {
        // ...
    }


    public function addData(){
        $this->tambah = true;
    }

    public function closeData(){
        $this->nama_layanan = "";
        $this->status_layanan = "";
        $this->kode_layanan = "";
        $this->tambah = false;
    }

    public function rules(){
        return [
            'nama_layanan' => 'required|max:100',
            'status_layanan' => 'required|max:100',
            'kode_layanan' => 'required|max:100'
        ];
    }

    public function messages(){
        return [
            'lokasi_layanan.required' => 'Lokasi wajib diisi',
            'status_layanan.required' => 'Status wajib diisi',
            'kode_layanan.required' => 'Status wajib diisi',
        ];
    }

    public function updated($inputservice)
    {
        
        $this->validateOnly($inputservice);
    }

    public function updatedChecked(){
        $this->selectPage =false;
    }


    public function isChecked($service_id)
    {
        return in_array($service_id, $this->checked);
    }


    public function submit(){
      $service = new ServiceModel();
      $this->validate();

      $service->nama_layanan = $this->nama_layanan;
      $service->status_layanan = $this->status_layanan;
      $service->kode_layanan = $this->kode_layanan;
      $service->save();

      $this->nama_layanan = "";
      $this->status_layanan = "";
      $this->kode_layanan = "";

      $this->alert('success','Tambah Data Berhasil 😎', [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
        'showConfirmButton' => true,
       ]);

    $this->dispatch('tambahservice', $service->id)->self();

    }

    public function render()
    {
        
        return view('livewire.admin.antrian.service.service',[
            "datas"=>$this->datas
        ]);
    }

    public function selectAll(){
        $this->selectAll=true;
        $this->checked = $this->datasQuery->pluck('id')->toArray();
    }

    public function selectPart(){
        $this->selectAll=false;
        $this->checked = $this->datas->pluck('id')->toArray();
    }

    public function updatedSelectPage($value){
        if ($value) {
            $this->checked = $this->datas->pluck('id')->toArray();
        } else {
            $this->checked = [];
        }
        
    }

    public function getdatasProperty(){
        return $this->datasQuery->paginate($this->paginate);
    }

    public function getdatasQueryProperty(){
       return ServiceModel::cari(trim($this->cari))
                ->orderBy($this->orderby, $this->asc);
    }


    public function editservice($serviceIndex){
        $this->editedserviceIndex = $serviceIndex;
    }


    public function saveservice($serviceIndex){
        $service = $this->setservices[$serviceIndex] ?? NULL;
      
        if (!is_null($service)) {
            $service = ServiceModel::where('id', $this->editedserviceIndex);
            if ($service) {
                $service->update($service);
            }

            $this->alert('success','Edit Data Berhasil ! 😁😁😁', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
                'showConfirmButton' => true,
               ]);
    

        }
        $this->editedserviceIndex = Null;
    }


    public function deleteDatas(){
        
        ServiceModel::whereKey($this->checked)->delete();
        $this->checked = [];
        $this->selectAll=false;
        $this->selectPage=false;
        
        $this->alert('success','Hapus Data Berhasil ! 😊😊😊', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
           ]);
    }


    public function deleteSatuData($service_id){
        
        ServiceModel::where('id', $service_id)->delete();

        $this->checked = array_diff($this->checked, [$service_id]);
        
        $this->alert('success','Hapus Data Berhasil ! 😊😊😊', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
           ]);
    }
}
