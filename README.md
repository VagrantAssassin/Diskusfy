# Diskusfy

Aplikasi forum sederhana untuk berdiskusi dan berbagi informasi.

## Instalasi

### Prasyarat

*   Laragon
*   PHP 8.2.27
*   Composer

### Langkah-langkah

1.  **Ekstrak Proyek ke Folder Laragon**
    *   Tempatkan file ZIP Diskusfy di dalam folder `www` milik Laragon (biasanya di `C:\laragon\www`).
    *   Ekstrak file ZIP tersebut sehingga terbentuk folder bernama `Diskusfy` di dalam folder `www`.

2.  **Konfigurasi Proyek**
    *   Buka file `.env` yang berada di dalam folder `Diskusfy` lalu sesuaikan konfigurasi database:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    *   Pastikan Anda telah membuat database "nama\_database\_anda" melalui phpMyAdmin atau alat manajemen database lainnya.
    *   Jika belum menginstall dependensi proyek, buka terminal Laragon dan jalankan perintah `composer install`.
    *   Generate application key dengan perintah `php artisan key:generate`.

3.  **Jalankan Migrasi Database**
    *   Buka Terminal atau CMD melalui antarmuka Laragon.
    *   Masuk ke folder proyek dengan perintah `cd Diskusfy`.
    *   Jalankan migrasi database dengan perintah `php artisan migrate:fresh`.
    *   Perintah ini akan menghapus seluruh tabel jika ada dan membuat ulang struktur database sesuai dengan migrasi.

4.  **Menjalankan Aplikasi di Browser**
    *   Melalui Laragon, klik kanan di area kosong antarmuka Laragon, arahkan ke folder `www` lalu pilih folder `Diskusfy`. Laragon akan membuka aplikasi di browser secara otomatis.

## Konfigurasi PHP di Laragon untuk Laravel

### Ekstensi PHP yang Harus Diaktifkan

Pastikan ekstensi PHP berikut diaktifkan agar Laravel berjalan dengan baik:

*   mbstring
*   openssl
*   pdo\_mysql
*   fileinfo
*   bcmath
*   ctype
*   json
*   tokenizer
*   xml
*   zip
*   pdo\_sqlite

### Cara Menyalakan Ekstensi PHP di Laragon

1.  Buka Laragon lalu klik kanan pada area kosong Laragon.
2.  Pilih `PHP` lalu `Extensions`.
3.  Centang ekstensi yang dibutuhkan.

    (Jika cara di atas tidak bisa)

4.  Jika ekstensi tidak ada, buka file `php.ini` dengan cara klik `PHP` lalu `php.ini`. Cari ekstensi yang ingin diaktifkan, misalnya ";extension=mbstring".
5.  Hapus tanda titik koma di depan sehingga menjadi "extension=mbstring".
6.  Simpan file dan tutup.
7.  Restart Laragon agar perubahan diterapkan.

## Menggunakan PHP Versi 8.2.27 di Laragon

1.  **Cek versi PHP yang tersedia**
    *   Buka Laragon lalu `Preferences` lalu `PHP Version`. Pilih `php 8.2.27 nts Win32 vs16 x64`.
    *   Klik `Save and Restart` untuk menerapkan perubahan.

2.  **Verifikasi versi PHP**
    *   Buka terminal Laragon dan jalankan perintah `php -v`.

Dengan mengikuti langkah-langkah di atas, aplikasi Diskusfy seharusnya sudah dapat berjalan di Laragon menggunakan PHP 8.2.27. Jika mengalami kendala, pastikan semua ekstensi PHP sudah diaktifkan dan database telah dikonfigurasi dengan benar.

## Kontak

Jika terjadi masalah saat instalasi, hubungi:

*   +6281324087085
*   radityaramadhan.138@gmail.com

## Link Penting

*   **Github Projek:** <https://github.com/VagrantAssassin/Diskusfy>
*   **Website:** curhatsantai.my.id
