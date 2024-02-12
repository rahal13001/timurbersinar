@extends('landing.base')
@section('content')

 <div class="row mt-5">
    <div class="col-md-12">
      <livewire:antrian.user.userdisplay :location="$location" />
    </div>
  </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<x-livewire-alert::scripts />
@endsection

<style>
  .custom-btn {
      margin-bottom: 10px;
      margin-right: 10px;
  }

  .card-header.custom-header {
        background-color: #d9232d; /* Red background color */
        color: #ffffff; /* White text color */
    }
</style>