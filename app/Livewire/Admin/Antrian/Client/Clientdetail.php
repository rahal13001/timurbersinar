<?php

namespace App\Livewire\Admin\Antrian\Client;

use App\Models\admin\antrian\Client;
use App\Models\admin\antrian\Location;
use App\Models\admin\antrian\Service;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Clientdetail extends Component
{
    use LivewireAlert;
    public $client, $no_antrian, $kode,  $edit_toggle;

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

    public function mount($client){
        $this->nama = $client->nama;
        $this->location_id = $client->location_id;
        $this->service_id = $client->service_id;
        $this->no_hp = $client->no_hp;
        $this->no_antrian = $client->no_antrian;
        $this->email = $client->email;
        $this->kode = $client->service->kode_layanan;
    }

    public function edit_toggle(){
        return $this->edit_toggle;
    }

    public function update(){
        Client::where('id', $this->client->id)->update([
            "nama" => $this->nama,
            "location_id" => $this->location_id,
            "service_id" => $this->service_id,
            "no_hp" => $this->no_hp,
            "email" => $this->email,
        ]);

        $this->alert('success','Edit Data Berhasil ! 😁😁😁', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
           ]);

        $this->edit_toggle = false;
    }


    public function render()
    {
        return view('livewire.admin.antrian.client.clientdetail',[
            "locations" => Location::get(),
            "services" => Service::get(),
        ]);
    }
}
