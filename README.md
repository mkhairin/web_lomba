# Web Lomba - HIMA TRKJ

Repository untuk pengembangan website lomba HIMA TRKJ.

## Persiapan Database

1. Buat database dengan nama `db_trkj` di phpMyAdmin masing-masing.
2. Pastikan database terkonfigurasi dengan benar sebelum melanjutkan pengembangan.

## Cara Clone Repository ke `htdocs` XAMPP

Berikut adalah langkah-langkah untuk meng-clone repository ini ke dalam folder `htdocs` XAMPP menggunakan GitHub Desktop:

1. **Buka GitHub Desktop:**
   - Pastikan GitHub Desktop sudah terinstall di komputer Anda.

2. **Clone Repository:**
   - Klik `File` > `Clone Repository...`.
   - Di tab `URL`, masukkan URL repository GitHub ini.
   - Pilih lokasi `Local Path` di folder `htdocs` XAMPP Anda. Biasanya terletak di:
     ```
     C:\xampp\htdocs\web_lomba
     ```
   - Klik `Clone` untuk mulai mengunduh repository ke komputer Anda.

3. **Konfigurasi CodeIgniter 4:**
   - Setelah repository berhasil di-clone, buka file `.env` di dalam folder project Anda.
   - Atur konfigurasi database agar sesuai dengan pengaturan lokal Anda, seperti berikut:
     ```
     database.default.hostname = localhost
     database.default.database = db_trkj
     database.default.username = root
     database.default.password =
     database.default.DBDriver = MySQLi
     ```

4. **Jalankan XAMPP:**
   - Pastikan Apache dan MySQL di XAMPP sudah berjalan.
   - Akses website melalui browser dengan URL:
     ```
     http://localhost/web_lomba/public
     ```

## Aturan Kolaborasi

- **Responsif & Proaktif:** Usahakan selalu aktif dan cepat tanggap jika diperlukan, terutama dalam komunikasi antar anggota tim.
- **Komitmen Harian:** Mengerjakan setidaknya satu task per hari adalah minimal, kerjakan lebih banyak jika mampu.
- **Deskripsi Commit yang Jelas:** Selalu tuliskan commit dengan jelas dan deskriptif. Contoh: `Update halaman admin` adalah deskripsi yang baik, hindari menggunakan deskripsi yang tidak relevan seperti `aku cinta dia`.
- **Pull Sebelum Mengerjakan:** Sebelum mulai mengerjakan tugas, selalu lakukan `pull` dari GitHub Desktop untuk memastikan Anda bekerja dengan versi terbaru.
- **Pemberitahuan Sebelum Push:** Sebelum melakukan push ke repository, wajib memberitahu anggota lain melalui grup WhatsApp.
- **Kolaborasi Efektif:** Informasikan kepada anggota lain jika Anda sedang mengedit atau mengerjakan halaman tertentu untuk menghindari konflik.

## Tips Pengembangan

- **Manajemen Konflik:** Selalu berkoordinasi dengan anggota tim jika terdapat potensi konflik pada saat merging.
- **Dokumentasi:** Setiap perubahan signifikan pada kode atau struktur aplikasi harus didokumentasikan di commit atau di README jika perlu.
- **Testing:** Lakukan testing secara berkala pada halaman yang Anda kerjakan untuk memastikan tidak ada bug yang terlewat.
