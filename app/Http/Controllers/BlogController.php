<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class BlogController
 *
 * Controller untuk mengelola halaman Blog & Artikel teknologi Galang Reisduanto.
 * Menyediakan fungsionalitas pencarian kata kunci, filtering kategori artikel,
 * serta menampilkan isi lengkap bacaan artikel pada halaman detail.
 */
class BlogController extends Controller
{
    /**
     * Menampilkan daftar artikel blog dengan filter kategori & pencarian (Blog Index).
     *
     * ALUR KERJA FUNCTION INI:
     * 1. Menerima query parameter 'category' (kategori artikel) dan 'q' (kata kunci cari).
     * 2. Meminta daftar artikel ke BlogService::getAll($currentCategory, $search).
     * 3. Mengambil daftar seluruh kategori artikel via BlogService::getCategories().
     * 4. Mengirim data ke View 'pages.blog.index' untuk dirender dengan kartu artikel neobrutalism.
     *
     * @param \Illuminate\Http\Request $request Objek HTTP Request yang membawa query filter/search
     * @return \Illuminate\View\View Tampilan daftar artikel blog
     */
    public function index(Request $request): View
    {
        // 1. Tangkap parameter filter kategori & keyword pencarian
        $currentCategory = $request->query('category', 'all');
        $search = $request->query('q');

        // 2. Ambil data artikel yang sesuai filter dan keyword pencarian
        $articles = BlogService::getAll($currentCategory, $search);

        // 3. Ambil daftar kategori artikel untuk tab filter
        $categories = BlogService::getCategories();

        // 4. Render tampilan resources/views/pages/blog/index.blade.php
        return view('pages.blog.index', compact('articles', 'categories', 'currentCategory', 'search'));
    }

    /**
     * Menampilkan halaman baca detail 1 artikel blog (Blog Show).
     *
     * ALUR KERJA FUNCTION INI:
     * 1. Menerima parameter $slug dari URL (contoh: /blog/menguasai-pola-mvc-laravel-11).
     * 2. Mencari artikel yang cocok melalui BlogService::findBySlug($slug).
     * 3. Jika artikel tidak ditemukan, panggil abort(404).
     * 4. Mengambil 3 artikel rekomendasi lainnya untuk ditampilkan di seksi bawah.
     * 5. Mengirim data ke View 'pages.blog.show' untuk menampilkan artikel lengkap dan author bio.
     *
     * @param string $slug Parameter unik URL artikel
     * @return \Illuminate\View\View Tampilan halaman baca artikel
     */
    public function show(string $slug): View
    {
        // 1. Cari data artikel berdasarkan slug
        $article = BlogService::findBySlug($slug);

        // 2. Validasi keberadaan artikel: jika tidak ada, tampilkan 404
        if (!$article) {
            abort(404, 'Artikel blog tidak ditemukan.');
        }

        // 3. Ambil rekomendasi artikel lainnya
        $allArticles = BlogService::getAll();
        $relatedArticles = array_values(array_filter($allArticles, function ($item) use ($article) {
            return $item['id'] !== $article['id'];
        }));
        $relatedArticles = array_slice($relatedArticles, 0, 3);

        // 4. Render tampilan resources/views/pages/blog/show.blade.php
        return view('pages.blog.show', compact('article', 'relatedArticles'));
    }
}
