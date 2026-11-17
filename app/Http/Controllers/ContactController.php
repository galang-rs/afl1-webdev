<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Controller untuk mengelola halaman Kontak dan Saluran Komunikasi.
 *
 * Controller ini menyiapkan seluruh data saluran komunikasi resmi Galang Reisduanto,
 * meliputi WhatsApp, email kampus, GitHub, LinkedIn, Discord, serta informasi domisili kampus.
 * Seluruh data dikirim ke View dalam bentuk array terstruktur untuk dirender oleh Blade.
 *
 * Alur Data:
 * Rute GET /contact -> ContactController@index() -> pages.contact (View)
 */
class ContactController extends Controller
{
    /**
     * Menampilkan halaman Kontak dan Direktori Media Sosial Resmi.
     *
     * Method ini menyusun data saluran komunikasi resmi ke dalam array $contactInfo,
     * kemudian mengirimkannya ke view 'pages.contact' untuk ditampilkan secara dinamis.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $contactInfo = [
            'status' => 'Terbuka untuk Tawaran Magang dan Proyek Kolaborasi',
            'location' => 'Surabaya, Jawa Timur, Indonesia',
            'preferred' => 'WhatsApp dan Email',
            'active_hours' => 'Senin - Jumat, 09.00 - 18.00 WIB',
            'primary' => [
                'name' => 'WhatsApp Resmi',
                'handle' => '08123456789',
                'url' => 'https://wa.me/628123456789',
                'action_label' => 'Buka Obrolan WhatsApp ->',
                'badge' => 'Respon Tercepat',
                'color' => 'mint',
                'description' => 'Saluran komunikasi instan untuk keperluan diskusi proyek web, tawaran magang, atau kerja sama profesional.'
            ],
            'emails' => [
                [
                    'type' => 'Email Akademis Kampus',
                    'address' => 'greisduanto@student.ciputra.ac.id',
                    'badge' => 'Kampus UC',
                    'description' => 'Khusus urusan akademis, riset, atau korespondensi resmi kampus.'
                ],
                [
                    'type' => 'Email Profesional',
                    'address' => 'galangreisduanto@gmail.com',
                    'badge' => 'Surel Pribadi',
                    'description' => 'Untuk diskusi umum, undangan kegiatan, dan kerja sama jangka panjang.'
                ],
            ],
            'socials' => [
                [
                    'name' => 'GitHub',
                    'handle' => '@galang-rs',
                    'url' => 'https://github.com/galang-rs',
                    'color' => 'carbon',
                    'badge' => 'Kode Sumber',
                    'description' => 'Koleksi seluruh repositori proyek terbuka, kode program, dan tugas pengembangan perangkat lunak.'
                ],
                [
                    'name' => 'LinkedIn',
                    'handle' => 'Galang Reisduanto',
                    'url' => 'https://linkedin.com',
                    'color' => 'electric',
                    'badge' => 'Jejaring Karier',
                    'description' => 'Profil rekam jejak profesional, pencapaian, dan jejaring kerja di industri perangkat lunak.'
                ],
                [
                    'name' => 'Discord',
                    'handle' => 'samdues#0',
                    'url' => 'https://discord.com',
                    'color' => 'lavender',
                    'badge' => 'Komunitas',
                    'description' => 'Kanal diskusi langsung seputar rekayasa sistem, protokol jaringan, dan pemrograman modern.'
                ],
            ],
            'campus' => [
                'institution' => 'Universitas Ciputra Surabaya',
                'faculty' => 'Fakultas Teknologi Informasi',
                'program' => 'S1 Informatika',
                'address' => 'CitraLand CBD Boulevard, Made, Sambikerep, Surabaya, Jawa Timur 60219',
                'badge' => 'Basis Kampus'
            ]
        ];

        return view('pages.contact', compact('contactInfo'));
    }
}
