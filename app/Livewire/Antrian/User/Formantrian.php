<?php

namespace App\Livewire\Antrian\User;

use App\Http\Controllers\admin\antrian\client\ClientController;
use App\Jobs\SendMailJob;
use App\Mail\QueueMail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\admin\antrian\Location;
use App\Models\admin\antrian\Service as ServiceModel;
use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\admin\antrian\Client;
use Illuminate\Support\Facades\Mail;

class Formantrian extends Component
{
    use LivewireAlert;
    


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

    public function submitform(){
        
        $this->validate();
        $today = date("Y-m-d");
        $no_antrian = Client::where('service_id', $this->service_id)->where('location_id', $this->location_id)->whereDate('created_at', $today)->count();
        
        $client = new Client();
        $client->nama = $this->nama;
        $client->no_hp = $this->no_hp;
        $client->email = $this->email;
        $client->location_id = $this->location_id;
        $client->service_id = $this->service_id;
        $client->no_antrian = $no_antrian + 1;
        $client->save();

        $this->alert('success','Tambah Data Berhasil 😍😍😍', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'onConfirmed' => '',
           ]);

           $this->dispatch('tambahantrian');

        //    dispatch(new SendMailJob($client));
        SendMailJob::dispatch($client);
        // Mail::to($client->email)->send(new QueueMail($client));

        return redirect()->route('antrianku', [$client, $client->nama]);
        

    }

    public function render()
    {
        $locations = Location::get();
        $services = ServiceModel::get();
        return view('livewire.antrian.user.formantrian', compact('locations', 'services'));
    }
}
