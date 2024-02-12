@extends('landing.base')
@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Antrian Berhasil Terdaftar</h2>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container">

      <div class="row">

        <div class="col-lg-12 col-md-6 mt-4 mt-md-0">
          <div class="box featured">
            <h3>Layanan SAJI</h3>
            <h5><sup>Yth.<b>{{ $client->nama }}</b> terimakasih telah mengenatri</sup></h5>
            <h5 class="mt-3"><sup>Nomor Antrian Anda</sup></h5>
            <h4>{{ $client->service->kode_layanan }} {{ $client->no_antrian }}</h4>
            <small>Nomor Antrian Anda Juga Telah Dikirimkan Ke Email {{ $client->email }}</small>
            <div class="btn-wrap">
              <a href={{ route('kartuantrian', [$client, $client->nama]) }}" target="_blank" class="btn-buy">Download Kartu</a>
              <a href={{ route('lihat_antrian', $client->location->id) }}" target="_blank" class="btn-buy">Lihat Antrian</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Pricing Section -->

</main><!-- End #main -->
 
@endsection

