<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Personal Branding AFL-1 (Galang Reisduanto)
|--------------------------------------------------------------------------
|
| Berkas ini mengatur seluruh pemetaan URL (Routing) pada website personal branding.
| Setiap rute diarahkan ke Controller spesifik sesuai prinsip Model-View-Controller (MVC).
|
| DAFTAR RUTE & TUJUAN EKSEKUSINYA:
| 1. GET  /                -> HomeController@index       -> Menampilkan halaman Beranda (Home)
| 2. GET  /about           -> AboutController@index      -> Menampilkan profil, pendidikan & keahlian
| 3. GET  /portfolio       -> PortfolioController@index  -> Menampilkan galeri seluruh portofolio & filter
| 4. GET  /portfolio/{slug}-> PortfolioController@show   -> Menampilkan studi kasus detail 1 proyek
| 5. GET  /blog            -> BlogController@index       -> Menampilkan daftar artikel & form pencarian
| 6. GET  /blog/{slug}     -> BlogController@show        -> Menampilkan isi lengkap 1 artikel blog
| 7. GET  /contact         -> ContactController@index    -> Menampilkan info kontak & formulir kirim pesan
| 8. POST /contact         -> ContactController@store    -> Memproses validasi form pesan & kirim session flash
|
*/

// =========================================================================
// 1. RUTE BERANDA / HOME
// =========================================================================
// URL: http://127.0.0.1:8000/
// Method: GET
// Controller: HomeController -> method index()
// Nama Rute: route('home')
// Fungsi: Membuka halaman utama yang berisi hero section, ringkasan karya unggulan, dan artikel terbaru.
Route::get('/', [HomeController::class, 'index'])->name('home');

// =========================================================================
// 2. RUTE TENTANG SAYA / ABOUT
// =========================================================================
// URL: http://127.0.0.1:8000/about
// Method: GET
// Controller: AboutController -> method index()
// Nama Rute: route('about')
// Fungsi: Membuka halaman profil Galang Reisduanto, latar belakang pendidikan, keahlian teknis, dan pengalaman.
Route::get('/about', [AboutController::class, 'index'])->name('about');

// =========================================================================
// 3. RUTE PORTOFOLIO / KARYA
// =========================================================================
// URL: http://127.0.0.1:8000/portfolio
// Method: GET
// Controller: PortfolioController -> method index()
// Nama Rute: route('portfolio.index')
// Fungsi: Menampilkan seluruh proyek karya nyata dengan filter kategori dinamis (?category=web/ecommerce/ui-ux).
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// URL: http://127.0.0.1:8000/portfolio/{slug} (misal: /portfolio/simatugas-manajemen-tugas-akademik)
// Method: GET
// Controller: PortfolioController -> method show($slug)
// Nama Rute: route('portfolio.show', $slug)
// Fungsi: Mengambil 1 data proyek berdasarkan parameter {slug} dan menampilkan studi kasus detailnya.
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

// =========================================================================
// 4. RUTE BLOG & ARTIKEL
// =========================================================================
// URL: http://127.0.0.1:8000/blog
// Method: GET
// Controller: BlogController -> method index()
// Nama Rute: route('blog.index')
// Fungsi: Menampilkan katalog artikel blog dengan fitur live search kata kunci (?q=...) dan filter kategori.
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// URL: http://127.0.0.1:8000/blog/{slug} (misal: /blog/menguasai-pola-mvc-laravel-11)
// Method: GET
// Controller: BlogController -> method show($slug)
// Nama Rute: route('blog.show', $slug)
// Fungsi: Mengambil 1 artikel berdasarkan parameter {slug} dan menampilkan teks artikel lengkap beserta author.
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// =========================================================================
// 5. RUTE KONTAK / CONTACT
// =========================================================================
// URL: http://127.0.0.1:8000/contact
// Method: GET
// Controller: ContactController -> method index()
// Nama Rute: route('contact.index')
// Fungsi: Menampilkan halaman info kontak resmi dan direktori sosial media Galang Reisduanto.
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
