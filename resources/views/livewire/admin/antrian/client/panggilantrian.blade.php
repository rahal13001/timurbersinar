<div class="row justify-content-center" wire:poll>
       @foreach ($queue as $service)
      <div class="col-6 col-lg-6" wire:key='{{ $service->id }}'>
        <div class="app-card app-card-stat shadow-sm h-100">
          <div class="app-card-body p-3 p-lg-4">
            <h4 class="stats-type mb-1">Layanan {{ $service->nama_layanan }}</h4>
            <div class="stats-figure">
              @if ($service->clients && $service->clients->count())
                No Antrian {{ $service->kode_layanan }}
                {{ $service->clients->first()->no_antrian }}
              @else
                Belum Ada Antrian
              @endif
            </div>
            @auth    
            @if ($service->clients && $service->clients->count())
            <div class="container mt-3 text-center">
              <textarea id="my_text_{{ $loop->index }}" cols="100" class="form-control">Nomor. Antrian.. {{ $service->kode_layanan }}.. {{ $service->clients->first()->no_antrian }}</textarea>
              <br>
              <button class="btn btn-danger" wire:click="present({{ 0 }}, {{ $service->clients->first()->id }})">Tidak Ada</button>
              <button onclick="play('{{ $loop->index }}');" class="btn btn-outline-primary"><i class="bi bi-play-circle-fill"></i></button>
              <button onclick="stop('{{ $loop->index }}');" class="btn btn-outline-danger"><i class="bi bi-stop-circle-fill"></i></button>
              <button onclick="pause('{{ $loop->index }}');" class="btn btn-outline-dark"><i class="bi bi-pause-circle-fill"></i></button>
              <button onclick="resume('{{ $loop->index }}');" class="btn btn-outline-success"><i class="bi bi-arrow-clockwise"></i></button>
              <button class="btn btn-primary" wire:click="present({{ 1 }}, {{ $service->clients->first()->id }})">Ada</button>
            </div>
            @endif
            @endauth
          </div>
        </div>
      </div>
    @endforeach
  </div>
