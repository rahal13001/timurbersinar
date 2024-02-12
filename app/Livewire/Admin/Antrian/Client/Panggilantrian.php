<?php

namespace App\Livewire\Admin\Antrian\Client;

use App\Models\admin\antrian\Client;
use App\Models\admin\antrian\Service;
use Livewire\Component;

class Panggilantrian extends Component
{
    public $queue, $location_id;

    public function mount($location){
        // $this->location_id = $location->id;
        $this->location_id = $location->id;
        
    }

    public function present($present, $client_id)
    {
        $newStatus = $present < 1 ? "Tidak Ada" : "Ada";
        Client::whereKey($client_id)->update(['status' => $newStatus]);
    
        // Manually refresh the data
        $this->queue = Service::with(['clients' => function ($query) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $this->location_id);
        }])->withCount(['clients' => function ($query) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $this->location_id);
        }])->get();
    }

    public function render()
    {
        $locationId = $this->location_id;
        $this->queue = Service::with(['clients' => function ($query) use($locationId) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $locationId);
        }])->withCount(['clients' => function ($query) use($locationId) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $locationId);
        }])->get();
       
        return view('livewire.admin.antrian.client.panggilantrian',[
            "queue" => $this->queue
        ]);
    }
}
