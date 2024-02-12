<div>
        <div class="col-md-12">
            @if (!$tambah && $videos->count() < 9)
            <button type="button" class="btn btn-primary" aria-expanded="false" wire:click.live="addData">
                Tambah Video
            </button>
            @endif
            @if($tambah)
            <div class="row">
               <div>
                    <div class="form-group mt-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Masukan Judul Video" value="{{ old('judul') }}" wire:model="judul">
                        @error('judul') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="link">Link</label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="Masukan Link Video" value="{{ old('link') }}" wire:model="link">
                        @error('link') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    
                    @if (!$editVideo)
                        <button type="submit" class="btn btn-primary mt-3" wire:click="submit">Simpan</button>
                    @else
                        <button type="submit" class="btn btn-primary mt-3" wire:click="update">Edit Data</button>
                    @endif
                    <button type="button" class="btn btn-danger mt-3" aria-expanded="false" wire:click.live="closeData">
                        Close
                    </button>
                </div>
            </div>
           
            @endif
        </div>
   
    @if ($view)
        <div class="row mt-5">      
            <div class="col-md-12 my-1">
                <div class="card">
                    <div class="card-header text-center">
                    <b>{{ $judulvideo }}</b> 
                    </div>
                    <div class="card-body text-center">
                       
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! unserialize($video)->html(['width'=>600]) !!}
                        </div>
                       
                        
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-outline-danger" wire:click="closeVideo" >Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="row mt-2">
        <div class="table-responsive-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">
                            No
                        </th>
                        <th class="text-center">
                            Judul
                        </th>
                        <th class="text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $video->judul }}</td>
                            <td class="text-center">
                                <button class="btn btn-warning" wire:click="editvideo('{{ $video->id }}')"> <i class="bi bi-pencil-fill"></i></button>
                                <button class="btn btn-primary" wire:click="showVideo('{{ $video->id }}')"><i class="bi bi-eye-fill"></i></button>
                                <button class="btn btn-danger" wire:click="deleteVideo('{{ $video->id }}')" onclick="confirm('Sumpah mau hapus video yang judulnya {{ $video->judul }} ?')||event.stopImmediatePropagation()"><i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

</div>
