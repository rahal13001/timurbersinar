@extends('admin.layouts.back')
@section('content')

    <div>
      <livewire:admin.antrian.client.clientdetail :client="$client" />

    </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <x-livewire-alert::scripts />

 @endsection