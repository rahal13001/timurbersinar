@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<div>
    <div class="container">

        <h5 class="mb-3" >Tambah Publikasi</h5>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="nama"><strong>Judul</strong></label>
                    <input  type="text" wire:model.live = "nama" class="form-control {{$errors->first('nama') ? "is-invalid" : "" }}" id="nama" placeholder="Isikan Judul...." >
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="tahun"><strong>Tahun</strong></label>
                    <input  type="number" wire:model.live = "tahun" class="form-control {{$errors->first('tahun') ? "is-invalid" : "" }}" id="tahun" placeholder="Isikan Tahun (YYYY)" >
                    @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="penyusun"><strong>Nama Penyusun</strong></label>
                    <textarea name="penyusun" wire:model.live = "penyusun" class="form-control {{$errors->first('penyusun') ? "is-invalid" : "" }}" id="penyusun" placeholder="Isikan Nama Penyusun...."></textarea>
            
                    @error('penyusun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="penerbit"><strong>Nama Penerbit</strong></label>
                    <input  type="text" wire:model.live = "penerbit" class="form-control {{$errors->first('penerbit') ? "is-invalid" : "" }}" id="penerbit" placeholder="Isikan Nama Penerbit...." >
                    @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="url"><strong>URL</strong></label>
                    <textarea name="url" wire:model.live = "url" class="form-control {{$errors->first('url') ? "is-invalid" : "" }}" id="url" placeholder="Isikan URL / Tautan Google Drive/One Drive/Dropbox, dll"></textarea>
                    
                    @error('url')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="keterangan"><strong>Keterangan</strong></label>
                    <textarea name="keterangan" wire:model.live = "keterangan" class="form-control {{$errors->first('keterangan') ? "is-invalid" : "" }}" id="keterangan" placeholder="Berikan keterangan (Jika Ada)"></textarea>
                    
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group mt-3" wire:ignore>
                <label for="category_id"><strong>Pilih Kategori</strong></label>
                <select name="category_id" id="category_id" class="form-control input-rounded select2" multiple required>
                    
                   @foreach ($categories as $category )
                      <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                   @endforeach
                   
                   </select>                   
                   @error('category_id')
                   <div class="invalid-feedback">
                       {{ $message }}
                   </div>
                   @enderror                            
              </div>

            <div class="row text-center mt-3">
                <div class="col-md-6">

                    <button class="btn btn-primary" wire:click = "submit" type="submit">Tambah</button>
                </div>
                <div class="col-md-6">

                    <a href="{{ route('catalog_dashboard') }}" class="btn btn-warning" wire:click = "submit" type="submit">Kembali</a>
                </div>
            </div>

    </div>
</div>

@push('select2')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   
   $(document).ready(function() {
     $('#category_id').select2(
        {
        allowClear: true,
        placeholder: 'Pilih Kategori',
        required: true,
        errorText: 'Kategori Wajib di Pilih',
    }
     );
             $('#category_id').on('change', function (e) {
                 var data = $('#category_id').select2("val");
             @this.set('category_id', data);
             });
    });
</script>

@endpush