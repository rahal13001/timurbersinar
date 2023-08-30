 @extends('landing.base')

 
@section('content')

<section id="hero">
  <x-landing.carousel />
</section>

<main id="main">

  <section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-6">
          <h2>Menyongsong Zona Integritas (WBK WBBM)</h2>
          <h4>Mari bersama membangun ekosistem pemerintahan dan pelayanan publik yang sehat demi wujudkan Indonesia bebas dari Korupsi</h4>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Kami bekerja untuk memastikan kelestarian sumberdaya Kelautan dan Perikanan di Indonesia Timur, guna meningkatkan kualitas kerja dan pelayanan kami tersebar di berbagai Lokasi, yaitu : 
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Kantor LPSPL Sorong di Kota Sorong</li>
            <li><i class="ri-check-double-line"></i> Kantor LPSPL Sorong Satuan Kerja Ternate</li>
            <li><i class="ri-check-double-line"></i> Kantor LPSPL Sorong Satuan Kerja Ambon</li>
            <li><i class="ri-check-double-line"></i> Kantor LPSPL Sorong Satuan Kerja Merauke</li>
          </ul>
          <!-- <p class="font-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p> -->
        </div>
      </div>

    </div>
  </section>


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="row content text-center">Tugas & Fungsi</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">Rencana, Program dan Evaluasi</a></h4>
              <p>Penyusunan rencana, program dan evaluasi dibidang perlindungan, pelestarian, dan pemanfaatan sumber  daya pesisir, laut dann pulau-pulau kecil, serta ekosistemnya</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-shield-check"></i>
              <h4><a href="#">Perlindungan Pelestarian dan Pemanfaatan</a></h4>
              <p>Pelaksanaan perlindungan, pelestarian, dan pemanfaatan sumber daya pesisir, laut dan pulau-pulau kecil  serta ekosistemnya</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-signpost-2"></i>
              <h4><a href="#">Mitigasi bencana, rehabilitasi dan penanganan pencemaran</a></h4>
              <p>Pelaksanaan mitigasi bencana, rehabilitasi dan penanganan pencemaran sumber daya pesisir, laut dan  pulau-pulau kecil serta ekosistemnya</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4><a href="#">Konservasi</a></h4>
              <p>Pelaksanaan konservasi habitat, jenis dan genetika ikan</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-eye"></i>
              <h4><a href="#">Jenis Ikan Dilindungi</a></h4>
              <p>Pelaksanaan pengawasan lalu lintas perdagangan jenis ikan yang dilindungi</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-award"></i>
              <h4><a href="#">Pemberdayaan</a></h4>
              <p>Pelaksanaan pemberdayaan masyarakat pesisir dan pulau-pulau kecil</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-geo"></i>
              <h4><a href="#">Tata Ruang Laut</a></h4>
              <p>Fasilitasi penataan ruang pesisir dan laut</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-clipboard-check"></i>
              <h4><a href="#">Pengelolaan</a></h4>
              <p>Pelaksanaan bimbingan pengelolaan  wilayah pesisir terpadu serta </p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-house-door"></i>
              <h4><a href="#">Tata Usaha</a></h4>
              <p>Pelaksanaan urusan tata usaha dan rumah tangga</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->


        <!-- ======= Portfolio Section ======= -->
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter=".filter-card"><h3>Layanan Kami</h3></li>
              <!-- <li data-filter="*" class="filter-active">All</li> -->
              <!-- <li data-filter=".filter-app">App</li> -->
              <!-- <li data-filter=".filter-web">Web</li> -->
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div>
              <a href="https://saji.kkp.go.id/#page-top" target="_blank">
              <img src="{{ asset("assets/img/portofolio/saji2.png") }}" class="img-fluid" alt="">
              </a>
              {{-- <div class="portfolio-info">
                <h4>Saji KKP</h4>
                <p>Layanan Penerbitan Surat Izin Pemanfaatan Jenis Ikan Dilindungi</p>
                <div class="portfolio-links">
                  <a href="{{ asset("assets/img/portofolio/saji.png") }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Sistem Aplikasi Perjalanan Dinas"></a>
                  <a href="https://saji.kkp.go.id/#page-top" target="_blank"><i class="bx bx-link"></i></a>
                </div>
              </div> --}}
            </div>
          </div>  
          <div class="row portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div>
                <a href="https://antrian.timurbersinar.com/" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details">
                <img src="{{ asset("assets/img/portofolio/antrian.png") }}" class="img-fluid" alt="">
                </a>
                {{-- <div class="portfolio-info">
                  <h4>Antrian LPSPL Sorong</h4>
                  <p>Pelayanan optimal tanpa membuang waktu untuk mengantri</p>
                  <div class="portfolio-links">
                    <a href="{{ asset("assets/img/portofolio/antrian.png") }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="LPSPL Sorong Terus Bekerja, Melayani dan Berinovasi"></a>
                    <a href="https://antrian.timurbersinar.com/" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                  </div>
                </div> --}}
              </div>
            </div>  
          </div>

          <div class="row portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div>
                <a href="http://timurbersinar.com/bukutamu" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details">
                <img src="{{ asset("assets/img/portofolio/bukutamu.png") }}" class="img-fluid" alt="">
                </a>
                {{-- <div class="portfolio-info">
                  <h4>Antrian LPSPL Sorong</h4>
                  <p>Pelayanan optimal tanpa membuang waktu untuk mengantri</p>
                  <div class="portfolio-links">
                    <a href="{{ asset("assets/img/portofolio/antrian.png") }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="LPSPL Sorong Terus Bekerja, Melayani dan Berinovasi"></a>
                    <a href="https://antrian.timurbersinar.com/" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                  </div>
                </div> --}}
              </div>
            </div>  
          </div>

          {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <a href="http://timurbersinar.com/bukutamu" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details">
              <img src="{{ asset("assets/img/portofolio/bukutamu.png") }}" class="img-fluid" alt="">
              </a> --}}
              {{-- <div class="portfolio-info">
                <h4>Buku Tamu</h4>
                <p>Kami mencatat kunjungan anda karena anda begitu berkesan bagi kami</p>
                <div class="portfolio-links">
                  <a href="{{ asset("assets/img/portofolio/bukutamu.png") }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"></a>
                  <a href="http://bukutamu.timurbersinar.com/" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div> --}}
            {{-- </div>
          </div> --}}

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div>
              <a href="http://ptsp.kkp.go.id/skm/s/u/88" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details">
              <img src="{{ asset("assets/img/portofolio/skm.png") }}" class="img-fluid" alt="">
              </a>
              {{-- <div class="portfolio-info">
                <h4>Susan</h4>
                <p>Kami selalu mengharapkan penilaian, kritik dan saran anda agar kami mampu meningkatkan kualitas layanan kami</p>
                <div class="portfolio-links">
                  <a href="{{ asset("assets/img/portofolio/skm.png") }}" data-gallery="portfolioGallery" class="portfolio-lightbox"
                  title="Pelayanan Rekomendasi Hiu dan Pari"></a>
                  <a href="http://ptsp.kkp.go.id/skm/s/u/88" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div>
              <a href="https://parkir.timurbersinar.com/" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details">
              <img src="{{ asset("assets/img/portofolio/parkir.png") }}" class="img-fluid" alt="">
             </a>
              {{-- <div class="portfolio-info">
                <h4>Parkir LPSPL Sorong</h4>
                <p>Kami pastikan ada ruang yang pas untuk kendaraan anda</p>
                <div class="portfolio-links">
                  <a href="{{ asset("assets/img/portofolio/parkir.png") }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Sistem Parkir LPSPL Sorong"></a>
                  <a href="https://parkir.timurbersinar.com/" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div> --}}
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div>
              <a href="https://oss.go.id/" target="_blank">
              <img src="{{ asset("assets/img/portofolio/oss.png") }}" class="img-fluid" alt="">
              </a>
              {{-- <div class="portfolio-info">
                <h4>OSS RBA</h4>
                <p>Layanan terpadu untuk segala jenis kebutuhan anda</p>
                <div class="portfolio-links">
                  <a href="{{ asset("assets/img/portofolio/oss.png") }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"></a>
                  <a href="https://oss.go.id/" target="_blank"><i class="bx bx-link"></i></a>
                </div>
              </div> --}}
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Section -->
</main>

@endsection