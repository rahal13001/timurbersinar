@extends('landing.base')
@section('content')

<div class="main">
  <div class="my-5">
    @livewire('admin.catalog.detail-catalog', ['catalog' => $catalog])
  </div>
</div>
   

@endsection

<script src="{{ asset('assets/vendor/sweetalert/sweetalert.all.js') }}"></script>
<script>

   window.addEventListener('swal:modal',function (e) {
     Swal.fire(e.detail);
   });
 </script>