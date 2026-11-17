<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Menampilkan halaman Tentang Saya (About / Profil).
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $bio = [
            'name' => 'Galang Reisduanto',
            'gender' => 'Laki-laki',
            'alias' => 'galang-rs',
            'role' => 'Web Developer dan System Engineer',
            'tagline' => 'Membangun arsitektur perangkat lunak yang tangguh, sistem jaringan handal, dan antarmuka web interaktif.',
            'location' => 'Surabaya, Jawa Timur, Indonesia',
            'experience_years' => '3+ Tahun',
            'availability' => 'Terbuka untuk Kolaborasi dan Magang',
            'photo' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=800&q=80',
            'photo_source' => 'Unsplash (Jurica Koletic)',
            'photo_source_url' => 'https://unsplash.com/photos/7YVZYZeITc8',
            'about_text' => 'Halo! Saya Galang Reisduanto, mahasiswa S1 Informatika di Universitas Ciputra Surabaya dengan minat besar pada pengembangan aplikasi web, pemrograman sistem, dan rekayasa jaringan komputer. Saya aktif mengembangkan proyek open source dan mengeksplorasi pembuatan aplikasi yang efisien, terstruktur rapi, serta berorientasi pada kemudahan penggunaan.',
            'philosophy' => 'Bagi saya, perangkat lunak yang baik lahir dari perpaduan logika sistem yang kokoh dan perancangan antarmuka yang ramah. Setiap proyek dikerjakan dengan standar arsitektur bersih, pemisahan tugas modular, dan pengujian yang teliti agar dapat diandalkan secara jangka panjang.'
        ];

        // Riwayat pendidikan formal dengan SMAN 10 Surabaya
        $education = [
            [
                'period' => '2023 - Sekarang',
                'degree' => 'S1 Informatika',
                'institution' => 'Universitas Ciputra Surabaya',
                'description' => 'Mendalami rekayasa perangkat lunak, sistem komputasi awan, arsitektur basis data, pemrograman web, dan algoritma. Aktif dalam riset proyek mandiri dan pengerjaan tugas akademik.',
                'badge' => 'Pendidikan Tinggi'
            ],
            [
                'period' => '2020 - 2023',
                'degree' => 'Sekolah Menengah Atas (MIPA)',
                'institution' => 'SMAN 10 Surabaya',
                'description' => 'Menempuh pendidikan menengah atas di SMAN 10 Surabaya dengan fokus bidang sains dan matematika. Mengembangkan minat awal pada logika komputasi, pemecahan masalah algoritma, dan pemrograman komputer.',
                'badge' => 'Pendidikan Menengah'
            ]
        ];

        // Kategori keahlian dan kompetensi teknis profesional
        $skillCategories = [
            [
                'category' => 'Pemrograman Sistem dan Jaringan',
                'badge_color' => 'mint',
                'skills' => [
                    ['name' => 'Go (Golang)', 'level' => 'Tingkat Lanjut', 'pct' => 92],
                    ['name' => 'Protokol Jaringan (WireGuard, OpenVPN, SOCKS5)', 'level' => 'Tingkat Lanjut', 'pct' => 90],
                    ['name' => 'Pemrograman Soket TCP/IP dan UDP', 'level' => 'Tingkat Lanjut', 'pct' => 88],
                    ['name' => 'Manajemen Antarmuka Userspace TUN', 'level' => 'Menengah', 'pct' => 85],
                ]
            ],
            [
                'category' => 'Pengembangan Aplikasi Web',
                'badge_color' => 'electric',
                'skills' => [
                    ['name' => 'Arsitektur Web dan Pola MVC', 'level' => 'Tingkat Lanjut', 'pct' => 94],
                    ['name' => 'Perancangan RESTful API', 'level' => 'Tingkat Lanjut', 'pct' => 90],
                    ['name' => 'Manajemen Basis Data Relasional (MySQL, SQLite)', 'level' => 'Tingkat Lanjut', 'pct' => 88],
                    ['name' => 'Desain Antarmuka Web Responsif', 'level' => 'Mahir', 'pct' => 95],
                ]
            ],
            [
                'category' => 'Desain Antarmuka dan Pengalaman Pengguna',
                'badge_color' => 'lavender',
                'skills' => [
                    ['name' => 'Konsep Desain Neobrutalisme', 'level' => 'Mahir', 'pct' => 95],
                    ['name' => 'Komponen Antarmuka Modular', 'level' => 'Tingkat Lanjut', 'pct' => 92],
                    ['name' => 'Interaksi Pengguna dan Logika Tampilan', 'level' => 'Tingkat Lanjut', 'pct' => 88],
                    ['name' => 'Aksesibilitas Konten Web', 'level' => 'Tingkat Lanjut', 'pct' => 90],
                ]
            ],
            [
                'category' => 'Alat dan Lingkungan Pengembangan',
                'badge_color' => 'sunburst',
                'skills' => [
                    ['name' => 'Git dan Manajemen Repositori GitHub', 'level' => 'Tingkat Lanjut', 'pct' => 92],
                    ['name' => 'Lingkungan Terminal Linux dan Shell', 'level' => 'Tingkat Lanjut', 'pct' => 90],
                    ['name' => 'Pengujian Endpoint dan Otomasi Build', 'level' => 'Menengah', 'pct' => 86],
                    ['name' => 'Manajemen Paket dan Dependensi', 'level' => 'Tingkat Lanjut', 'pct' => 92],
                ]
            ]
        ];

        $experiences = [
            [
                'period' => '2025 - 2026',
                'role' => 'Pengembang Sistem Terbuka (Open Source Contributor)',
                'company' => 'GitHub (galang-rs)',
                'description' => 'Membangun implementasi klien WireGuard murni dalam Go, server proxy SOCKS5 modular, dan utilitas jaringan tingkat rendah dengan dokumentasi terbuka.',
                'tag' => 'Proyek Terbuka'
            ],
            [
                'period' => '2024 - 2025',
                'role' => 'Pengembang Aplikasi Web Mahasiswa',
                'company' => 'Proyek Akademik Universitas Ciputra Surabaya',
                'description' => 'Mengerjakan berbagai tugas besar pengembangan perangkat lunak, perancangan antarmuka pengguna, serta integrasi layanan komputasi awan.',
                'tag' => 'Pengalaman Akademis'
            ],
            [
                'period' => '2023 - 2024',
                'role' => 'Eksplorasi Jaringan dan Rekayasa Protokol',
                'company' => 'Riset Mandiri',
                'description' => 'Mempelajari cara kerja protokol enkripsi, paket jaringan TCP/IP, dan implementasi kriptografi modern pada sistem operasi.',
                'tag' => 'Riset Mandiri'
            ]
        ];

        return view('pages.about', compact('bio', 'education', 'skillCategories', 'experiences'));
    }
}
