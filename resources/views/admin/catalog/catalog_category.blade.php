@extends('admin.layouts.back')
@section('content')

    <div>
        @livewire('admin.catalog.categories-dashboard')
    </div>

    <div class="mt-5">
        @livewire('admin.catalog.catalog-categories')
    </div>


@endsection

<script src="{{ asset('assets/vendor/sweetalert/sweetalert.all.js') }}"></script>
<script>

   window.addEventListener('swal:modal',function (e) {
     Swal.fire(e.detail);
   });
 </script>