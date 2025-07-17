KRS API
KRS API adalah aplikasi berbasis Laravel untuk mengelola Kartu Rencana Studi (KRS) mahasiswa. API ini memungkinkan mahasiswa untuk melihat KRS saat ini, mata kuliah yang tersedia, mendaftar mata kuliah, menghapus mata kuliah dari KRS, dan memeriksa status validasi KRS.
Tech Stack

Framework: Laravel
Database: MySQL
Authentication: Laravel Sanctum (Token-based)
Environment: PHP 8.x, Composer

Setup Instructions
Prerequisites

PHP 8.x
Composer
MySQL
Git

Installation

Clone Repository
git clone https://github.com/username/krs-api.git
cd krs-api


Install Dependencies
composer install


Setup Environment

Salin file .env.example ke .env:cp .env.example .env


Konfigurasi database di .env:DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=krs_api
DB_USERNAME=root
DB_PASSWORD=




Generate Application Key
php artisan key:generate


Run Migrations
php artisan migrate


Seed Database
php artisan db:seed


Run Server
php artisan serve

Server akan berjalan di http://127.0.0.1:8000.


API Endpoints
Authentication

POST /api/login
Description: Login untuk mendapatkan token autentikasi.
Body (JSON):{
    "nim_dinus": "string",
    "pass_mhs": "string"
}


Response:
Success (200):{
    "token": "string"
}


Error (401):{
    "message": "Unauthorized"
}


Error (422):{
    "message": "The given data was invalid.",
    "errors": {
        "nim_dinus": ["The nim_dinus field is required."],
        "pass_mhs": ["The pass_mhs field is required."]
    }
}







KRS Endpoints (Require Authentication)
Semua endpoint berikut memerlukan header Authorization: Bearer <token> dan Accept: application/json.

GET /api/students/{nim}/krs/current

Description: Menampilkan daftar KRS mahasiswa untuk tahun ajaran aktif.
Response:
Success (200):[
    {
        "id": 2,
        "course_code": "A11.44212",
        "course_name": "STRUKTUR DATA",
        "sks": 3,
        "schedule": {
            "day": "Selasa",
            "time": "08:40-10:20",
            "room": "B.2.2"
        }
    }
]


Error (404):{
    "error": "Student not found"
}






GET /api/students/{nim}/courses/available

Description: Menampilkan daftar mata kuliah yang tersedia untuk diambil.
Response:
Success (200):[
    {
        "id": 3,
        "course_code": "A11.44213",
        "course_name": "SISTEM BASIS DATA",
        "sks": 3,
        "schedule": {
            "day": "Rabu",
            "time": "10:20-12:00"
        },
        "remaining_quota": 12
    }
]


Error (404):{
    "error": "Student not found"
}






POST /api/students/{nim}/krs/courses

Description: Mendaftarkan mata kuliah ke KRS.
Body (JSON):{
    "schedule_id": 3
}


Response:
Success (201):{
    "message": "Course registered successfully"
}


Error (403):{
    "error": "Schedule conflict"
}


Error (404):{
    "error": "Schedule not available"
}






DELETE /api/students/{nim}/krs/courses/{schedule_id}

Description: Menghapus mata kuliah dari KRS.
Response:
Success (200):{
    "message": "Course removed successfully"
}


Error (404):{
    "error": "KRS record not found"
}






GET /api/students/{nim}/krs/status

Description: Menampilkan status validasi KRS, total SKS, dan IPS semester sebelumnya.
Response:
Success (200):{
    "data": {
        "validation_status": "Not Validated",
        "total_sks": "3",
        "previous_ips": "3.50"
    }
}


Error (404):{
    "error": "Student not found"
}







Testing
Gunakan Postman untuk menguji endpoint:

Login dengan POST /api/login untuk mendapatkan token.
Tambahkan header Authorization: Bearer <token> untuk semua endpoint KRS.
Untuk pengujian lokal, hapus validasi KRS atau KRS yang ada jika diperlukan:php artisan tinker
>>> App\Models\ValidasiKrsMhs::where('ta', '20232')->delete();
>>> App\Models\KrsRecord::where('nim_dinus', 'f02c40967e21c126e6e49bc779f2c58c')->where('ta', '20232')->delete();



Notes

Pastikan database terisi dengan data seeder (MahasiswaDinusSeeder, dll.).
Jika kolom prodi tidak ada di tabel matkul_kurikulums, jalankan migrasi untuk menambahkannya.
Untuk pengujian lokal, pemeriksaan validasi KRS dan konflik jadwal dinonaktifkan.

Troubleshooting

Error SQL: Periksa struktur tabel dengan:php artisan tinker
>>> Schema::getColumnListing('matkul_kurikulums');
>>> Schema::getColumnListing('jadwal_tawars');


Error Token: Verifikasi token dengan:php artisan tinker
>>> \Laravel\Sanctum\PersonalAccessToken::findToken('your_token_here');


Log: Cek error di storage/logs/laravel.log.
