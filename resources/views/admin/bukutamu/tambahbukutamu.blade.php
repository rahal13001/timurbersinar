@extends('admin.layouts.back')
@section('content')

    <div>
        @livewire('admin.bukutamu.tambahbukutamu')
    </div>

 @endsection
 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.4.0/bootstrap-timepicker.min.js"></script>
 <script src="{{ asset('assets/vendor/sweetalert/sweetalert.all.js') }}"></script>
 <script>
 
    window.addEventListener('swal:modal',function (e) {
      Swal.fire(e.detail);
    });
  </script>