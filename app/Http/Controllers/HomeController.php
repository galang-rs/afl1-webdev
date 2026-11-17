<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use App\Services\PortfolioService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman Beranda (Home).
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $featuredProjects = PortfolioService::getFeatured(3);
        $latestArticles = BlogService::getLatest(3);

        $stats = [
            ['value' => '10+', 'label' => 'Repositori Publik GitHub', 'accent' => 'mint'],
            ['value' => '100%', 'label' => 'Kode Murni Terbuka', 'accent' => 'sunburst'],
            ['value' => '3+', 'label' => 'Protokol Jaringan Dibangun', 'accent' => 'lavender'],
            ['value' => '3+ Thn', 'label' => 'Pengalaman Rekayasa Perangkat Lunak', 'accent' => 'electric'],
        ];

        // Bidang keahlian umum dan peran profesional
        $skillsPreview = [
            ['name' => 'Pengembangan Web', 'badge' => 'Bidang Utama', 'color' => 'mint'],
            ['name' => 'Jaringan dan Protokol', 'badge' => 'Bidang Keilmuan', 'color' => 'electric'],
            ['name' => 'Pemrograman Sistem', 'badge' => 'Keahlian Inti', 'color' => 'lavender'],
            ['name' => 'Sistem Terdistribusi', 'badge' => 'Arsitektur', 'color' => 'sunburst'],
            ['name' => 'Desain Antarmuka', 'badge' => 'Pengalaman Pengguna', 'color' => 'ember'],
            ['name' => 'Keamanan dan Kriptografi', 'badge' => 'Fokus Riset', 'color' => 'voltage'],
        ];

        return view('pages.home', compact('featuredProjects', 'latestArticles', 'stats', 'skillsPreview'));
    }
}
