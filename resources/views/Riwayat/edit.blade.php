<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Riwayat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        select,
        .btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Riwayat</h2>
        <form method="POST" action="{{ route('riwayat.update', $riwayat->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" value="{{ $riwayat->nama_siswa }}" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="form-control">{{ $riwayat->keterangan }}</textarea>
            </div>
            <div class="form-group">
                <label for="obat_id">Obat</label>
                <select id="obat_id" name="obat_id" class="form-control">
                    <option value="">Pilih Obat</option>
                    @foreach ($obats as $obat)
                        <option value="{{ $obat->id }}" {{ $riwayat->obat_id == $obat->id ? 'selected' : '' }}>
                            {{ $obat->nama_obat }} (Stok: {{ $obat->stok }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" class="form-control" value="{{ $riwayat->tanggal_kadaluarsa }}" required>
            </div>
            <button type="submit" class="btn btn-primary back-button">Submit</button>
        </form>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>
