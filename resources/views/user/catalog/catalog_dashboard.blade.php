@extends('landing.base')
@section('content')

<main id="main">
    <div class="mt-5">
        @livewire('admin.catalog.catalog-dashboard')
    </div>
</main>
 @endsection

 <script src="{{ asset('assets/vendor/sweetalert/sweetalert.all.js') }}"></script>
 <script>
 
    window.addEventListener('swal:modal',function (e) {
      Swal.fire(e.detail);
    });
  </script>