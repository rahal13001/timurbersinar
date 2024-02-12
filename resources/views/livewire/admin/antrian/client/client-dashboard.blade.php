<div class="container">
    <div class="my-3">
    <h4 class="mb-3 text-lg font-large leading-6 text-gray-900">Daftar Antrian</h4>
    </div>
    <div class="row mb-2">
        <div class="col-md-3 col-sm-3 d-flex">
            <input class="form-control form-control-sm" type="text" placeholder="Cari What, Where, Penyusun..." wire:model.live.debounce.300ms="cari">
        </div>
       
         {{-- Tanggal --}}
         <div class="col-md-3 col-sm-3 d-flex">
            <input class="form-control form-control-sm" type="date" placeholder="Tanggal Mulai" wire:model.live.debounce.300ms="mulai">
            <input class="form-control form-control-sm" type="date" placeholder="Tanggal Akhir" wire:model.live.debounce.300ms="akhir">
          </div>  
  
          {{-- Urutan --}}
          <div class="col-md-3 col-sm-3 d-flex">
            <select wire:model.live="orderby" name="orderby" id="orderby" class="form-control form-control-sm rounded-md shadow-sm">
                <option selected value="created_at">Tanggal Buat</option>
                <option value="nama">Nama</option>
                <option value="service_id">Layanan</option>
                <option value="location_id">Lokasi</option>
                <option value="no_antrian">Nomor Antrian</option>
            </select>
            <select wire:model.live="asc" name="asc" id="asc" class="form-control form-control-sm rounded-md shadow-sm">
              <option value="ASC">Terkecil</option>
              <option value="DESC">Terbesar</option>
            </select>
        </div>
  
           {{-- Pagination --}}
            <div class="col-md-2 col-sm-2 d-flex">
                <select wire:model.live="paginate" name="paginate" id="paginate" class="form-control form-control-sm rounded-md shadow-sm">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
  
  
    </div>
    <div class="row mb-2 mt-4">
        <div class="col-md-3 col-sm-4" wire:ignore>
          <label for="location">Filter Lokasi</label><br>
          <select name="location" id="location" class="form-control input-rounded select2" multiple>
            <option disabled>Pilih Lokasi</option>
          @foreach ($locations as $location )
             <option value="{{ $location->id }}" wire:key='{{ $location->id }}'>{{ $location->lokasi }}</option>
          @endforeach
          </select> 
          
        </div>
  
        <div class="col-md-3 col-sm-4" wire:ignore>
          <label for="service">Filter Layanan</label><br>
          <select name="service" id="service" class="form-control input-rounded select2" wire:model.live='service' multiple>
            <option disabled>Pilih Layanan</option>
          @foreach ($services as $service )
             <option value="{{ $service->id }}" wire:key='{{ $service->id }}'>{{ $service->nama_layanan }}</option>
          @endforeach
          </select> 
          
        </div>
  
        <div class="col-md-2 col-sm-2 d-flex">
            <div class="d-grid btn-group" role="group">
              @if ($checked)
              <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Aksi ({{count($checked)}})
              </button>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#" onclick="confirm('Yakin Ingin Menghapus {{ count($checked) }} Data ?')||event.stopImmediatePropagation()" wire:click="deleteDatas()">Delete ({{ count($checked) }})</a></li>            
                  <li><a class="dropdown-item" href="#" onclick="confirm('Yakin Ingin Mengeksport {{ count($checked) }} Data ?')||event.stopImmediatePropagation()" wire:click="eksporexcel">Ekspor Excel ({{ count($checked) }})</a></li>            
              </ul>
              @endif
            </div>
          </div>
    </div>
  
    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert"">
          {{ session('message') }}
          <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
   @endif
   <div class="table-responsive-lg">
      <table class="table table-hover">
          <thead>
              <tr>
                <th><input type="checkbox" wire:model.live="selectPage"></th>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Layanan</th>
                <th class="text-center" >No Antrian</th>
                <th class="text-center" >Status</th>
                <th class="text-center">Aksi</th>  
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              
              <tr class="@if ($this->isChecked($data->id)) table-primary @endif" wire:key='{{ $data->id }}'>
                <td><input type="checkbox" value="{{ $data->id }}" wire:model.live="checked"></td>
                <td class="text-center">{{ $loop->iteration}}</td>       
                <td class="text-center">{{ $data->created_at->format('d-m-Y') }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->location->lokasi }}</td>
                <td>{{ $data->service->nama_layanan }}</td>
                <td class="text-center">{{ $data->service->kode_layanan }} {{ $data->no_antrian }}</td>
                <td class="text-center">{{ $data->status }}</td>
                <td class="text-center">
                  <a class="btn btn-outline-primary" href="{{ route('detailpengantri', [$data->id, $data->service->kode_layanan, $data->no_antrian]) }}" ><i class="bi bi-eye-fill"></i></i></a>
                  
                  @if (!$checked)                      
                  <a class="btn btn-outline-danger"
                  onclick="confirm('Apakah Yakin Ingin Menghapus Data Milik {{ $data->nama }} yang berlokasi di {{ $data->location->lokasi }} ?')||event.stopImmediatePropagation()"
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
  @push('select2')
  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('#location').select2();
        $('#location').on('change', function (e) {
            var data = $('#location').val();
            @this.set('location', data);
        });
    });
  
    $(document).ready(function() {
      $('#service').select2();
              $('#service').on('change', function (e) {
                  var data = $('#service').select2("val");
              @this.set('service', data);
              });
    });
  </script>
  @endpush
  