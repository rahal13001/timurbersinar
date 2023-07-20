@extends('admin.layouts.back')
@section('content')

    <div>
        @livewire('admin.catalog.catalog-dashboard')
    </div>

 @endsection

 <script src="{{ asset('assets/vendor/sweetalert/sweetalert.all.js') }}"></script>
 <script>
 
    window.addEventListener('swal:modal',function (e) {
      Swal.fire(e.detail);
    });
  </script>