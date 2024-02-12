<div class="container">
   
    <section>     
        <h4>Detail Buku Tamu LPSPL Sorong</h4>

        <div class="col-md-2">
            <div class="form-check form-switch text-align-right">
                <input class="form-check-input" type="checkbox" role="switch" wire:model.live = 'edit_toggle'>
                <label class="form-check-label" for="edit_toggle"><b>Edit</b></label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group mt-3">
                    <label for="tanggal">Tanggal</label>
                      <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Masukan Nama" value="{{ old('tanggal') }}" wire:model.live = 'tanggal' {{ $edit_toggle != true ? "disabled" : "" }}>
                      @error('tanggal') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
            </div>
            <div class="col">
                <div class="form-group mt-3">
                    <label for="datang">Jam Datang</label>
                    <input type="time" class="form-control @error('datang') is-invalid @enderror" name="datang" id="datang" placeholder="Masukan Jam Pulang" value="{{ old('datang')}}" wire:model.live = 'datang' {{ $edit_toggle != true ? "disabled" : "" }}>
                      @error('datang') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
            </div>
            <div class="col">
                <div class="form-group mt-3">
                    <label for="pulang">Jam Pulang</label>
                    <input type="time" class="form-control @error('pulang') is-invalid @enderror" name="pulang" id="pulang" placeholder="Masukan Jam Pulang" value="{{ old('pulang')}}" wire:model.live = 'pulang' {{ $edit_toggle != true ? "disabled" : "" }}>
                      @error('datang') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
            </div>
        </div>
          <div class="form-group mt-3">
          <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan Nama" value="{{ old('nama') }}" wire:model.live ='nama'{{ $edit_toggle != true ? "disabled" : "" }}>
            @error('nama') <div class="invalid-feedback"> {{ $message }} </div> @enderror
          </div>

          <div class="form-group mt-3">
            <label for="no_hp">No HP</label>
              <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Masukan Nomor HP" value="{{ old('no_hp') }}" wire:model.live = 'no_hp' {{ $edit_toggle != true ? "disabled" : "" }}>
              @error('no_hp') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
  
        <div class="form-group mt-3">
            <label for="instansi">Instansi / Lembaga</label>
              <input type="text" class="form-control @error('instansi') is-invalid @enderror" name="instansi" id="instansi" placeholder="Masukan Asal Instansi" value="{{ old('instansi') }}" wire:model.live = 'instansi' {{ $edit_toggle != true ? "disabled" : "" }}>
              @error('instansi') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
    
            <div class="form-group mt-3">
            <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Alamat Email" value="{{ old('email') }}" wire:model.live = 'email' {{ $edit_toggle != true ? "disabled" : "" }}>
              @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
    
            <div class="form-group mt-3">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-select @error('jk') is-invalid @enderror" aria-label="jk" name="jk" wire:model.live = 'jk' {{ $edit_toggle != true ? "disabled" : "" }}>
                <option selected value="{{ old('jk') }}" >Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
              @error('jk') <div class="invalid-feedback"> {{ $message }} </div> @enderror
    
              <div class="form-group mt-3">
                <label for="lokasi">Satker Tujuan</label>
                <select class="form-select @error('lokasi') is-invalid @enderror" aria-label="lokasi" name="lokasi" wire:model.live = 'lokasi' {{ $edit_toggle != true ? "disabled" : "" }}>
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
                  <input type="text" class="form-control @error('pegawai') is-invalid @enderror" name="pegawai" id="pegawai" placeholder="Masukan Nama Pihak Yang Anda Temui" value="{{ old('pegawai') }}" wire:model.live = 'pegawai' {{ $edit_toggle != true ? "disabled" : "" }}>
                  @error('pegawai') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
              
              <div class="form-group mt-3">
                <label for="keperluan">Keperluan</label>
                  <input type="text" class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan" placeholder="Masukan Keperluan" value="{{ old('keperluan') }}" wire:model.live = 'keperluan' {{ $edit_toggle != true ? "disabled" : "" }}>
                  @error('keperluan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
                <div class="row">
                    @if ($edit_toggle)
                    <div class="col">
                
                            <button type="submit" class="btn btn-primary mt-3" name="btnIn" value="1" wire:click = 'submit'>Edit Data</button>
                        </div>
                        @endif
                
                        <div class="col">
                            <a href="{{ route('dashboard_bukutamu') }}" class="btn btn-danger mt-3">Batal</a>
                        </div>
                    </div>
                

            

      </section>
  </div>
