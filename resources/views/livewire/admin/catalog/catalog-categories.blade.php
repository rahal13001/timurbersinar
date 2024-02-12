<div>
    <div class="container">

        <h5 class="mb-3" >Tambah Kategori</h5>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input  type="text" wire:model.live = "nama_kategori" class="form-control {{$errors->first('nama_kategori') ? "is-invalid" : "" }}" id="nama_kategori" placeholder="Isikan Nama Kategori...." >
                    @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-primary" wire:click = "submit" type="submit">Tambah</button>
            </div>

    </div>
</div>
