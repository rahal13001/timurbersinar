@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h5 class="mb-3" >Detail Publikasi</h5>
            </div>
            @auth

            <div class="col-md-2">
                <div class="form-check form-switch text-align-right">
                    <input class="form-check-input" type="checkbox" role="switch" id="edit_toggle" wire:model.live = 'edit_toggle'>
                    <label class="form-check-label" for="edit_toggle"><b>Edit</b></label>
                </div>
            </div>
            @endauth
        </div>

     

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="nama"><strong>Judul</strong></label>
                    <input  type="text" wire:model.live = "nama" class="form-control {{$errors->first('nama') ? "is-invalid" : "" }}" id="nama"
                    placeholder="Isikan Judul...." {{ $edit_toggle != true ? "disabled" : "" }}>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="tahun"><strong>Tahun</strong></label>
                    <input  type="number" wire:model.live = "tahun" class="form-control {{$errors->first('tahun') ? "is-invalid" : "" }}"
                    id="tahun" placeholder="Isikan Tahun (YYYY)" {{ $edit_toggle != true ? "disabled" : "" }}>
                    @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="penyusun"><strong>Nama Penyusun</strong></label>
                    <textarea name="penyusun" wire:model.live = "penyusun" class="form-control {{$errors->first('penyusun') ? "is-invalid" : "" }}"
                        id="penyusun" placeholder="Isikan Nama Penyusun...." {{ $edit_toggle != true ? "disabled" : "" }}></textarea>
            
                    @error('penyusun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-sm-12 mt-3">
                    <label for="penerbit"><strong>Nama Penerbit</strong></label>
                    <input  type="text" wire:model.live = "penerbit" class="form-control {{$errors->first('penerbit') ? "is-invalid" : "" }}" id="penerbit"
                    placeholder="Isikan Nama Penerbit...." {{ $edit_toggle != true ? "disabled" : "" }} >
                    @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                @if ($edit_toggle != true)
                <div class="mt-3">

                    <a href="{{ $url }}" class="btn btn-primary" target="_blank">Lihat Dokumen</a>
                </div>
                                   
                @else
                    <div class="col-sm-12 mt-3">
                        <label for="url"><strong>URL</strong></label>
                        <textarea name="url" wire:model.live = "url" class="form-control {{$errors->first('url') ? "is-invalid" : "" }}" id="url"
                            placeholder="Isikan URL / Tautan Google Drive/One Drive/Dropbox, dll" {{ $edit_toggle != true ? "disabled" : "" }}></textarea>
                        
                        @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
          
                @endif
             

                <div class="col-sm-12 mt-3">
                    <label for="keterangan"><strong>Keterangan</strong></label>
                    <textarea name="keterangan" wire:model.live = "keterangan" class="form-control {{$errors->first('keterangan') ? "is-invalid" : "" }}" id="keterangan"
                        placeholder="Berikan keterangan (Jika Ada)" {{ $edit_toggle != true ? "disabled" : "" }}></textarea>
                    
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group mt-3" wire:ignore>
                <label for="category_id"><strong>Pilih Kategori</strong></label>
                <select name="category_id" id="category_id" class="form-control input-rounded select2" multiple required disabled>
                    
                   @foreach ($categories as $category )
                      <option value="{{ $category->id }}"
                        @foreach ($categoryselected as $terpilih )
                        {{ $category->id == $terpilih->id ? "selected" : "" }}
                        @endforeach
                        >{{ $category->nama_kategori }}</option>
                   @endforeach
                </select>                   
                   @error('category_id')
                   <div class="invalid-feedback">
                       {{ $message }}
                   </div>
                   @enderror                            
              </div>

            <div class="row text-center mt-5">
                @auth
                    @if ($edit_toggle == true)
                   
                    <div class="col-md-6">
                        <button class="btn btn-warning" wire:click = "submit" type="submit">Edit</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('catalog_dashboard') }}" role="button" class="btn btn-danger ml-3">Kembali</a>
                    </div>
                    
                    @else
                    <div class="col-md-12">
                        <a href="{{ route('catalog_dashboard') }}" role="button" class="btn btn-danger ml-3">Kembali</a>
                    </div>
                    @endif
                @endauth
                @guest
                <div class="col-md-12">
                    <a href="{{ route('catalog_user_dashboard') }}" role="button" class="btn btn-danger ml-3">Kembali</a>
                </div>
                @endguest
                
              
            </div>

    </div>
</div>

@push('select2')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    let editToggle = document.getElementById('edit_toggle');
    let select2Input = document.getElementById('category_id');

    editToggle.addEventListener('change', function() {
        if (editToggle.checked) {
            select2Input.removeAttribute('disabled');
        } else {
            select2Input.setAttribute('disabled', true);
        }
    });

    // Disable the select2 input by default
    select2Input.setAttribute('disabled', true);
});

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
