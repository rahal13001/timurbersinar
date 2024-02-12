<?php

namespace App\Livewire\Forms\antrian\admin\client;

use App\Livewire\Admin\Antrian\Client\Kondisiantrian;
use App\Livewire\Antrian\User\Formantrian;
use App\Models\admin\antrian\Client;
use Carbon\Carbon;
use Livewire\Form;
use Livewire\Attributes\Rule;

class tambah_client extends Form
{

    #[Rule ('required', message:"Nama Wajib Diisi")]
    public $nama;
    #[Rule ('required', message:"Nomor HP Wajib Diisi")]
    public $no_hp;
    #[Rule ('required', message:"Email Wajib Diisi")]
    public $email;
    #[Rule ('required', message:"Lokasi Wajib Dipilih")]
    public $location_id;
    #[Rule ('required', message:"Layanan Wajib Dipilih")]
    public $service_id;

    public function store(){
        $this->validate();
        $today = date("Y-m-d");
        $no_antrian = Client::where('service_id', $this->service_id)->where('location_id', $this->location_id)->whereDate('created_at', $today)->count();
        Client::create([
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'location_id' => $this->location_id,
            'service_id' => $this->service_id,
            'no_antrian' => $no_antrian + 1,
        ]);
    
    }
}
