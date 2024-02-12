<div>
    <div class="row">
        <div class="col-md-10">
            <h3>Detail Antrian</h3>
            
        </div>
        <div class="col-md-2">
            <div class="form-check form-switch text-align-right">
                <input class="form-check-input" type="checkbox" role="switch" id="edit_toggle" wire:model.live = 'edit_toggle'>
                <label class="form-check-label" for="edit_toggle"><b>Edit</b></label>
            </div>
        </div>
    </div>
    @if ($edit_toggle)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Mode edit aktif, harap perhatikan jarimu kawan 😉 </strong>
      </div>
    @endif
   
 
    <form wire:submit="update">
        <h5>Nomor Antrian : {{ $kode }} {{ $no_antrian }}</h5>
         <div class="form-group mt-3">
             <label for="nama">Nama</label>
             <input type="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan Nama Pengunjung" value="{{ old('nama') }}" wire:model.live = 'nama' {{ $edit_toggle != true ? "disabled" : "" }}>
             @error('nama') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="no_hp">Nomor HP</label>
             <input type="no_hp" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP Pengunjung" value="{{ old('no_hp') }}" wire:model.live = 'no_hp' {{ $edit_toggle != true ? "disabled" : "" }}>
             @error('no_hp') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="email">Email</label>
             <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Nama Pengunjung" value="{{ old('email') }}" wire:model.live = 'email' {{ $edit_toggle != true ? "disabled" : "" }}>
             @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="service_id">Jenis Layanan</label>
             <select class="form-select @error('service_id') is-invalid @enderror" aria-label="service_id" name="service_id" wire:model.live = 'service_id' {{ $edit_toggle != true ? "disabled" : "" }}>
                 @foreach ($services as $service)
                     <option wire:key='{{ $service->id }}' value="{{ $service->id }}" {{ $service->id == $service_id ? "selected" : "" }}>{{ $service->nama_layanan }}</option>
                 @endforeach
               </select>
               @error('service_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="location_id">Lokasi Layanan</label>
             <select class="form-select @error('location_id') is-invalid @enderror" aria-label="location_id" name="location_id" wire:model.live = 'location_id' {{ $edit_toggle != true ? "disabled" : "" }}>
                 @foreach ($locations as $location)
                     <option wire:key='{{ $location->id }}' value="{{ $location->id }}" {{ $location->id == $location_id ? "selected" : "" }}>{{ $location->lokasi }}</option>
                 @endforeach
                 
               </select>
               @error('location_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>

 
         <button type="submit" class="btn btn-primary mt-3">Edit Data</button>
         <a type="button" href="{{ route('dashboard_antrian') }}" class="btn btn-danger mt-3" >Batal</a>
 
    </form>
 </div>
 