# Skormed - Sistem Informasi UKS

Selamat datang di **Skormed**, sebuah aplikasi berbasis web untuk mempermudah pengelolaan data di UKS (Unit Kesehatan Sekolah). Dibangun menggunakan **Laravel**, aplikasi ini dirancang dengan antarmuka interaktif untuk memudahkan admin dalam mengelola data obat dan pasien.

---

## 🎯 Fitur Utama
1. **Admin Dashboard**  
   - Kelola data obat (CRUD).
   - Kelola data pasien (CRUD).
2. **Manajemen Data yang Mudah**  
   - Tambah, edit, hapus, dan cari data obat dan pasien.
3. **Desain Responsif**  
   - Antarmuka yang ramah di semua perangkat.
4. **Keamanan**  
   - Sistem autentikasi untuk membatasi akses hanya kepada admin.

---

## 🛠️ Teknologi yang Digunakan
- **Framework**: Laravel 10
- **Database**: MySQL
- **Frontend**: Blade, HTML, CSS, JavaScript
- **Dependency Management**: Composer, NPM

---

## 🚀 Instalasi dan Konfigurasi
Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini:

1. **Clone Repository**  
   ```bash
   git clone https://github.com/username/skormed.git
   cd skormed
   ```

2. **Instal Dependency**  
   Jalankan perintah berikut untuk menginstal semua dependency:
   ```bash
   composer install
   npm install
   npm run build
   ```

3. **Konfigurasi File `.env`**  
   Salin file `.env.example` dan sesuaikan:
   ```bash
   cp .env.example .env
   ```

   Edit variabel berikut di file `.env`:
   ```env
   DB_DATABASE=skormed
   DB_USERNAME=root
   DB_PASSWORD=yourpassword
   ```

4. **Generate Key Aplikasi**  
   ```bash
   php artisan key:generate
   ```

5. **Migrasi dan Seeder Database**  
   Jalankan migrasi dan seeder untuk membuat tabel dan data awal:
   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan Server**  
   ```bash
   php artisan serve
   ```

7. **Akses Aplikasi**  
   Buka browser dan akses:  
   [http://localhost:8000](http://localhost:8000)

---

## 📝 Struktur Menu di Dashboard
- **Obat**
  - Tambah Obat
  - Edit Obat
  - Hapus Obat
  - Lihat Daftar Obat
- **Pasien**
  - Tambah Pasien
  - Edit Pasien
  - Hapus Pasien
  - Lihat Daftar Pasien

---

## 💻 Kontribusi
Kami menerima kontribusi! Ikuti langkah berikut:
1. Fork repository ini.
2. Buat branch fitur baru: `git checkout -b fitur/baru`.
3. Commit perubahan: `git commit -m 'Tambah fitur baru'`.
4. Push ke branch: `git push origin fitur/baru`.
5. Buat Pull Request.
