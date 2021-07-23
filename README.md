## Berikut merupakan panduan untuk instalasi dan penggunaan website

## Yang harus dipersiapkan

- Memiliki CLI/Command Line Interface berupa Command Prompt (CMD) atau Power Shell atau aplikasi text editor seperti Visual Studio Code.
- Memiliki MySQL.
- Memiliki Web Server (misal Laragon atau XAMPP) dengan PHP minimal versi 7.3.
- Composer telah ter-install, cek versi dengan perintah composer -V melalui terminal.
- Dapat menggunakan perintah php -v dengan terminal (menampilkan versi php).
- Memiliki koneksi internet (untuk proses instalasi)

## Langkah pengerjaan

- Download Source Code dari repo Github https://github.com/MeleniaWinda/Choicefashion dalam bentuk Zip.
- Extract file zip (source code) ke dalam direktori root pada Web Server (XAMPP htdocs/nama_projek, Laragon www/nama_projek).
- Jalankan perintan composer install pada CMD,
- Membuat database kosong pada MySQL,
- Duplikat file .env.example, lalu rename menjadi .env.
- Setting koneksi database di file .env.
- Kembali ke CMD, php artisan key:generate.
- Jalankan perintah php artisan migrate:fresh --seed. Jika di cek di MySQL, seharusnya tabel sudah muncul.
- Jalankan perintah php artisan serve pada terminal.
- Buka aplikasi melalui browser (127.0.0.1:8000)
- Klik menu Sign In
- Login menggunakan username admin@app.com dan password 1234.
- Aplikasi siap digunakan.