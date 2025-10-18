🧩 Laravel API – User Profile (JWT Authentication)

Proyek ini adalah RESTful API sederhana berbasis Laravel 12 dengan fitur autentikasi menggunakan JWT (JSON Web Token).
API ini memungkinkan pengguna untuk register, login, serta mengupdate profil (name/email) secara aman.

🚀 1. Setup Environment & Menjalankan Server
🔧 Prasyarat

Pastikan Anda telah menginstal:
```
PHP ≥ 8.2

Composer

MySQL / MariaDB

Postman (opsional, untuk testing API)
```
🧱 Langkah Instalasi
# Clone repository
```bash
git clone https://github.com/username/laravel-api-jwt.git
cd laravel-api-jwt
```
# Install dependency
```bash
composer install
```
# Copy environment file
```bash
cp .env.example .env
```
# Generate application key
```bash
php artisan key:generate
```
# Buat JWT secret
```bash
php artisan jwt:secret
```
# Konfigurasi database di file .env
# kemudian jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```
# Jalankan server lokal
```bash
php artisan serve
```


⚙️ 2. Variabel Environment yang Diperlukan

Pastikan .env Anda berisi konfigurasi berikut:
```bash
APP_NAME=LaravelAPI
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST={}
DB_PORT={}
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=

JWT_SECRET=your_generated_secret_key
```
🔗 3. Daftar Endpoint (Ringkas)
POST	/api/register	Registrasi user baru		
```json{ "name": "John", "email": "john@example.com", "password": "123456" }	{ "message": "User registered successfully" }```
POST	/api/login	Login user dan dapatkan token	
```json{ "email": "john@example.com", "password": "123456" }	{ "access_token": "xxx", "token_type": "bearer" }```
GET	/api/profile	Ambil data profil user	
```json{ "name": "John", "email": "john@example.com" }```
PUT	/api/profile	Update profil user	
```json{ "name": "John Doe" } atau { "email": "johnnew@example.com" }	{ "message": "Profile updated", "profile": {...} }```
POST	/api/logout	Logout & revoke token 
```json{ "message": "Successfully logged out" }```

🧪 4. Contoh cURL (Wajib)
🧍‍♂️ Register User
```bash
curl -X POST http://127.0.0.1:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{"name": "John", "email": "john@example.com", "password": "123456"}'
```
🔑 Login
```bash
curl -X POST http://127.0.0.1:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email": "john@example.com", "password": "123456"}'
```
👤 Get Profile
```bash
curl -X GET http://127.0.0.1:8000/api/profile \
  -H "Authorization: Bearer <TOKEN_JWT>"
```
✏️ Update Profile
```bash
curl -X PUT http://127.0.0.1:8000/api/profile \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer <TOKEN_JWT>" \
  -d '{"name": "John Updated"}'
```
🚪 Logout
```bash
curl -X POST http://127.0.0.1:8000/api/logout \
  -H "Authorization: Bearer <TOKEN_JWT>"
```
