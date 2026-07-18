# 🚀 Quick Start Guide

## Langkah Cepat Memulai

### 1️⃣ Install & Setup
```bash
# Clone repo
git clone https://github.com/Aladin1234567/laravel-blog-simple.git
cd laravel-blog-simple

# Install dependencies
composer install
npm install

# Copy .env
cp .env.example .env

# Generate key
php artisan key:generate

# Setup database
php artisan migrate
php artisan db:seed
```

### 2️⃣ Jalankan Server
```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite (optional)
npm run dev
```

### 3️⃣ Buka Browser
- 🌐 Halaman Publik: http://localhost:8000
- 🔐 Login Admin: http://localhost:8000/login
- 📊 Dashboard: http://localhost:8000/admin/dashboard

### 4️⃣ Demo Login
```
Email: admin@blog.com
Password: password
```

## 📁 Struktur Folder

```
laravel-blog-simple/
├── app/
│   ├── Models/          # Model (Article, Category, User)
│   └── Http/Controllers/ # Controller
├── resources/
│   └── views/           # Blade Templates
├── routes/
│   └── web.php          # Routes
├── database/
│   ├── migrations/      # Database Tables
│   └── seeders/         # Seed Data
└── public/              # Public Assets
```

## 🎯 Fitur Utama

✅ Create, Read, Update, Delete (CRUD) Artikel
✅ Manage Kategori
✅ Login/Logout Admin
✅ Publish/Unpublish Artikel
✅ Search by Category
✅ Responsive Design

## 🔧 Customization

### Ubah Nama Blog
Edit di `resources/views/layouts/app.blade.php`:
```blade
<a class="navbar-brand" href="/">📝 Blog Sederhana</a>
```

### Ubah Warna
Edit di `resources/views/layouts/app.blade.php`:
```css
--primary-color: #3498db;  /* Ubah warna primary */
--secondary-color: #2c3e50; /* Ubah warna secondary */
```

### Ubah Database
Edit di `.env`:
```
DB_DATABASE=nama_database_baru
DB_USERNAME=username
DB_PASSWORD=password
```

## 📚 Database

### Articles Table
- id
- title
- slug
- content
- category_id
- is_published
- timestamps

### Categories Table
- id
- name
- slug
- description
- timestamps

### Users Table
- id
- name
- email
- password
- timestamps

## 🚨 Troubleshooting

**Error: "No database selected"**
- Edit `.env` dan konfigurasi database
- Jalankan `php artisan migrate`

**Error: "SQLSTATE[42S02]"**
- Database belum dibuat atau belum migration
- Jalankan `php artisan migrate`

**Blade tidak ter-compile**
- Clear cache: `php artisan view:clear`
- Clear all: `php artisan cache:clear`

## 📞 Support

Jika ada pertanyaan, silakan buka issue di GitHub atau hubungi developer.

---

Selamat menggunakan Blog Sederhana! 🎉