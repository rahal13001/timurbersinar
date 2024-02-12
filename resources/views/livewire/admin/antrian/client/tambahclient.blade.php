<div>
   <h3>Form Antrian</h3>

   <form wire:submit="submit">
        <div class="form-group mt-3">
            <label for="form.nama">Nama</label>
            <input type="form.nama" class="form-control @error('form.nama') is-invalid @enderror" name="form.nama" id="nama" placeholder="Masukan Nama Pengunjung" value="{{ old('nama') }}" wire:model.live = 'form.nama'>
            @error('form.nama') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="form-group mt-3">
            <label for="form.no_hp">Nomor HP</label>
            <input type="form.no_hp" class="form-control @error('form.no_hp') is-invalid @enderror" name="form.no_hp" id="no_hp" placeholder="Masukan Nomor HP Pengunjung" value="{{ old('no_hp') }}" wire:model.live = 'form.no_hp'>
            @error('form.no_hp') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="form-group mt-3">
            <label for="form.email">Email</label>
            <input type="form.email" class="form-control @error('form.email') is-invalid @enderror" name="form.email" id="email" placeholder="Masukan Nama Pengunjung" value="{{ old('email') }}" wire:model.live = 'form.email'>
            @error('form.email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="form-group mt-3">
            <label for="form.service_id">Jenis Layanan</label>
            <select class="form-select @error('form.service_id') is-invalid @enderror" aria-label="service_id" name="form.service_id" wire:model.live = 'form.service_id'>
                <option selected value="{{ old('form.service_id') }}">Pilih Layanan</option>
                @foreach ($services as $service)
                    <option wire:key='{{ $service->id }}' value="{{ $service->id }}">{{ $service->nama_layanan }}</option>
                @endforeach
              </select>
              @error('form.service_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <div class="form-group mt-3">
            <label for="form.location_id">Lokasi Layanan</label>
            <select class="form-select @error('form.location_id') is-invalid @enderror" aria-label="location_id" name="form.location_id" wire:model.live = 'form.location_id'>
                <option selected value="{{ old('form.location_id') }}">Lokasi Layanan</option>
                @foreach ($locations as $location)
                    <option wire:key='{{ $location->id }}' value="{{ $location->id }}">{{ $location->lokasi }}</option>
                @endforeach
                
              </select>
              @error('form.location_id') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
        <button type="submit" class="btn btn-danger mt-3">Batal</button>

   </form>
</div>
