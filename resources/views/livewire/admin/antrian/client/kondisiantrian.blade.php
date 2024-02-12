<div class="container" wire:poll>
    
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="row">
      @foreach ($clientperlocations as $perlocation)     
      <div class="col-6 col-lg-3 justify-content-center" wire:key='{{ $perlocation->id }}'>
          <div class="app-card app-card-stat shadow-sm h-100">
            <div class="card-header text-center">
                <h4 class="stats-type mb-1">Lokasi {{ $perlocation->lokasi }}</h4>
            </div>
              <div class="app-card-body p-3 p-lg-4 text-center">
                  
                  <div class="stats-figure"><h2>{{ $perlocation->clients_count }}</h2></div>
                  <di v class="stats-meta text-success">
             
                      @if ($perlocation->clients_count > 0)
                      @auth
                          <a type="button" class="btn btn-success btn-sm my-2" href="{{ route('panggilan_antri', $perlocation->id) }}"
                              {{-- wire:click="locationData('{{ $perlocation->id }}', '{{ $perlocation->lokasi }}')"  --}}
                              wire:loading.attr="disabled" target="_blank">
                             Panggil Antrian
                          </a>

                          <a type="button" class="btn btn-primary btn-sm" href="{{ route('display_video', $perlocation->id) }}"
                            {{-- wire:click="locationData('{{ $perlocation->id }}', '{{ $perlocation->lokasi }}')"  --}}
                            wire:loading.attr="disabled" target="_blank">
                            Display Antrian
                        </a>
                        @endauth
                        @guest
                        <a type="button" class="btn btn-success btn-sm my-2" href="{{ route('lihat_antrian', $perlocation->id) }}"
                            {{-- wire:click="locationData('{{ $perlocation->id }}', '{{ $perlocation->lokasi }}')"  --}}
                            wire:loading.attr="disabled" target="_blank">
                           Lihat Antrian
                        </a>
                        @endguest
                      @endif
                  
                  </di>
              </div>
          </div>
      </div>
    @endforeach
    </div>
</div>
