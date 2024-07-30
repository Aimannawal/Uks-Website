<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Obat</title>
    <link rel="icon" href="/dist/img/Carefy/carefy.jpg" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            line-height: 1.6;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            margin-top: 5px; /* tambahan untuk jarak antar elemen */
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .img-thumbnail {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        .current-photo {
            margin-top: 10px;
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
    <div class="container">
        <h2>Update Obat</h2>
        <form method="POST" action="{{ route('obats.update', $obat->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" id="nama_obat" name="nama_obat" value="{{ $obat->nama_obat }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi_obat">Deskripsi Obat</label>
                <textarea id="deskripsi_obat" name="deskripsi_obat">{{ $obat->deskripsi_obat }}</textarea>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ $obat->stok }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="{{ $obat->tanggal_kadaluarsa }}" required>
            </div>
            <div class="form-group">
                <label for="foto_obat">Foto Obat</label>
                <input type="file" id="foto_obat" name="foto_obat">
                @if ($obat->foto_obat)
                    <div class="current-photo">
                        <p class="mb-1">Current Photo:</p>
                        <img src="{{ asset($obat->foto_obat) }}" class="img-thumbnail" alt="Current Foto Obat">
                    </div>
                @else
                    <p class="current-photo mb-1">No Photo Available</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary back-button">Update</button>
        </form>
    </div>
</body>
</html>
