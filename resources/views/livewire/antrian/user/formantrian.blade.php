<div class="container">
    <h3>Form Antrian</h3>
 
    <form wire:submit="submitform">
         <div class="form-group mt-3">
             <label for="nama">Nama</label>
             <input type="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan Nama Pengunjung" value="{{ old('nama') }}" wire:model.live = 'nama'>
             @error('nama') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="no_hp">Nomor HP</label>
             <input type="no_hp" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP Pengunjung" value="{{ old('no_hp') }}" wire:model.live = 'no_hp'>
             @error('no_hp') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="email">Email</label>
             <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Nama Pengunjung" value="{{ old('email') }}" wire:model.live = 'email'>
             @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="service_id">Jenis Layanan</label>
             <select class="form-select @error('service_id') is-invalid @enderror" aria-label="service_id" name="service_id" wire:model.live = 'service_id'>
                 <option selected value="{{ old('service_id') }}">Pilih Layanan</option>
                 @foreach ($services as $service)
                     <option wire:key='{{ $service->id }}' value="{{ $service->id }}">{{ $service->nama_layanan }}</option>
                 @endforeach
               </select>
               @error('service_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <div class="form-group mt-3">
             <label for="location_id">Lokasi Layanan</label>
             <select class="form-select @error('location_id') is-invalid @enderror" aria-label="location_id" name="location_id" wire:model.live = 'location_id'>
                 <option selected value="{{ old('location_id') }}">Lokasi Layanan</option>
                 @foreach ($locations as $location)
                     <option wire:key='{{ $location->id }}' value="{{ $location->id }}">{{ $location->lokasi }}</option>
                 @endforeach
                 
               </select>
               @error('location_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
         </div>
 
         <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
         <button type="submit" class="btn btn-danger mt-3">Batal</button>
 
    </form>
 </div>
 