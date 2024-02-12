@extends('landing.base')
@section('content')

<main id="main">
  <div class="mt-5">
      @livewire('antrian.user.formantrian')
  </div>

  <div class="row mt-5">
    <div class="col-md-12">
      <livewire:admin.antrian.client.kondisiantrian />
    </div>
  </div>


</main>
 
  

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<x-livewire-alert::scripts />

<style>
  .custom-btn {
      margin-bottom: 10px;
      margin-right: 10px;
  }

  .card-header.custom-header {
        background-color: #696767; /* Red background color */
        color: #ffffff; /* White text color */
    }
</style>
@endsection

