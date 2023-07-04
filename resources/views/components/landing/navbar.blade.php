<header id="header" class="fixed-top d-flex align-items-center">
<div class="container d-flex align-items-center">
<div class="container d-flex align-items-center">
    <img src="{{ asset("assets/landing/img/teslogo.jpg") }}" alt="logo loka" width="40px" class="px-2">
    <h1 class="logo me-auto ml-2"><a href="{{ url('/') }}">LPSPL Sorong</a></h1>


    <nav id="navbar" class="navbar">
            <ul>
              {{-- <li><a href="#" class="active"></a></li>
              <li><a href="#" class="active"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href="#"></a></li>
              <li><a href=""></a></li> --}}
      
              <li class="dropdown"><a href="#" ><span>Aplikasi Terpadu</span><i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="https://antrian.timurbersinar.com/" target="_blank">Sistem Antrian</a></li>
                  <li><a href="https://parkir.timurbersinar.com/" target="_blank">Kartu Parkir Elektronik</a></li>
                </ul>
              </li> 
           
              {{-- <li class="dropdown"><a href="#"><span>GIS LPSPL Sorong</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <!-- <li><a href="arcgis.html">Terumbu Karang BHS</a></li>
                  <li><a href="spasiallpsplsorong.html">Data Spasial LPSPL Sorong</a></li> -->
                  <li><a href="infomamalialautterdampar.html">Sebaran Mamalia Laut Terdampar</a></li>
                </ul>
              </li> --}}
              <li class="dropdown"><a href="#"><span>Katalog Jenis Ikan</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="katalog/katalogteripang.html">Katalog Teripang</a></li>
                </ul>
              </li>
      
              <li><a href="{{ url('/') }}" class="getstarted">Laman Utama</a></li>
              <!-- <li><a href="arcgis.html" class="getstarted" target="_blank">Data Sebaran Terumbu Karang BHS</a></li> -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
</div>
    </div>
  </header>
