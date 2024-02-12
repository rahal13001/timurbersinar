<div>
    <div class="container mt-1">     
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="embed-responsive">
                            @if ($display)
                             {!! unserialize($display)->html(['width'=>700]) !!}
                            @endif
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="d-flex flex-wrap justify-content-center mt-2 position-relative">
                                <!-- Loading spinner -->
                                <div class="spinner-border text-primary position-absolute top-50 start-50 translate-middle" wire:loading>
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            
                                <!-- Buttons -->
                                @foreach ($videos as $video)
                                    <button class="custom-btn btn btn-outline-danger mx-2 my-2 {{ $video->id == $id_video ? 'active' : '' }}" wire:key='{{ $video->id }}' wire:click="selectedVideo('{{ $video->id }}')"
                                        wire:loading.attr="disabled" wire:target="selectedVideo('{{ $video->id }}')">
                                        Video {{ $loop->iteration }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4>Antrian di Wilker {{ $lokasi }}</h4>
                            </div>
                            <div class="card-body">
                                <p><b> Tanggal : {{ strftime("%e %B %Y", strtotime($date)) }}</b></p>
                                <div id="clock" style="font-weight: bold;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var timeString = "Jam " + hours + ':' + minutes + ':' + seconds +" WIT";
            document.getElementById('clock').textContent = timeString;
        }
        
        // Update the clock every second
        setInterval(updateClock, 1000);
        
        // Initial update
        updateClock();
        </script>


</div>

