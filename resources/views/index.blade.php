<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Web Design Mastery | HealthCare</title>
  </head>
  <body>
    <header>
      <nav class="section__container nav__container">
        <div class="nav__logo">Health<span>Care</span></div>
        <ul class="nav__links">
          <li class="link"><a href="#">Beranda</a></li>
          <li class="link"><a href="#1">Tentang Kami</a></li>
          <li class="link"><a href="{{ route("Service") }}">Services</a></li>
          <li class="link"><a href="#">Blog</a></li>
        </ul>
      </nav>
      <div class="section__container header__container">
        <div class="header__content">
          <h1>Memberikan Pengalaman Pengobatan Siswa Yang Luar Biasa</h1>
          <p>
            Di SMK Telkom Sidoarjo, kami memahami pentingnya
            kesehatan dan kesejahteraan siswa. Oleh karena itu, 
            kami berkomitmen untuk menyediakan pengalaman pengobatan
            luar biasa bagi semua siswa kami. Tim medis kami yang 
            berpengalaman dan penuh kasih sayang siap membantu siswa 
            Anda mendapatkan perawatan yang mereka butuhkan, kapan pun
            mereka membutuhkannya.
          </p>
          <a href="{{ route("Service") }}"><button class="btn" style="font-family: 'Poppins', sans-serif;">Cari Obat</button></a>
        </div>
      </div>
    </header>
    <section class="section__container about__container" id="1">
      <div class="about__content">
        <h2 class="section__header">Tentang Kami</h2>
        <p>
            Sekolah tak hanya fokus pada pendidikan akademis, 
            tapi juga kesehatan siswa. Usaha Kesehatan Sekolah
            (UKS) menyediakan obat untuk keluhan ringan seperti 
            sakit kepala, demam, atau luka lecet.
        </p>
        <p>
            UKS juga menyediakan layanan kesehatan lain 
            seperti pemeriksaan kesehatan berkala dan konseling.
            Pemeriksaan kesehatan membantu deteksi dini potensi
            masalah kesehatan, sementara konseling dapat membantu 
            siswa mengatasi masalah psikologis dan sosial.
        </p>
        <p>
            Obat dan UKS bekerja sama untuk menciptakan lingkungan
             belajar yang sehat dan nyaman. Siswa yang sehat bisa fokus
              belajar dan meraih prestasi.
        </p>
      </div>
      <div class="about__image">
        <img src="assets/about.jpg" alt="about" />
      </div>
    </section>

    <section class="section__container doctors__container" id="2">
      <div class="doctors__header">
        <div class="doctors__header__content">
          <h2 class="section__header">Informasi Obat Kami</h2>
          <p>
            Ini adalah informasi obat yang dapat membantu anda
            dalam memilih obat yang dibutuhkan.
          </p>
        </div>
        <!-- <div class="doctors__nav">
          <span id="prev"><i class="ri-arrow-left-line"></i></span>
          <span id="next"><i class="ri-arrow-right-line"></i></span>
        </div> -->
      </div>
      @foreach ($obats as $key => $obat)
      <div class="doctors__wrapper">
        <div class="doctors__grid" id="doctorsGrid">
          <!-- Repeat this block for more doctors -->
          <div class="doctors__card">
            <a href="{{ route('show', $obat->id) }}">
            <div class="doctors__card__image">
                @if ($obat->foto_obat)
                <img src="{{ asset($obat->foto_obat) }}" class="img-thumbnail" width="100px" height="auto" alt="Foto Obat">
            @else
                <p>No Image</p>
            @endif
            </div>
            <h4>{{ $obat->nama_obat }}</h4>
            <p class="truncated-text">{{ $obat->deskripsi_obat }}</p>
          </div></a>     
      @endforeach
          <!-- Add more doctor cards here -->
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>Health<span>Care</span></h3>
          <p>
            Kami juga menyediakan lingkungan yang aman, nyaman, dan ramah anak di mana siswa Anda dapat merasa tenang dan nyaman saat menerima perawatan. Klinik kami dilengkapi dengan teknologi medis terbaru dan staf kami dilatih secara menyeluruh untuk memberikan layanan kesehatan berkualitas tinggi dengan penuh empati dan perhatian.
        </p>
        </div>
        <div class="footer__col">
          <h4>aNavigasi</h4>
          <p>Beranda</p>
          <p>Tentang Kami</p>
          <p><a href="{{ route("Service") }}" style="color: inherit;text-decoration: none;">Layanan</a></p>
          <p>Blog</p>
          <p>Terms & Conditions</p>
        </div>
        <div class="footer__col">
          <h4>Contact Us</h4>
          <p>
            <i class="ri-map-pin-2-fill"></i> SMK TELKOM SIDOARJO Jl. Raya Pecantingan, SEKARDANGAN TIMUR, Kec. Sidoarjo, Kab. Sidoarjo Prov. Jawa Timur.
          {{-- <p><i class="ri-mail-fill"></i> support@care.com</p>
          <p><i class="ri-phone-fill"></i> (+012) 3456 789</p> --}}
        </div>
      </div>
      <div class="footer__bar">
        <div class="footer__bar__content">
          <p>Copyright © 2024 Aiman Wafi'i An Nawal. Kelompok 3.</p>
        </div>
      </div>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
