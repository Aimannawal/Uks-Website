<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Obat</title>
    <link rel="icon" href="/dist/img/Carefy/carefy.jpg" type="image/png">
    <style>
        /* Mengimpor font Poppins dari Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            line-height: 1.6;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .card {
            max-width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
            text-align: center;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .img-thumbnail {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        .no-image {
            font-style: italic;
            color: #999;
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
    </style>
</head>
<body>
    <div class="card">
        <h5 class="card-title">{{ $obat->nama_obat }}</h5>
        <p class="card-text">Deskripsi: {{ $obat->deskripsi_obat }}</p>
        <p class="card-text">Stok: {{ $obat->stok }}</p>
        <p class="card-text">Tanggal Kadaluarsa: {{ $obat->tanggal_kadaluarsa }}</p>
        @if ($obat->foto_obat)
            <img src="{{ asset($obat->foto_obat) }}" class="img-thumbnail" alt="Foto Obat">
        @else
            <p class="no-image">No Image</p>
        @endif
        <a href="{{ route('Landingpage') }}" class="back-button">Kembali ke Dashboard</a>
    </div>
</body>
</html>
