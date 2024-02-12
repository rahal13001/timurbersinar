<?php

namespace App\Livewire\Antrian\User;

use App\Models\admin\antrian\Service;
use Livewire\Component;

class Userdisplay extends Component
{
    public $lokasi, $queue;
    public function mount($location){
        $this->lokasi = $location->id;
    }
    public function render()
    {
        $locationId = $this->lokasi;
        $this->queue = Service::with(['clients' => function ($query) use($locationId) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $locationId);
        }])->withCount(['clients' => function ($query) use($locationId) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $locationId);
        }])->get();

      
        return view('livewire.antrian.user.userdisplay', [
            'queue' => $this->queue
        ]);
    }
}
