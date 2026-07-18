<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin Blog',
            'email' => 'admin@blog.com',
            'password' => bcrypt('password'),
        ]);

        // Create categories
        $categories = [
            ['name' => 'Teknologi', 'slug' => 'teknologi', 'description' => 'Berita dan tips seputar teknologi'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'description' => 'Tips gaya hidup sehat'],
            ['name' => 'Travel', 'slug' => 'travel', 'description' => 'Rekomendasi destinasi wisata'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create sample articles
        $articles = [
            [
                'title' => 'Pemrograman PHP untuk Pemula',
                'slug' => 'pemrograman-php-untuk-pemula',
                'content' => 'PHP adalah bahasa pemrograman yang populer untuk web development. Dalam artikel ini kita akan belajar dasar-dasar PHP...',
                'category_id' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Tips Sehat di Era Digital',
                'slug' => 'tips-sehat-di-era-digital',
                'content' => 'Kesehatan saat bekerja di depan layar komputer sangat penting. Berikut tips untuk menjaga kesehatan Anda...',
                'category_id' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Destinasi Wisata Impian di Bali',
                'slug' => 'destinasi-wisata-impian-di-bali',
                'content' => 'Bali memiliki banyak destinasi wisata yang menakjubkan. Mari kita eksplorasi beberapa tempat terbaik di Bali...',
                'category_id' => 3,
                'is_published' => true,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}