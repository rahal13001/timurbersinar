<?php

namespace App\Livewire\Admin\Antrian\Lokasi;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

use App\Models\admin\antrian\Location;

class Tambahlokasi extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $lokasi, $status;
    protected $paginationTheme = 'bootstrap';
    public $cari ="";
    public $checked = [];
    public $selectPage= false;
    public $selectAll=false;
    public $paginate = 10;
    public $orderby = "created_at";
    public $asc = "DESC";
    public $editedlocationIndex = Null;
    public $setlocations = [];
    public $tambah = false;
    
    #[On('tambahlokasi')]
    public function updatePostList($location)
    {
        // ...
    }

    public function addData(){
        $this->tambah = true;
    }

    public function closeData(){
        $this->lokasi = "";
        $this->status = "";
        $this->tambah = false;
    }

    public function rules(){
        return [
            'lokasi' => 'required|max:100',
            'status' => 'required|max:100'
        ];
    }

    public function messages(){
        return [
            'lokasi.required' => 'Lokasi wajib diisi',
            'status.required' => 'Status wajib diisi',
        ];
    }

    public function updated($inputlokasi)
    {
        
        $this->validateOnly($inputlokasi);
    }

    public function updatedChecked(){
        $this->selectPage =false;
    }


    public function isChecked($category_id)
    {
        return in_array($category_id, $this->checked);
    }


    public function submit(){
      $location = new Location();
      $this->validate();

      $location->lokasi = $this->lokasi;
      $location->status = $this->status;
      $location->save();

      $this->lokasi = "";
      $this->status = "";

      $this->alert('success','Edit Data Berhasil ! 😁😁😁', [
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
       ]);

    $this->dispatch('tambahlokasi', $location->id)->self();

    }

    public function render()
    {
        
        return view('livewire.admin.antrian.lokasi.tambahlokasi',[
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
       return Location::cari(trim($this->cari))
                ->orderBy($this->orderby, $this->asc);
    }


    public function editlocation($locationIndex){
        $this->editedlocationIndex = $locationIndex;
    }


    public function savelocation($locationIndex){
        $location = $this->setlocations[$locationIndex] ?? NULL;
      
        if (!is_null($location)) {
            $editedlocation = Location::where('id', $this->editedlocationIndex);
            if ($editedlocation) {
                $editedlocation->update($location);
            }

            $this->alert('success','Edit Data Berhasil ! 😁😁😁', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
               ]);
    

        }
        $this->editedlocationIndex = Null;
    }


    public function deleteDatas(){
        
        Location::whereKey($this->checked)->delete();
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


    public function deleteSatuData($location_id){
        
        Location::where('id', $location_id)->delete();

        $this->checked = array_diff($this->checked, [$location_id]);
        
        $this->alert('success','Hapus Data Berhasil ! 😁😁😁', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
           ]);
    }
}
