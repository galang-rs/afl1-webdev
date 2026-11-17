<?php

namespace App\Http\Controllers;

use App\Services\PortfolioService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class PortfolioController
 *
 * Controller untuk mengelola halaman Portofolio karya nyata Galang Reisduanto.
 * Menyediakan logika pemilahan (filter) kategori pada galeri serta menampilkan
 * studi kasus detail untuk setiap proyek.
 */
class PortfolioController extends Controller
{
    /**
     * Menampilkan daftar galeri portofolio (Portfolio Index).
     *
     * ALUR KERJA FUNCTION INI:
     * 1. Menerima query parameter 'category' dari URL (misal: /portfolio?category=ecommerce).
     * 2. Jika tidak ada parameter kategori, default nilainya adalah 'all' (semua karya).
     * 3. Meminta data portofolio dari PortfolioService::getAll($currentCategory).
     * 4. Mengambil daftar seluruh kategori yang ada via PortfolioService::getCategories().
     * 5. Mengirim data ke View 'pages.portfolio.index' untuk di-looping menggunakan Blade @foreach.
     *
     * @param \Illuminate\Http\Request $request Objek HTTP Request yang membawa query params
     * @return \Illuminate\View\View Tampilan galeri portofolio
     */
    public function index(Request $request): View
    {
        // 1. Ambil filter kategori dari URL query string (?category=...)
        $currentCategory = $request->query('category', 'all');

        // 2. Ambil data proyek yang sesuai kategori
        $projects = PortfolioService::getAll($currentCategory);

        // 3. Ambil daftar tab kategori untuk tombol filter
        $categories = PortfolioService::getCategories();

        // 4. Render tampilan resources/views/pages/portfolio/index.blade.php
        return view('pages.portfolio.index', compact('projects', 'categories', 'currentCategory'));
    }

    /**
     * Menampilkan studi kasus detail 1 proyek portofolio (Portfolio Show).
     *
     * ALUR KERJA FUNCTION INI:
     * 1. Menerima parameter $slug dari URL (contoh: /portfolio/simatugas-manajemen-tugas-akademik).
     * 2. Mencari proyek yang cocok melalui PortfolioService::findBySlug($slug).
     * 3. Jika data tidak ditemukan, sistem otomatis memicu HTTP 404 (Not Found).
     * 4. Mengambil 2 proyek terkait lainnya sebagai rekomendasi bacaan karya.
     * 5. Mengirim data ke View 'pages.portfolio.show' untuk menampilkan tantangan & solusinya.
     *
     * @param string $slug Parameter unik URL proyek
     * @return \Illuminate\View\View Tampilan studi kasus detail proyek
     */
    public function show(string $slug): View
    {
        // 1. Cari proyek berdasarkan slug unik
        $project = PortfolioService::findBySlug($slug);

        // 2. Validasi: jika tidak ada proyek dengan slug tersebut, lemparkan error 404
        if (!$project) {
            abort(404, 'Proyek portofolio tidak ditemukan.');
        }

        // 3. Ambil proyek lain selain proyek yang sedang dibuka untuk ditampilkan di bagian bawah
        $allProjects = PortfolioService::getAll();
        $relatedProjects = array_values(array_filter($allProjects, function ($item) use ($project) {
            return $item['id'] !== $project['id'];
        }));
        $relatedProjects = array_slice($relatedProjects, 0, 2);

        // 4. Render tampilan resources/views/pages/portfolio/show.blade.php
        return view('pages.portfolio.show', compact('project', 'relatedProjects'));
    }
}
