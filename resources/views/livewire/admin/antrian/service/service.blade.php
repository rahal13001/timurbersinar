<div>

    <h3>Daftar Layanan</h3>
    @if($tambah)
    <div class="row">
  
            <div class="form-group mt-3">
                <label for="nama_layanan">Layanan</label>
                  <input type="nama_layanan" class="form-control @error('nama_layanan') is-invalid @enderror" name="nama_layanan" id="nama_layanan" placeholder="Masukan Nama Layanan" value="{{ old('nama_layanan') }}" wire:model.live = 'nama_layanan'>
                  @error('nama_layanan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="kode_layanan">Kode Layanan</label>
                  <input type="kode_layanan" class="form-control @error('kode_layanan') is-invalid @enderror" name="kode_layanan" id="kode_layanan" placeholder="Masukan Kode Layanan" value="{{ old('kode_layanan') }}" wire:model.live = 'kode_layanan'>
                  @error('kode_layanan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="status_layanan">Status</label>
                <select class="form-select @error('status_layanan') is-invalid @enderror" aria-label="status_layanan" name="status_layanan" wire:model.live = 'status_layanan'>
                    <option selected value="{{ old('status_layanan') }}">Pilih Status Layanan</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tutup">Tutup</option>
                  </select>
                  @error('status_layanan') <div class="invalid-feedback"> {{ $message }} </div> @enderror
            </div>
            <div>
              <button type="submit" class="btn btn-primary mt-3" wire:click = 'submit'>Tambah Data</button>
              <button type="submit" class="btn btn-danger mt-3" wire:click = 'closeData'>Tutup</button>
            </div>


    </div>
    @endif

    <div class="row mb-2 mt-3">
      {{-- Kolom Cari --}}
      <div class="col-md-3 col-sm-3 d-flex">
            <input class="form-control form-control-sm" type="text" placeholder="Cari Data..." wire:model.live.debounce.300ms="cari"> 
      </div>

         {{-- Pagination --}}
        <div class="col-md-1 col-sm-1 d-flex">
            <select wire:model.live="paginate" name="paginate" id="paginate" class="form-control form-control-sm rounded-md shadow-sm">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>

        <div class="col-md-3 col-sm-3 d-flex">
            <select wire:model.live="orderby" name="orderby" id="orderby" class="form-control form-control-sm rounded-md shadow-sm">
                <option selected value="id">Urutan Default</option>
                <option value="nama_layanan">Nama Layanan</option>
                <option value="kode_layanan">Kode Layanan</option>
                <option value="status_layanan">Status Layanan</option>
            </select>
            <select wire:model.live="asc" name="asc" id="asc" class="form-control form-control-sm rounded-md shadow-sm">
              <option value="ASC">Terkecil</option>
              <option value="DESC">Terbesar</option>
            </select>
        </div>

        <div class="col-md-2">
          @if (!$tambah)
          <button type="button" class="btn btn-primary btn-sm" aria-expanded="false" wire:click.live="addData">
            Tambah Layanan
          </button>
          @endif
        </div>

        <div class="col-md-3 col-sm-3 d-flex">
            <div class="d-grid btn-group" role="group">
              @if ($checked)
              <button type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                Aksi ({{count($checked)}})
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" onclick="confirm('Yakin Ingin Menghapus {{ count($checked) }} Data ?')||event.stopImmediatePropagation()" wire:click="deleteDatas()">Delete ({{ count($checked) }})</a></li>           
              </ul>
              @endif
            </div>
          </div>

  </div>

    @if ($selectPage)
      <div class="col-md-10 my-3">
      @if ($selectAll)
      Anda Telah Memilih <strong>Seluruh Data ({{ $datas->total() }} Data)</strong>
      <a href="#" role="button" class="badge bg-success" wire:click="selectPart" style="text-decoration: none">Pilih Yang Ditampilkan Saja</a>
      @else
      Anda Telah Memilih <strong>{{ count($checked) }} Data</strong>, Apakah Anda Ingin Memilih Seluruh Data <strong>({{ $datas->total() }} Data)</strong> ?
      <a href="#" role="button" class="badge bg-primary" wire:click="selectAll" style="text-decoration: none">Pilih Semua</a>
      @endif
      </div>         
    @endif
    

    <div class="table-responsive-lg">
      <table class="table table-hover">
          <thead>
              <tr>     
                <th><input type="checkbox" wire:model.live="selectPage"></th>
                <th class="text-center col-sm-1">No</th>
                <th class="text-center col-sm-3">Nama Layanan</th>
                <th class="text-center col-sm-3">Kode Layanan</th>
                <th class="text-center col-sm-1">Status</th>
                <th class="text-center col-sm-3">Aksi</th>  
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
                <tr class="@if ($this->isChecked($data->id)) table-primary @endif" wire:key = {{ $data->id }}>

                  <td><input type="checkbox" value="{{ $data->id }}" wire:model.live="checked">
                    @if ($editedserviceIndex == $data->id)
                    @endif
                  </td>

                  <td class="text-center">{{ $loop->iteration}}</td>       
                  <td class="text-center col-3">
                    @if ($editedserviceIndex !== $data->id)
                    
                    {{ $data->nama_layanan }}
                    
                    @else
                    <input  type="text" wire:model ="setservices.{{$data->id}}.nama_layanan" class="form-control
                        {{$errors->first('nama_layanan') ? "is-invalid" : "" }}" id="nama_layanan">                                
                        @error('nama_layanan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    @endif
                  </td>

                  <td class="text-center col-3">
                    @if ($editedserviceIndex !== $data->id)
                    
                    {{ $data->kode_layanan }}
                    
                    @else
                    <input  type="text" wire:model ="setservices.{{$data->id}}.kode_layanan" class="form-control
                        {{$errors->first('kode_layanan') ? "is-invalid" : "" }}" id="kode_layanan">                                
                        @error('kode_layanan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    @endif
                  </td>

                  <td class="text-center col-3">
                      @if ($editedserviceIndex !== $data->id)
                      
                      {{ $data->status_layanan }}
                      
                      @else

                      <select class="form-select @error('status_layanan') is-invalid @enderror" aria-label="status_layanan" name="status_layanan" wire:model ="setservices.{{$data->id}}.status_layanan">
                        <option selected value="{{ old('status_layanan') }}">Pilih Status Layanan</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tutup">Tutup</option>
                      </select>
                      @error('status_layanan') <div class="invalid-feedback"> {{ $message }} </div> @enderror

                      @endif
                  </td>
                  <td class="text-center">
                    @if (!$checked)
                    @if ($editedserviceIndex !== $data->id)
                        <a class="btn btn-outline-warning" wire:click.prevent="editservice({{ $data->id }})">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    @else
                        <button class="btn btn-outline-warning" wire:click.prevent="saveservice({{ $data->id }})">
                            <i class="bi bi-sd-card-fill"></i>
                        </button>
                    @endif
                {{-- <a class="btn btn-outline-warning" href=""><i class="bi bi-pencil-fill"></i></i></a> --}}
                    @endif
                    @if (!$checked)
                    <a class="btn btn-outline-danger"
                    onclick="confirm('Apakah Yakin Ingin Menghapus Data Layanan {{ $data->nama_layanan }}  ?')||event.stopImmediatePropagation()"
                    wire:click="deleteSatuData({{$data->id}})" ><i class="bi bi-trash-fill"></i></a>    
                    @endif                
                        
                  </td>
                </tr>
              @endforeach

            </tbody>
           </table>
      </div>


      <div class="row mt-4">
          <div class="col-sm-12">
            {{ count($datas) }} dari {{ $datas->total() }}
          </div>
          <div class="col-sm-12">
            {{ $datas->links() }}
          </div>
        </div>


</div>

