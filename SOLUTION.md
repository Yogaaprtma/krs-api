# **Justifikasi Teknologi & Desain Arsitektur - KRS API**

## **1. Ringkasan Eksekutif**

Proyek KRS API dikembangkan sebagai backend terpusat untuk mengelola proses registrasi mata kuliah mahasiswa (Kartu Rencana Studi). API ini menyediakan serangkaian endpoint yang esensial, mencakup pengambilan data KRS, penelusuran mata kuliah yang tersedia, pendaftaran dan pembatalan mata kuliah, serta validasi status KRS. Pemilihan tumpukan teknologi (*technology stack*) didasarkan pada kebutuhan akan **skalabilitas**, **kemudahan pemeliharaan** (*maintainability*), dan **kecepatan pengembangan** (*rapid development*).

---

## **2. Tumpukan Teknologi (Technology Stack)**
--------------------------------------------------------------------------------------------------
|       Kategori     |       Teknologi     |   Versi  |                Peran Utama               |
|-------------------------------------------------------------------------------------------------
| Framework Backend  | **Laravel**         | 10.48.29 | Logika aplikasi, routing, dan orkestrasi |
| Database           | **MySQL**           | 10.4.28  | Penyimpanan data relasional              |
| Autentikasi        | **Laravel Sanctum** | 3.3      | Pengamanan API berbasis token            |
| Bahasa Pemrograman | **PHP**             | 8.2.4    | Mesin penggerak logika backend           |
--------------------------------------------------------------------------------------------------

### **a. Laravel 10.48.29 (PHP Framework)**
**Justifikasi:**
* **Pengembangan Cepat:** Ekosistem Laravel yang matang—dengan fitur seperti **Eloquent ORM**, **middleware**, dan **sistem routing**—secara signifikan mempercepat waktu pengembangan.
* **Skalabilitas:** Struktur modular dan dukungan *Dependency Injection* memungkinkan penanganan logika bisnis yang kompleks, seperti validasi prasyarat mata kuliah dan pengecekan jadwal bentrok, secara terorganisir.
* **Ekosistem & Komunitas:** Dukungan komunitas yang masif, dokumentasi yang komprehensif, serta paket siap pakai seperti **Laravel Sanctum** menyederhanakan tugas-tugas umum seperti autentikasi dan pengamanan API.

### **b. MySQL (Database)**
**Justifikasi:**
* **Struktur Data Relasional:** Sistem KRS secara inheren bersifat relasional (mahasiswa → KRS → jadwal → mata kuliah). MySQL sangat andal dalam mengelola hubungan data yang kompleks ini.
* **Performa Query:** Terbukti efisien untuk operasi query yang intensif, seperti memfilter mata kuliah berdasarkan SKS dan semester, serta memeriksa jadwal bentrok.
* **Kompatibilitas Penuh:** Terintegrasi secara mulus dengan **Laravel Eloquent ORM**, menyederhanakan semua operasi database (CRUD) menjadi sintaks yang ekspresif.

### **c. Laravel Sanctum (Autentikasi)**
**Justifikasi:**
* **Autentikasi Berbasis Token:** Menyediakan solusi autentikasi *stateless* yang ringan dan aman menggunakan *bearer token*, sangat ideal untuk API yang diakses oleh berbagai klien (web, mobile).
* **Kemudahan Integrasi:** Sebagai paket resmi Laravel, konfigurasinya jauh lebih sederhana dibandingkan alternatif lain.

---

## **3. Keputusan Desain Arsitektur**

1.  **Pemisahan Logika dengan Service Layer (`KrsService`)**
    Logika bisnis inti—seperti validasi KRS, pengecekan jadwal bentrok, dan kalkulasi SKS—dipisahkan ke dalam `KrsService`. Pendekatan ini meningkatkan **keterbacaan kode**, **kemudahan pengujian** (*testability*), dan **potensi penggunaan kembali** (*reusability*).

2.  **Standardisasi Respons dengan API Resources**
    `KrsResource`, `CourseResource`, dan `KrsStatusResource` digunakan untuk memformat semua respons API. Ini memastikan output JSON yang dikirim ke klien selalu **bersih**, **terstruktur**, dan **dapat diprediksi**.

3.  **Penanganan Error yang Konsisten**
    Semua *exception* ditangkap di level *controller* dan dikonversi menjadi respons JSON yang standar dengan kode status HTTP yang tepat, menghindari kebocoran error internal ke klien.

4.  **Logika Spesifik Lingkungan (*Environment-Specific*)**
    Validasi ketat seperti pengecekan jadwal bentrok **dinonaktifkan** pada lingkungan pengembangan (`local`) untuk memfasilitasi pengujian yang lebih cepat, namun **tetap diberlakukan** di lingkungan `production` untuk menjaga integritas data.

---

## **4. Tantangan Teknis dan Solusinya**

* **Masalah:** Referensi kolom `prodi` tidak tepat saat mengambil mata kuliah.
    * **Solusi:** Memperbaiki *query* di `KrsService::getAvailableCourses` dengan menambahkan *subquery* untuk memfilter berdasarkan program studi mahasiswa yang sedang login.

* **Masalah:** Laravel secara otomatis mencoba mengisi *timestamp* (`created_at`, `updated_at`) pada tabel yang tidak memilikinya.
    * **Solusi:** Menonaktifkan fitur ini pada model yang relevan (misalnya `JadwalTawar` sebelum perbaikan) dengan menambahkan properti `public $timestamps = false;`.

* **Masalah:** Error `Attempt to read property on array` saat memformat respons.
    * **Solusi:** Memperbaiki `KrsStatusResource` untuk mengakses data menggunakan sintaks array (`$this->resource['key']`) alih-alih sintaks objek.

## **5. Kesimpulan**

Kombinasi **Laravel**, **MySQL**, dan **Sanctum** terbukti menjadi fondasi yang solid, memberikan keseimbangan optimal antara **kecepatan pengembangan**, **skalabilitas**, dan **keandalan** untuk KRS API. Keputusan arsitektur yang cermat memastikan proyek ini mudah dipelihara dan dikembangkan di masa depan.