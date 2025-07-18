# KRS API (Laravel)

## **Deskripsi Proyek**

**KRS API** adalah backend service yang dibangun menggunakan Laravel untuk mengelola proses Kartu Rencana Studi (KRS) mahasiswa. API ini menyediakan fungsionalitas inti seperti autentikasi mahasiswa, melihat KRS saat ini, menelusuri mata kuliah yang tersedia, mendaftar dan membatalkan mata kuliah, hingga memeriksa status validasi KRS.

## **Tumpukan Teknologi (Tech Stack)**
---------------------------------------------------------------------
| Kategori          | Teknologi                                     |
| ----------------- | --------------------------------------------- |
| **Framework**     | Laravel 10.48.29                              |
| **Bahasa**        | PHP 8.2.4                                     |
| **Database**      | MySQL                                         |
| **Autentikasi**   | Laravel Sanctum (API Token)                   |
| **Dependensi**    | Composer                                      |
---------------------------------------------------------------------

## **Panduan Instalasi & Setup**

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal.

### **Prasyarat**
* PHP 8.2.4 (8+)
* Composer
* MySQL
* Git

### **Langkah-langkah Instalasi**

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/Yogaaprtma/krs-api.git](https://github.com/Yogaaprtma/krs-api.git)
    cd krs-api
    ```

2.  **Install Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Setup File Environment**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```
    Kemudian, sesuaikan konfigurasi database di dalam file `.env`:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=krs_api
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Jalankan Migrasi & Seeder**
    Perintah ini akan membuat semua tabel dan mengisinya dengan data awal.
    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Jalankan Server Lokal**
    ```bash
    php artisan serve
    ```
    Server akan berjalan di `http://127.0.0.1:8000`.

---

## **Dokumentasi Endpoint API**

### **Autentikasi**

#### `POST /api/login`
Login untuk mendapatkan token autentikasi.

-   **Body Request:**
    ```json
    {
        "nim_dinus": "string",
        "pass_mhs": "string"
    }
    ```
-   **Respons Sukses (200 OK):**
    ```json
    {
        "token": "1|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
    }
    ```
-   **Respons Error:**
    * `401 Unauthorized`: Jika kredensial salah.
    * `422 Unprocessable Entity`: Jika data yang dikirim tidak valid.

### **Endpoint KRS (Memerlukan Autentikasi)**
Semua endpoint berikut memerlukan header:
-   `Accept`: `application/json`
-   `Authorization`: `Bearer <token>`

---

#### `GET /api/students/{nim}/krs/current`
Menampilkan daftar KRS mahasiswa untuk tahun ajaran aktif.

-   **Parameter URL:**
    * `{nim}`: NIM (dienkripsi) mahasiswa.
-   **Respons Sukses (200 OK):**
    ```json
    {
        "data": [
            {
                "id": 1,
                "course_code": "A11.44211",
                "course_name": "ALGORITMA DAN PEMROGRAMAN",
                "sks": 2,
                "schedules": [
                    { "day": "Senin", "time": "07.00-08.40", "room": "B.2.1" },
                    // ... jadwal lainnya
                ]
            }
        ]
    }
    ```

---

#### `GET /api/students/{nim}/courses/available`
Menampilkan daftar mata kuliah yang tersedia untuk diambil (tidak bentrok, kuota ada, sesuai kurikulum).

-   **Parameter URL:**
    * `{nim}`: NIM (dienkripsi) mahasiswa.
-   **Respons Sukses (200 OK):**
    ```json
    {
        "data": [
            {
                "id": 2,
                "course_code": "A11.44212",
                "course_name": "STRUKTUR DATA",
                "sks": 3,
                "schedule": { "day": "Selasa", "time": "08:40-10:20" },
                "remaining_quota": 15
            }
        ]
    }
    ```

---

#### `POST /api/students/{nim}/krs/courses`
Mendaftarkan mata kuliah ke dalam KRS mahasiswa.

-   **Parameter URL:**
    * `{nim}`: NIM (dienkripsi) mahasiswa.
-   **Body Request:**
    ```json
    {
        "schedule_id": 2
    }
    ```
-   **Respons Sukses (200 OK):**
    ```json
    {
        "message": "Course registered successfully"
    }
    ```
-   **Respons Error:** `403 Forbidden` (Jadwal bentrok), `404 Not Found` (Jadwal tidak tersedia).

---

#### `DELETE /api/students/{nim}/krs/courses/{schedule_id}`
Menghapus mata kuliah dari KRS.

-   **Parameter URL:**
    * `{nim}`: NIM (dienkripsi) mahasiswa.
    * `{schedule_id}`: ID unik dari `jadwal_tawars`.
-   **Respons Sukses (200 OK):**
    ```json
    {
        "message": "Course removed successfully"
    }
    ```
-   **Respons Error:** `404 Not Found` (Data KRS tidak ditemukan).

---

#### `GET /api/students/{nim}/krs/status`
Menampilkan status validasi, total SKS, dan IPS terakhir.

-   **Parameter URL:**
    * `{nim}`: NIM (dienkripsi) mahasiswa.
-   **Respons Sukses (200 OK):**
    ```json
    {
        "data": {
            "validation_status": "Not Validated",
            "total_sks": "5",
            "previous_ips": "3.24"
        }
    }
    ```