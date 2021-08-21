<p align="center">
  <h1 align="center">Company App</h1>
  
  <p align="center">
    Website kompani yang dibuat dari laravel 8
    <br />
    <a href="http://company-app.vonso.online">Lihat Demo</a>
    ·
    <a href="https://github.com/vonsogt/company-app/issues">Laporkan Kesalahan</a>
    ·
    <a href="https://github.com/vonsogt/company-app/issues">Ajukan Fitur Baru</a>
  </p>
</p>

## Daftar Isi

* [Tentang Company App](#tentang-company-app)
  * [Dibuat Menggunakan](#dibuat-menggunakan)
* [Demo](#demo)
* [Gambar](#gambar)
* [Fitur](#fitur)
* [Mulai](#mulai)
  * [Prasyarat](#prasyarat)
  * [Instalasi](#instalasi)
* [Petunjuk](#petunjuk)
* [Berkontribusi](#berkontribusi)
* [Lisensi](#lisensi)
* [Kontak](#kontak)

## Tentang company-app

Sebuah webiste yang menggunakan _JSON Web Token_ sebagai autentikasi dan menampilkan data sebuah kompani dan karyawan dapat masuk kedalam website tersebut.

### Dibuat Menggunakan
* [Laravel](https://laravel.com/)

## Demo

Tautan: http://company-app.vonso.online

Akun: yost.gertrude@example.com/password

## Gambar

Frontend:
![image](https://user-images.githubusercontent.com/35516476/130331717-a6bbaacb-d461-4cf0-91f9-729792eda6c1.png)
Backend:
![image](https://user-images.githubusercontent.com/35516476/130331708-b0c723d2-3ca4-4808-bc59-622cbb2b4432.png)

## Fitur

BACKEND
- [x] Autentikasi melalui _JSON Web Token_
- [x] Karyawan dari suatu perusahaan dapat melihat karyawan lainnya pada perusahaan tersebut

FRONTEND
- [x] Menampilkan detail singkat dari kompani tersebut


## Mulai

Sebelum melakukan instalasi proyek `company-app` ada baiknya perhatikan hal-hal berikut ini:

### Prasyarat

Sebelum menggunakan projek ini, diperlukanya:
* [composer](https://getcomposer.org/)
* [php](https://www.php.net/downloads.php)
* [git](https://git-scm.com/)

### Instalasi

1. Unduh/Clone proyek ini
   ```git
   git clone https://github.com/vonsogt/company-app.git
   ```
2. Lalu pindah ke direktori `company-app`
   ```sh
   cd company-app
   ```
3. Install komponen yang diperlukan menggunakan composer
   ```sh
   composer install
   ```
4. Copy file `.env.example` menjadi `.env`
   ```sh
   cp .env.example .env
   ```
5. Lalu generate `APP_KEY`
   ```sh
   php artisan key:generate
   ```
6. Sebelum ke step selanjutnya, pastikan konfigurasi `DB_*` sudah diubah sesuai dengan konfigurasi database anda
7. Lalu lakukan migrasi database
   ```sh
   php artisan migrate
   ```
9. Pastikan `API_URL` pada file `.env` sesuai dengan link API Server yang mengatur _JSON Web Token_
8. Setelah berhasil, jalankan aplikasi
   ```sh
   php artisan serve --port=8001
   ```
9. Lalu buka browser `127.0.0.1:8001` untuk menggunakan aplikasi
10. Enjoy 😊


## Petunjuk

Lihat [open issues](https://github.com/vonsogt/company-app/issues) untuk daftar fitur yang diusulkan (dan masalah yang diketahui).

## Berkontribusi

Kontribusi adalah yang membuat komunitas open source menjadi tempat yang luar biasa untuk belajar, menginspirasi, dan berkreasi. Setiap kontribusi yang Anda berikan ** sangat dihargai **.

## Lisensi

`company-app` berlisensi di bawah [MIT license](https://opensource.org/licenses/MIT).


## Kontak

Vonso - vonsogt18081999@gmail.com
