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
    <title>Web Design Mastery | Skormed</title>
    <link rel="icon" href="/dist/img/Carefy/carefy.jpg" type="image/png">
  </head>
  <body>
    <header>
      <nav class="section__container nav__container">
        <div class="nav__logo">Skormed</div>
        <ul class="nav__links">
          <li class="link"><a href="#">Beranda</a></li>
          <li class="link"><a href="{{ route("Service") }}">Obat</a></li>
          <li class="link"><a href="/Mengajukan">Pengajuan</a></li>
        </ul>
      </nav>
      <div class="section__container header__container">
        <div class="header__content">
          <h1>Mari budayakan hidup sehat bersama UKS</h1>
          <p>
            Selamat datang di website UKS sekolah kita! Kami sangat senang kamu berkunjung ke sini. Di website ini, kamu akan menemukan berbagai informasi penting tentang kesehatan, mulai dari tips menjaga kebersihan diri, pola makan sehat, hingga pentingnya olahraga. Jangan ragu untuk menjelajahi berbagai menu yang tersedia.
          </p>
                 
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
        <div class="doctors__wrapper">
        <div class="doctors__grid" id="doctorsGrid">
          @foreach ($obats as $key => $obat)
          @if ($obat->stok > 0)
          <div class="doctors__card">
            <a href="{{ route('show', $obat->id) }}">
              <div class="doctors__card__image">
                @if ($obat->foto_obat)
                <img src="{{ asset($obat->foto_obat) }}" class="img-thumbnail" alt="Foto Obat">
                @else
                <p>No Image</p>
                @endif
              </div>
              <h4>{{ $obat->nama_obat }}</h4>
              <p>{{ $obat->deskripsi_obat }}</p>
              <p>Stok : {{ $obat->stok }}</p>
          @endif
          
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>Skormed</h3>
          <p>
            Kami juga menyediakan lingkungan yang aman, nyaman, dan ramah anak di mana siswa Anda dapat merasa tenang dan nyaman saat menerima perawatan.
          </p>
          <p>
            Klinik kami dilengkapi dengan teknologi medis terbaru dan staf kami dilatih secara menyeluruh untuk memberikan layanan kesehatan berkualitas tinggi dengan penuh empati dan perhatian.
          </p>
        </div>
        <div class="footer__col">
          <h4>Navigasi</h4>
          <p><a href="{{ route("Landingpage") }}" style="color: inherit;text-decoration: none;">Beranda</a></p>
          <p><a href="{{ route("Service") }}" style="color: inherit;text-decoration: none;">Obat</a></p>
          <p><a href="/Mengajukan" style="color: inherit;text-decoration: none;">Pengajuan</a></p>
        </div>
        <div class="footer__col">
          <h4>layanan</h4>
          <p>Search Terms</p>
          <p>Advance Search</p>
          <p>Privacy Policy</p>
          <p>Suppliers</p>
          <p>Our Stores</p>
        </div>
        <div class="footer__col">
          <h4>Contact Us</h4>
          <p>
            <i class="ri-map-pin-2-fill"></i> SMK TELKOM SIDOARJO Jl. Raya Pecantingan, SEKARDANGAN TIMUR, Kec. Sidoarjo, Kab. Sidoarjo Prov. Jawa Timur.
          </p>
          <p><i class="ri-mail-fill"></i> support@care.com</p>
          <p><i class="ri-phone-fill"></i> +62 851-7303-4717 </p>
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
