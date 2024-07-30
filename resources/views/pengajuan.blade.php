<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Web Design Mastery | Skormed</title>
    <link rel="icon" href="/dist/img/Carefy/carefy.jpg" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="date"],
        .btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .success-notification {
            display: none;
            padding: 10px;
            margin-top: 20px;
            background-color: #28a745;
            color: #fff;
            border-radius: 4px;
            text-align: center;
            animation: fadeInOut 3s ease-in-out;
            font-family: 'Poppins', sans-serif;
        }
        @keyframes fadeInOut {
            0% { opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { opacity: 0; }
        }
        .custom-select {
            position: relative;
            font-family: 'Poppins', sans-serif;
        }
        .custom-select select {
            display: none; /* Hide original select element */
        }
        .select-selected {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            position: relative;
        }
        .select-selected:after {
            content: "▼";
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
        .select-items div {
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
        }
        .select-items div:hover {
            background-color: #f1f1f1;
        }
        .select-hide {
            display: none;
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
            <li class="link"><a href="#">Pengajuan</a></li>
        </ul>
    </nav>
</header>
<br><br>
<div class="container">
    <h2>Tambah Riwayat Baru</h2>
    <form id="submissionForm" method="POST" action="{{ route('Mengajukan.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kelas">Kelas Siswa</label>
            <input type="text" id="kelas" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" required>
            @error('kelas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="obat_id">Obat (optional)</label>
            <div class="custom-select">
                <div class="select-selected">Pilih Obat</div>
                <div class="select-items select-hide">
                    <div data-value="">Pilih Obat</div>
                    @foreach ($obats as $obat)
                        <div data-value="{{ $obat->id }}">
                            {{ $obat->nama_obat }} (Stok: {{ $obat->stok }})
                        </div>
                    @endforeach
                </div>
                <input type="hidden" id="obat_id" name="obat_id" class="form-control @error('obat_id') is-invalid @enderror">
            </div>
            @error('obat_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div id="successNotification" class="success-notification">Pengajuan telah terkirim!</div>
</div>
<br><br>
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
<script>
    document.getElementById('submissionForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const form = event.target;

        // Assuming the form submission is successful
        const successNotification = document.getElementById('successNotification');
        successNotification.style.display = 'block';

        // Submit the form after showing the notification
        setTimeout(() => {
            form.submit();
        }, 3000); // Wait for the animation to complete before submitting the form
    });

    document.addEventListener('DOMContentLoaded', function() {
        const select = document.querySelector('.custom-select');
        const selected = select.querySelector('.select-selected');
        const items = select.querySelector('.select-items');
        const hiddenInput = select.querySelector('input[type="hidden"]');

        selected.addEventListener('click', function() {
            items.classList.toggle('select-hide');
        });

        items.addEventListener('click', function(e) {
            if (e.target && e.target.tagName === 'DIV') {
                selected.innerHTML = e.target.innerHTML;
                hiddenInput.value = e.target.getAttribute('data-value');
                items.classList.add('select-hide');
            }
        });

        document.addEventListener('click', function(e) {
            if (!select.contains(e.target)) {
                items.classList.add('select-hide');
            }
        });
    });
</script>
</body>
</html>
