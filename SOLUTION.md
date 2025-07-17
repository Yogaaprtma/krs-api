# krs-api

# Justifikasi Teknologi untuk API KRS

# Ringkasan

API KRS dibangun untuk mengelola registrasi mata kuliah mahasiswa (Kartu Rencana Studi) secara efisien, dengan menyediakan endpoint untuk melihat KRS saat ini, mata kuliah yang tersedia, mendaftar/menghapus mata kuliah, dan memeriksa status KRS. Tumpukan teknologi (technology stack) dipilih untuk memastikan skalabilitas, kemudahan pemeliharaan (maintainability), dan kemudahan pengembangan.

# Tumpukan Teknologi

# Laravel 8.x (PHP Framework)

Justifikasi:

Pengembangan Cepat (Rapid Development): Laravel menyediakan ekosistem yang kuat dengan fitur seperti Eloquent ORM, middleware, dan autentikasi bawaan (Sanctum), yang mempercepat pengembangan API.

Skalabilitas: Struktur modular Laravel dan dukungan untuk dependency injection membuatnya cocok untuk menangani logika bisnis yang kompleks, seperti pengecekan jadwal bentrok dan validasi KRS.

Komunitas dan Ekosistem: Laravel memiliki komunitas yang besar, dokumentasi yang luas, dan paket seperti Sanctum untuk autentikasi berbasis token, yang menyederhanakan pengamanan endpoint API.

Penanganan Error (Error Handling): Penanganan eksepsi (exception) dan format respons Laravel memudahkan pengembalian respons JSON yang konsisten dengan kode status yang sesuai (misalnya, 200, 404, 403).

Penggunaan dalam Proyek: Laravel menangani routing (api.php), controller (KrsController), service (KrsService), dan format resource (KrsResource, CourseResource, KrsStatusResource).

# MySQL (Database)

Justifikasi:

Data Relasional: Sistem KRS melibatkan hubungan yang kompleks (misalnya, mahasiswa, mata kuliah, jadwal, catatan validasi), yang sangat cocok untuk database relasional seperti MySQL.

Performa: MySQL menyediakan query yang efisien untuk memfilter mata kuliah yang tersedia dan memeriksa jadwal bentrok.

Kompatibilitas: MySQL terintegrasi dengan mulus dengan Laravel melalui Eloquent ORM, menyederhanakan operasi database.

Penggunaan dalam Proyek: Menyimpan data untuk mahasiswa (mahasiswa_dinuses), jadwal (jadwal_tawars), catatan KRS (krs_records), dan tabel terkait lainnya.

# Laravel Sanctum (Autentikasi)

Justifikasi:

Autentikasi Berbasis Token: Sanctum menyediakan solusi ringan untuk mengamankan endpoint API dengan bearer token, cocok untuk API yang diakses oleh mahasiswa.

Kemudahan Penggunaan: Sanctum terintegrasi secara native dengan Laravel, mengurangi kompleksitas pengaturan dibandingkan dengan alternatif seperti JWT.

Penggunaan dalam Proyek: Melindungi endpoint KRS dengan middleware auth:sanctum, memastikan hanya pengguna terautentikasi yang dapat mengakses operasi sensitif.

# PHP 8.x

Justifikasi:

Peningkatan Performa: PHP 8.x menawarkan kompilasi JIT (Just-In-Time) dan sistem tipe yang lebih baik, meningkatkan performa untuk permintaan API.

Kompatibilitas: Laravel 8.x sepenuhnya kompatibel dengan PHP 8.x, memastikan tidak ada masalah dependensi.

Penggunaan dalam Proyek: Menjadi mesin penggerak backend Laravel, menangani logika bisnis dan pemrosesan permintaan.

# Keputusan Desain

Lapisan Service (KrsService): Logika bisnis dikemas dalam kelas service terpisah untuk meningkatkan organisasi kode, kemudahan pengujian (testability), dan penggunaan kembali (reusability).

Kelas Resource: Kelas Resource Laravel (KrsResource, CourseResource, KrsStatusResource) digunakan untuk memformat respons API secara konsisten, memastikan output yang bersih dan dapat diprediksi.

Penanganan Error: Eksepsi ditangkap di dalam controller dengan kode status yang diubah menjadi integer, mencegah kesalahan seperti "string status code" dalam respons JSON.

Pengecekan Jadwal Bentrok: Algoritma yang kuat di dalam KrsService memeriksa jadwal bentrok dengan membandingkan slot hari dan sesi, memastikan mahasiswa tidak dapat mendaftar mata kuliah yang bentrok.

Logika Spesifik Lingkungan (Environment-Specific): Validasi dan pengecekan jadwal bentrok dilewati di lingkungan lokal (local environment) untuk memfasilitasi pengujian, sementara tetap diberlakukan di lingkungan produksi (production) untuk integritas data.

# Tantangan yang Diatasi

Kesalahan Kolom SQL: Diperbaiki dengan mengoreksi referensi kolom prodi di KrsService::getAvailableCourses dan menambahkan subquery untuk memfilter berdasarkan program studi mahasiswa.

Kesalahan Timestamp: Diselesaikan dengan menonaktifkan timestamp ($timestamps = false) di model JadwalTawar, karena tabel jadwal_tawars tidak memiliki kolom updated_at.

Kesalahan Akses Resource: Memperbaiki KrsStatusResource untuk mengakses data array dengan benar, mengatasi error "Attempt to read property on array".

Fleksibilitas Pengujian: Menambahkan pengecekan berbasis lingkungan untuk melewati batasan validasi dan jadwal bentrok selama pengujian lokal.

# Kesimpulan

Tumpukan teknologi yang dipilih (Laravel, MySQL, Sanctum, PHP 8.x) memberikan keseimbangan antara pengembangan cepat, skalabilitas, dan keandalan untuk API KRS. Ekosistem Laravel menyederhanakan operasi kompleks seperti autentikasi, query database, dan format respons, sementara MySQL menangani data relasional secara efisien. Keputusan desain memastikan kode yang mudah dipelihara dan API yang kuat untuk manajemen KRS mahasiswa.