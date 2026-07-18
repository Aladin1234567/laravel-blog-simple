# Blog Sederhana - Laravel

Web blog sederhana dengan Laravel. Fitur utama: CRUD artikel, kategori, dan dashboard admin.

## Fitur
- 📝 Create, Read, Update, Delete Artikel
- 📂 Kategori Artikel
- 👤 Halaman Publik & Admin
- 🎨 UI Simple dengan Bootstrap
- 💾 Database MySQL

## Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/Aladin1234567/laravel-blog-simple.git
cd laravel-blog-simple
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Jalankan Migration
```bash
php artisan migrate
php artisan db:seed
```

### 6. Jalankan Server
```bash
php artisan serve
npm run dev
```

Akses di: `http://localhost:8000`

## Login Admin
- Email: `admin@blog.com`
- Password: `password`