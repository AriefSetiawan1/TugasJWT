🧩 Laravel API – User Profile (JWT Authentication)

Proyek ini adalah RESTful API sederhana berbasis Laravel 12 dengan fitur autentikasi menggunakan JWT (JSON Web Token).
API ini memungkinkan pengguna untuk register, login, serta mengupdate profil (name/email) secara aman.

🚀 1. Setup Environment & Menjalankan Server
🔧 Prasyarat

Pastikan Anda telah menginstal:

PHP ≥ 8.2

Composer

MySQL / MariaDB

Postman (opsional, untuk testing API)

🧱 Langkah Instalasi
# Clone repository
git clone https://github.com/username/laravel-api-jwt.git
cd laravel-api-jwt

# Install dependency
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Buat JWT secret
php artisan jwt:secret

# Konfigurasi database di file .env
# kemudian jalankan migrasi dan seeder
php artisan migrate --seed

# Jalankan server lokal
php artisan serve


Server berjalan di:
👉 http://127.0.0.1:8000

⚙️ 2. Variabel Environment yang Diperlukan

Pastikan .env Anda berisi konfigurasi berikut:

APP_NAME=LaravelAPI
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=

JWT_SECRET=your_generated_secret_key

🔗 3. Daftar Endpoint (Ringkas)
Method	Endpoint	Deskripsi	Auth	Body (JSON)	Response (Contoh)
POST	/api/register	Registrasi user baru	❌	{ "name": "John", "email": "john@example.com", "password": "123456" }	{ "message": "User registered successfully" }
POST	/api/login	Login user dan dapatkan token	❌	{ "email": "john@example.com", "password": "123456" }	{ "access_token": "xxx", "token_type": "bearer" }
GET	/api/profile	Ambil data profil user	✅	–	{ "name": "John", "email": "john@example.com" }
PUT	/api/profile	Update profil user	✅	{ "name": "John Doe" } atau { "email": "johnnew@example.com" }	{ "message": "Profile updated", "profile": {...} }
POST	/api/logout	Logout & revoke token	✅	–	{ "message": "Successfully logged out" }

Keterangan:

✅ = membutuhkan header Authorization Bearer <token>.

❌ = public endpoint (tidak perlu token).

🧪 4. Contoh cURL (Wajib)
🧍‍♂️ Register User
curl -X POST http://127.0.0.1:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{"name": "John", "email": "john@example.com", "password": "123456"}'

🔑 Login
curl -X POST http://127.0.0.1:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email": "john@example.com", "password": "123456"}'

👤 Get Profile
curl -X GET http://127.0.0.1:8000/api/profile \
  -H "Authorization: Bearer <TOKEN_JWT>"

✏️ Update Profile
curl -X PUT http://127.0.0.1:8000/api/profile \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer <TOKEN_JWT>" \
  -d '{"name": "John Updated"}'

🚪 Logout
curl -X POST http://127.0.0.1:8000/api/logout \
  -H "Authorization: Bearer <TOKEN_JWT>"
