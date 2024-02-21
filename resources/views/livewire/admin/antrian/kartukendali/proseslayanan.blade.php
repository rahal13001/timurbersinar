<div>
    <form wire:submit='submit'>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="nama_proses"> <strong>Nama</strong></label>
                    <input type="text" class="form-control @error('nama_proses') is-invalid @enderror" name="nama_proses" id="nama_proses" placeholder="Masukan Nama Proses" value="{{ old('nama_proses') }}" wire:model.live = 'nama_proses'>
                    @error('nama_proses') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="form-group mt-3">
                    <label for="no_urut"> <strong>No Urut</strong></label>
                    <input type="number" class="form-control @error('no_urut') is-invalid @enderror" name="no_urut" id="no_urut" placeholder="Masukan Nomor Urut" value="{{ old('no_urut') }}" wire:model.live = 'no_urut'>
                    @error('no_urut') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mt-3">
                    <label for="standar"><strong>Standar Waktu (Menit)</strong></label>
                    <input type="number" class="form-control @error('standar') is-invalid @enderror" name="standar" id="standar" placeholder="Masukan Standar Waktu" value="{{ old('standar') }}" wire:model.live = 'standar'>
                    @error('standar') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group mt-3" wire:ignore>
            <label for="service_id"><strong>Pilih Layanan</strong></label>
            <select name="service_id" id="service_id" class="form-control input-rounded select2" multiple>
               <option disabled>Pilih Layanan</option>
               @foreach ($services as $service )
                  <option value="{{ $service->id }}" wire:key='{{ $service->id }}'>{{ $service->nama_layanan }}</option>
               @endforeach
               
               </select>                   
            @error('service_id')
               <div class="text-danger mt-2 d-block">{{ $message }}</div>
            @enderror                                     
         </div>
        </div>
        <div class="col-md-6">
          <div class="form-group mt-3" wire:ignore>
            <label for="status"><strong>Pilih Status</strong></label>
            <select name="status" id="status" class="form-control input-rounded select2" multiple>
               <option disabled>Pilih Layanan</option>
               <option>Aktif</option>
               <option>Tidak Aktif</option>
               
               </select>                   
            @error('status')
               <div class="text-danger mt-2 d-block">{{ $message }}</div>
            @enderror                                     
         </div>
        </div>

        
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Proses</button>
    </form>
    <div class="row mt-4 mb-3">
      <div class="col-md-3 col-sm-3 d-flex">
          <input class="form-control form-control-sm" type="text" placeholder="Cari Nama, Layanan, No Urut..." wire:model.live.debounce.300ms="cari">
      </div>

        {{-- Urutan --}}
        <div class="col-md-3 col-sm-3 d-flex">
          <select wire:model.live="orderby" name="orderby" id="orderby" class="form-control form-control-sm rounded-md shadow-sm">
              <option selected value="id">Default</option>
              <option value="nama_proses">Nama</option>
              <option value="no_urut">Nomor Antrian</option>
              <option value="standar">Standar Waktu</option>
              <option value="status">Status</option>
              
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
    <div class="table-responsive-lg">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th><input type="checkbox" wire:model.live="selectPage"></th>
                  <th class="text-center">No</th>
                  <th>Nama</th>
                  <th>Layanan</th>
                  <th>Standar</th>
                  <th class="text-center" >Status</th>
                  <th class="text-center">Aksi</th>  
                </tr>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                
                <tr class="@if ($this->isChecked($data->id)) table-primary @endif" wire:key='{{ $data->id }}'>
                  <td><input type="checkbox" value="{{ $data->id }}" wire:model.live="checked"></td>
                  <td class="text-center">{{ $loop->iteration}}</td>       
                  <td>{{ $data->nama_proses }}</td>
                  <td>
                    @foreach ($data->services as $service)

                        {{ $service->nama_layanan }}
                    @endforeach
                   
                  </td>
                  <td>{{ $data->standar }}</td>
                  <td class="text-center">{{ $data->status }}</td>
                  <td class="text-center">
                    @if (!$checked)                      
                    <a class="btn btn-outline-danger"
                    onclick="confirm('Apakah Yakin Ingin Menghapus Data Proses {{ $data->nama_proses }} ?')||event.stopImmediatePropagation()"
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
    $('#service_id').select2();
            $('#service_id').on('change', function (e) {
                var data = $('#service_id').select2("val");
            @this.set('service_id', data);
            });
    });

    $(document).ready(function() {
    $('#status').select2();
            $('#status').on('change', function (e) {
                var data = $('#status').select2("val");
            @this.set('status', data);
            });
    });
</script>
@endpush