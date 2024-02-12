<?php

namespace App\Livewire\Admin\Antrian;

use App\Models\admin\antrian\Location;
use App\Models\Guestbook;
use Livewire\Component;

class Lokasi extends Component
{
    protected $debug = true;
    public $lokasi, $kode_lokasi, $status, $datas;
    
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

    public function submit(){
      $location = new Location();
      $this->validate();
      $location->lokasi = $this->lokasi;
      $location->status = $this->status;
      $location->save();

      $this->reset();
      $this->dispatchBrowserEvent('swal:modal', [
        'icon' => 'success',
        'title' => 'Data Lokasi Berhasil Ditambahkan',
        // 'text' => 'Harap cek data di dashboard',
        'timer' => 5000,
        'timerProgressBar' => true,
    ]);

    }

    public function render()
    {
        $datas = Location::get();
        return view('livewire.admin.antrian.lokasi', compact('datas'));
    }
}
