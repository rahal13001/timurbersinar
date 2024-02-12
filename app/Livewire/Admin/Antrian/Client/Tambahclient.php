<?php

namespace App\Livewire\Admin\Antrian\Client;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Livewire\Forms\antrian\admin\client\tambah_client;
use App\Models\admin\antrian\Location;
use App\Models\admin\antrian\Service as ServiceModel;
use Livewire\Component;

class Tambahclient extends Component
{
    use LivewireAlert;

    public tambah_client $form;

    public function submit(){
        $this->form->store();

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

    }

    public function render()
    {
        $locations = Location::get();
        $services = ServiceModel::get();
        return view('livewire.admin.antrian.client.tambahclient', compact('locations', 'services'));
    }
}
