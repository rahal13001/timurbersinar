<div class="container">
   
    <section>     
        <h4>Buku Tamu LPSPL Sorong</h4>
        <div class="row">
            <div class="col">
                <div class="form-group mt-3">
                    <label for="tanggal">Tanggal</label>
                      <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Masukan Nama" value="{{ old('tanggal') }}" wire:model = 'tanggal'>
                      @error('tanggal') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
            </div>
            <div class="col">
                <div class="form-group mt-3">
                    <label for="datang">Jam Datang</label>
                    <input type="time" class="form-control" id="datang" name="datang"
                    format="HH:mm:ss" min="00:00:00" max="23:59:59" showSeconds="true" wire:model = 'datang'>
                      @error('datang') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
            </div>
            <div class="col">
                <div class="form-group mt-3">
                    <label for="pulang">Jam Pulang</label>
                    <input type="time" class="form-control" id="pulang" name="pulang"
                    format="HH:mm:ss" min="00:00:00" max="23:59:59" showSeconds="true" wire:model = 'pulang'>
                      @error('datang') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
            </div>
        </div>
          <div class="form-group mt-3">
          <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan Nama" value="{{ old('nama') }}" wire:model = 'nama'>
            @error('nama') <div class="invalid-feedback"> {{ $message }} </div> @enderror
          </div>

          <div class="form-group mt-3">
            <label for="no_hp">No HP</label>
              <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP" value="{{ old('no_hp') }}" wire:model = 'no_hp'>
              @error('no_hp') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
  
        <div class="form-group mt-3">
            <label for="instansi">Instansi / Lembaga</label>
              <input type="text" class="form-control @error('instansi') is-invalid @enderror" name="instansi" id="instansi" placeholder="Masukan Asal Instansi" value="{{ old('instansi') }}" wire:model = 'instansi'>
              @error('instansi') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
    
            <div class="form-group mt-3">
            <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Alamat Email" value="{{ old('email') }}" wire:model = 'email'>
              @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
    
            <div class="form-group mt-3">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-select @error('jk') is-invalid @enderror" aria-label="jk" name="jk" wire:model = 'jk'>
                <option selected value="{{ old('jk') }}" >Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              @error('jk') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    
              <div class="form-group mt-3">
                <label for="lokasi">Satker Tujuan</label>
                <select class="form-select @error('lokasi') is-invalid @enderror" aria-label="lokasi" name="lokasi" wire:model = 'lokasi'>
                    <option selected value="{{ old('lokasi') }}">Pilih Lokasi Satker Tujuan</option>
                    <option value="Sorong">Sorong</option>
                    <option value="Merauke">Merauke</option>
                    <option value="Ambon">Ambon</option>
                    <option value="Ternate">Ternate</option>
                  </select>
                  @error('lokasi') <div class="invalid-feedback"> {{ $message }} </div> @enderror
              </div>
    
              <div class="form-group mt-3">
                <label for="pegawai">Pihak Yang Ditemui</label>
                  <input type="text" class="form-control @error('pegawai') is-invalid @enderror" name="pegawai" id="pegawai" placeholder="Masukan Nama Pihak Yang Anda Temui" value="{{ old('pegawai') }}" wire:model = 'pegawai'>
                  @error('pegawai') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
              
              <div class="form-group mt-3">
                <label for="keperluan">Keperluan</label>
                  <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan" placeholder="Masukan Keperluan" value="{{ old('keperluan') }}" wire:model = 'keperluan'>
                  @error('keperluan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
    
                <button type="submit" class="btn btn-primary mt-3" name="btnIn" value="1" wire:click = 'submit'>Tambah Data</button>

      </section>
  </div>
