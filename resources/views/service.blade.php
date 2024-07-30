<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="styless.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Web Design Mastery | HealthCare</title>
    <link rel="icon" href="/dist/img/Carefy/carefy.jpg" type="image/png">
    <style>
         /* Search form styling */
.search-form {
    display: flex;
    align-items: center;
    margin-top: 1rem;
  }
  
  .search-form input {
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
    font-family: 'Poppins', sans-serif;
  }
  
  .search-form .btn-search {
    padding: 0.5rem;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    margin-left: 0.5rem;
  }
  
  .search-form .btn-search i {
    font-size: 1.2rem;
  }
  
    </style>
  </head>
  <body>
    <header>
      <nav class="section__container nav__container">
          <div class="nav__logo">Skormed</div>
          <ul class="nav__links">
              <li class="link"><a href="/">Beranda</a></li>
              <li class="link"><a href="{{ route('Service') }}">Obat</a></li>
              <li class="link"><a href="/Mengajukan">Pengajuan</a></li>
          </ul>
      </nav>
  </header>

    <section class="section__container doctors__container" id="2">
      <div class="doctors__header">
        <div class="doctors__header__content">
          <h2 class="section__header">Informasi Obat Kami</h2>
        </div>
      </div>
      <form action="{{ route('service.index') }}" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Cari Obat..." value="{{ request()->get('search') }}">
        <button type="submit" class="btn-search"><i class="ri-search-line"></i></button>
      </form>
      <div class="doctors__wrapper">
        <div class="doctors__grid" id="doctorsGrid">
          @foreach ($obats as $key => $obat)
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
              <p><a href="{{ route('Landingpage') }}" style="color: inherit;text-decoration: none;">Beranda</a></p>
              <p><a href="{{ route('Service') }}" style="color: inherit;text-decoration: none;">Obat</a></p>
              <p><a href="/Mengajukan" style="color: inherit;text-decoration: none;">Pengajuan</a></p>
          </div>
          <div class="footer__col">
              <h4>Layanan</h4>
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
