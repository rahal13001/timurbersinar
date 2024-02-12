<?php

namespace App\Livewire\Admin\Antrian\Client;

use App\Models\admin\antrian\Client;
use App\Models\admin\antrian\Location;
use App\Models\admin\antrian\Service;
use Livewire\Component;
use Livewire\Attributes\On;

class Kondisiantrian extends Component
{
    public $queue;
    public $selectedLocation;
    public $antrian,$calls;
    public $clientperlocations;
    public $locationId;
    public $locationName;

   
     // #[On('tambahantrian')]
    public function render()
    {     
        $this->clientperlocations = Location::withCount(['clients' => function ($query) {
            $query->whereDate('created_at', today())
                ->where('status', 'Belum Dilayani');
        }])->get();

        return view('livewire.admin.antrian.client.kondisiantrian',[
            "clientperlocations" => $this->clientperlocations,
        ]);
    }
}
