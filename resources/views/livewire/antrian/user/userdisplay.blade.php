<div>    
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <b>Antrian Sedang Dipanggil</b>
            </div>
            <div class="d-flex justify-content-center align-items-center" wire:poll>
                @foreach ($queue as $service)
                    <div class="col-md-2 mx-2">
                        <div class="card my-2">
                            <div class="card-header custom-header text-center">
                                <h5>{{ $service->nama_layanan }}</h5>
                            </div>
                            <div class="card-body text-center">
                                <h3>
                                    @if ($service->clients && $service->clients->count())
                                       {{ $service->kode_layanan }} {{ $service->clients->first()->no_antrian }}
                                       
                                    @else
                                       0
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>