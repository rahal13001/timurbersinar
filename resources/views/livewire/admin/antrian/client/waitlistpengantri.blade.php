<div>
  <div class="row text-center mt-4">
      <h3>Antrian di {{ $location->lokasi}}</h3>
    </div>
    
    <div class="row justify-content-center" wire:poll>
            @foreach ($service as $client)
        
            <div class="col-6 col-lg-3" wire:key='{{ $client->id }}'>
              <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                  <h4 class="stats-type mb-1">Layanan {{ $client->nama_layanan }}</h4>
                  <div class="stats-figure">Pengantri {{ $client->clients_count }}</div>
                </div>
              </div>
              <!--//app-card-->
            </div>

            @endforeach
    </div>
</div>