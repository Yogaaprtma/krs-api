# krs-api

# Riwayat Kolaborasi AI

Dokumen ini menguraikan penggunaan bantuan AI dalam pengembangan proyek API KRS.

# Alat AI yang Digunakan

Grok 3 (dikembangkan oleh xAI)

# Tujuan: Memberikan panduan dalam proses debugging, optimisasi kode, dan pembuatan dokumentasi.

# Metode Akses: Berinteraksi melalui prompt berbasis teks melalui antarmuka xAI.

# Detail Penggunaan

Membantu saya untuk membuat api.php, model, migration, controller, services, resources, seeder. Lalu juga membantu saya dalam debugging error agar hasilnya sesuai dengan ketentuan soal.

# Debugging Error:

Masalah: Symfony\Component\HttpFoundation\JsonResponse::__construct(): Argument #2 ($status) must be of type int, string given di KrsController.

Kontribusi AI: Menyarankan untuk mengubah kode status eksepsi (exception) menjadi integer menggunakan is_numeric($e->getCode()) ? (int) $e->getCode() : 500.

Masalah: Attempt to read property "validation_status" on array di KrsStatusResource.

Kontribusi AI: Mengidentifikasi bahwa KrsStatusResource mengakses data array seolah-olah properti objek; merekomendasikan penggunaan sintaks $this->resource['key'].

Masalah: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'prodi' in 'where clause' di KrsService::getAvailableCourses.

Kontribusi AI: Mendiagnosis referensi kolom prodi yang salah di tabel matkul_kurikulums; menyarankan penggunaan subquery untuk memfilter berdasarkan prodi dari tabel mahasiswa_dinuses.

Masalah: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'jadwal_tawars.updated_at' in 'field list' di KrsService::removeCourse.

Kontribusi AI: Mengidentifikasi bahwa Laravel berasumsi timestamp ada; merekomendasikan pengaturan $timestamps = false di model JadwalTawar.

Masalah: Error "Schedule conflict" (Jadwal Bentrok) pada POST /krs/courses.

Kontribusi AI: Menjelaskan bahwa ini adalah perilaku yang diharapkan karena sudah ada data KRS; menyarankan untuk menghapus data yang bentrok atau melewati pengecekan di lingkungan lokal.

# Optimisasi Kode:

Kontribusi AI: Memberikan kode yang telah di-refactor untuk KrsService guna meningkatkan keterbacaan (readability) dan kemudahan pemeliharaan (maintainability), seperti pengecekan jadwal bentrok yang modular dan validasi berbasis lingkungan.

Contoh: Menyarankan penambahan pengecekan app()->environment('production') untuk melewati batasan validasi dan jadwal bentrok selama pengujian lokal.

Dokumentasi:

Kontribusi AI: Menghasilkan README.md dengan instruksi pengaturan, detail endpoint, dan panduan pengujian; membuat SOLUTION.md untuk justifikasi teknologi; menyusun draf AI-COLLABORATION.md untuk mendokumentasikan penggunaan AI.

Contoh: Memformat dokumentasi endpoint dengan contoh JSON dan respons error berdasarkan hasil tes Postman yang diberikan.

Panduan Pengujian:

Kontribusi AI: Memberikan instruksi pengujian dengan Postman untuk semua endpoint, termasuk respons yang diharapkan dan skenario error.

Contoh: Menyarankan perintah untuk membersihkan validasi KRS dan catatannya untuk keperluan pengujian:

Bash

php artisan tinker
>>> App\Models\ValidasiKrsMhs::where('ta', '20232')->delete();
>>> App\Models\KrsRecord::where('nim_dinus', 'f02c40967e21c126e6e49bc779f2c58c')->where('ta', '20232')->delete();
Pertimbangan Etis

AI digunakan sebagai alat untuk membantu dalam debugging, tinjauan kode, dan dokumentasi, bukan untuk menghasilkan seluruh basis kode dari awal.

Semua saran dari AI ditinjau dan diimplementasikan secara manual untuk memastikan keselarasan dengan kebutuhan proyek.

AI tidak mengakses atau mengubah basis kode atau database yang sebenarnya; semua perubahan dibuat oleh pengembang berdasarkan panduan yang diberikan AI.

Kesimpulan

Grok 3 berperan penting dalam mengidentifikasi dan menyelesaikan error, mengoptimalkan kode, dan menghasilkan dokumentasi yang komprehensif. Kontribusinya menghemat waktu dan meningkatkan kualitas API KRS, sementara pengembang tetap memegang kendali penuh atas implementasi dan validasi.