<?php

namespace App\Livewire\Admin\Antrian\Client;

use App\Models\admin\antrian\Client;
use App\Models\admin\antrian\Location;
use App\Models\admin\antrian\Service;
use Livewire\Component;

class Waitlistpengantri extends Component
{
    public $location, $service, $location_id;

    public function mount($location){
        // $this->location = $location->lokasi;
        $this->location_id = $location->id;
       

    }

    public function render()
    {
        $location_id = $this->location_id;
        $this->service = Service::with(['clients' => function ($query) use ($location_id) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $location_id);
        }])
        ->withCount(['clients' => function ($query) use ($location_id) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani')
                ->where('location_id', $location_id);
        }])
        ->get();
        return view('livewire.admin.antrian.client.waitlistpengantri',[
            'service' => $this->service,
            'location' => $this->location,
        ]);
    }
}
