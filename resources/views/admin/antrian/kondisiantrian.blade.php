@extends('admin.layouts.back')
@section('content')

<script src="https://code.responsivevoice.org/responsivevoice.js?key=vsk0yxAy"></script>
{{-- <script src="{{ asset('voice/responsive.js') }}"></script> --}}
 <script type="text/javascript">
  function play(index) {
  var TextSpeak = document.getElementById('my_text_' + index).value;
  responsiveVoice.speak(
    TextSpeak, "Indonesian Female",
    {
      pitch: 1, 
      rate: 1, 
      volume: 1
    }
  );
}

function stop(index) {
  responsiveVoice.cancel();
}

function pause(index) {
  responsiveVoice.pause();
}

function resume(index) {
  responsiveVoice.resume();
}
 </script>

    <div>
      <livewire:admin.antrian.client.kondisiantrian />
    </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <x-livewire-alert::scripts />

 @endsection