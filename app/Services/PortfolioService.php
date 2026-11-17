<?php

namespace App\Services;

class PortfolioService
{
    /**
     * Mengambil seluruh data proyek portofolio nyata dari GitHub galang-rs.
     *
     * @param string|null $category Filter kategori proyek
     * @return array
     */
    public static function getAll(?string $category = null): array
    {
        $items = [
            [
                'id' => 1,
                'slug' => 'wireguard-pure-go-client',
                'title' => 'WireGuard Pure-Go Client',
                'tagline' => 'Implementasi protokol WireGuard murni dalam Go berbasis spesifikasi resmi whitepaper',
                'category' => 'network',
                'category_label' => 'Jaringan dan Protokol',
                'badge_color' => 'mint',
                'sticker_accent' => 'rocket',
                'year' => '2026',
                'client' => 'Proyek Terbuka GitHub (galang-rs/wireguard)',
                'role' => 'Pengembang Utama',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Markus Spiske)',
                'image_source_url' => 'https://unsplash.com/photos/iar-afB0QQw',
                'description' => 'Implementasi klien protokol WireGuard murni menggunakan bahasa Go tanpa ketergantungan CGo. Mengimplementasikan mekanisme handshake Noise IKpsk2, enkripsi ChaCha20-Poly1305, dan manajemen antarmuka userspace TUN.',
                'challenge' => 'Menyusun state machine handshake kriptografi Noise dari nol tanpa bantuan library eksternal C, serta menjaga efisiensi transfer data paket jaringan.',
                'solution' => 'Menerapkan kalkulasi kurva eliptis Curve25519, alokasi buffer memori hemat, dan goroutine concurrency untuk pengiriman paket UDP secara paralel.',
                'tools' => ['Go', 'Noise Protocol', 'ChaCha20-Poly1305', 'TUN Interface', 'UDP Networking'],
                'features' => [
                    'Noise IKpsk2 cryptographic handshake murni tanpa CGo',
                    'Transport enkripsi ChaCha20-Poly1305 dengan replay protection',
                    'Userspace TUN driver untuk perutean paket IP di tingkat sistem operasi',
                    'Konfigurasi fleksibel berbasis file konfigurasi standar WireGuard'
                ],
                'demo_url' => 'https://github.com/galang-rs/wireguard',
                'github_url' => 'https://github.com/galang-rs/wireguard',
                'is_featured' => true,
            ],
            [
                'id' => 2,
                'slug' => 'socks5-modular-proxy-server',
                'title' => 'Modular SOCKS5 Proxy Server',
                'tagline' => 'Server proxy modular berkinerja tinggi dengan autentikasi ganda dan backend VPN',
                'category' => 'network',
                'category_label' => 'Jaringan dan Sistem',
                'badge_color' => 'sunburst',
                'sticker_accent' => 'lightning',
                'year' => '2026',
                'client' => 'Proyek Terbuka GitHub (galang-rs/socks5)',
                'role' => 'Pengembang Utama',
                'image' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Alina Grubnyak)',
                'image_source_url' => 'https://unsplash.com/photos/ZiQkhI7417A',
                'description' => 'Server proxy SOCKS5 modular yang dibangun dari dasar dengan bahasa Go. Mendukung banyak metode autentikasi, penyaluran trafik melalui bermacam backend VPN (WireGuard, OpenVPN, atau Direct Connection), dan kustom userspace TCP/IP.',
                'challenge' => 'Mengatur perutean ribuan koneksi paralel TCP dan UDP tanpa terjadi kebocoran memori (memory leak) saat pergantian backend VPN secara dinamis.',
                'solution' => 'Menggunakan arsitektur channel dan sync.Pool pada Go, pemisahan antarmuka backend modular, serta penanganan koneksi non-blocking IO.',
                'tools' => ['Go', 'SOCKS5 Protocol', 'TCP/IP', 'VPN Integration', 'Goroutines'],
                'features' => [
                    'Implementasi protokol standar RFC 1928 dengan dukungan TCP CONNECT dan UDP ASSOCIATE',
                    'Sistem autentikasi kredensial pengguna dan metode tanpa sandi',
                    'Dukungan perutean dinamis menuju backend WireGuard atau koneksi langsung',
                    'Manajemen alokasi memori hemat untuk penanganan trafik throughput tinggi'
                ],
                'demo_url' => 'https://github.com/galang-rs/socks5',
                'github_url' => 'https://github.com/galang-rs/socks5',
                'is_featured' => true,
            ],
            [
                'id' => 3,
                'slug' => 'ovpn-pure-go-openvpn-client',
                'title' => 'Pure-Go OpenVPN Protocol Client',
                'tagline' => 'Klien protokol OpenVPN penuh dalam Go dengan userspace TUN dan enkripsi AES-GCM',
                'category' => 'network',
                'category_label' => 'Jaringan dan Keamanan',
                'badge_color' => 'electric',
                'sticker_accent' => 'check',
                'year' => '2026',
                'client' => 'Proyek Terbuka GitHub (galang-rs/ovpn)',
                'role' => 'Pengembang Utama',
                'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (FlyD)',
                'image_source_url' => 'https://unsplash.com/photos/iar-afB0QQw',
                'description' => 'Klien protokol OpenVPN yang sepenuhnya ditulis dalam bahasa Go murni. Menyediakan protokol jaringan lengkap dengan userspace TUN, autentikasi tls-auth dan tls-crypt, cipher AES-GCM/CBC, tanpa ketergantungan library C eksternal.',
                'challenge' => 'Menguraikan paket kontrol TLS OpenVPN yang memiliki enkapsulasi khusus dan memastikan sinkronisasi nomor urut paket tetap konsisten.',
                'solution' => 'Membuat lapisan parser paket kontrol OpenVPN tersendiri, modul kriptografi autentikasi tls-crypt, dan integrasi TUN adapter lintas platform.',
                'tools' => ['Go', 'OpenVPN Protocol', 'TLS-Crypt', 'AES-GCM', 'Cryptography'],
                'features' => [
                    'Mendukung autentikasi mode tls-auth dan tls-crypt generasi baru',
                    'Enkripsi data paket menggunakan AES-256-GCM dan AES-128-CBC',
                    'Manajemen kunci sesi otomatis dengan renegosiasi waktu berkala',
                    'Sepenuhnya mandiri tanpa membutuhkan instalasi binary OpenVPN pihak ketiga'
                ],
                'demo_url' => 'https://github.com/galang-rs/ovpn',
                'github_url' => 'https://github.com/galang-rs/ovpn',
                'is_featured' => true,
            ],
            [
                'id' => 4,
                'slug' => 'web-programming-afl4',
                'title' => 'Web Programming AFL-4 Project',
                'tagline' => 'Aplikasi web interaktif dengan arsitektur MVC terstruktur dan antarmuka responsif',
                'category' => 'web',
                'category_label' => 'Aplikasi Web',
                'badge_color' => 'lavender',
                'sticker_accent' => 'code',
                'year' => '2025',
                'client' => 'Tugas Akademik Pemrograman Web (galang-rs/web-programing-afl4)',
                'role' => 'Pengembang Web',
                'image' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Glenn Carstens-Peters)',
                'image_source_url' => 'https://unsplash.com/photos/nLU4vO5iCEQ',
                'description' => 'Aplikasi web yang dibangun untuk menyelesaikan tugas mata kuliah pemrograman web dengan menerapkan pola pemisahan logika, validasi input pengguna, dan antarmuka yang ramah pengguna.',
                'challenge' => 'Menghadirkan antarmuka dinamis dan responsif pada berbagai ukuran layar serta menjaga keteraturan struktur direktori kode.',
                'solution' => 'Menggunakan pendekatan arsitektur modular, validasi data di sisi server, dan penataan gaya visual yang konsisten.',
                'tools' => ['JavaScript', 'HTML5', 'CSS3', 'Pola MVC', 'Struktur Modular'],
                'features' => [
                    'Struktur kode terorganisir mengikuti standar arsitektur web modern',
                    'Validasi data formulir yang aman dan informatif',
                    'Desain antarmuka fleksibel untuk desktop maupun perangkat bergerak',
                    'Pengelolaan data interaktif dengan navigasi yang intuitif'
                ],
                'demo_url' => 'https://github.com/galang-rs/web-programing-afl4',
                'github_url' => 'https://github.com/galang-rs/web-programing-afl4',
                'is_featured' => false,
            ],
            [
                'id' => 5,
                'slug' => 'afl2-cloud-computing',
                'title' => 'AFL-2 Cloud Computing Architecture',
                'tagline' => 'Implementasi infrastruktur cloud computing terdistribusi berbasis TypeScript',
                'category' => 'cloud',
                'category_label' => 'Cloud dan Terdistribusi',
                'badge_color' => 'mint',
                'sticker_accent' => 'spark',
                'year' => '2025',
                'client' => 'Tugas Akademik Cloud Computing (galang-rs/AFL2-Cloud-Computing)',
                'role' => 'Pengembang Sistem',
                'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Campbell)',
                'image_source_url' => 'https://unsplash.com/photos/2x1qbYvDOGI',
                'description' => 'Proyek rekayasa sistem komputasi awan yang mengeksplorasi layanan terdistribusi, komunikasi antarmuka API, dan pengelolaan komputasi berbasis TypeScript.',
                'challenge' => 'Memastikan komunikasi antar layanan cloud berjalan stabil dengan skalabilitas yang baik saat beban permintaan meningkat.',
                'solution' => 'Merancang arsitektur microservices terpisah dengan format pertukaran data standar JSON dan penanganan galat terpusat.',
                'tools' => ['TypeScript', 'Cloud Infrastructure', 'REST API', 'JSON', 'Microservices'],
                'features' => [
                    'Arsitektur layanan komputasi awan berbasis TypeScript',
                    'Penanganan pertukaran data terdistribusi dengan format aman',
                    'Sistem pencatatan log aktivitas dan status kesehatan layanan',
                    'Konfigurasi environment adaptif untuk kebutuhan deployment'
                ],
                'demo_url' => 'https://github.com/galang-rs/AFL2-Cloud-Computing',
                'github_url' => 'https://github.com/galang-rs/AFL2-Cloud-Computing',
                'is_featured' => false,
            ],
            [
                'id' => 6,
                'slug' => 'game-car-interactive-simulation',
                'title' => 'Game Car Interactive Simulation',
                'tagline' => 'Simulasi permainan mobil interaktif berbasis canvas browser dan logika fisika ringan',
                'category' => 'game',
                'category_label' => 'Grafika dan Interaktif',
                'badge_color' => 'ember',
                'sticker_accent' => 'star',
                'year' => '2024',
                'client' => 'Proyek Terbuka GitHub (galang-rs/game-car)',
                'role' => 'Pengembang Grafika',
                'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Carl Raw)',
                'image_source_url' => 'https://unsplash.com/photos/m3hn2Kn5Bns',
                'description' => 'Eksperimen interaktif browser berupa simulasi kemudi kendaraan mobil yang memanfaatkan elemen HTML5 Canvas, deteksi tabrakan koordinat 2D, dan kendali input keyboard.',
                'challenge' => 'Menjaga animasi pergerakan kendaraan tetap mulus pada 60 frame per detik tanpa jeda input dari keyboard.',
                'solution' => 'Memanfaatkan loop requestAnimationFrame bawaan browser dan pembaruan posisi berbasis delta waktu.',
                'tools' => ['JavaScript', 'HTML5 Canvas', 'Game Loop', 'Physics 2D', 'Keyboard Events'],
                'features' => [
                    'Rendering grafika 2D interaktif langsung pada browser canvas',
                    'Sistem deteksi tabrakan objek rintangan dan perhitungan skor',
                    'Kendali kendaraan responsif menggunakan tombol arah keyboard',
                    'Logika loop animasi yang hemat daya komputasi perangkat'
                ],
                'demo_url' => 'https://github.com/galang-rs/game-car',
                'github_url' => 'https://github.com/galang-rs/game-car',
                'is_featured' => false,
            ]
        ];

        if ($category && $category !== 'all') {
            return array_values(array_filter($items, function ($item) use ($category) {
                return $item['category'] === $category;
            }));
        }

        return $items;
    }

    public static function findBySlug(string $slug): ?array
    {
        $items = self::getAll();
        foreach ($items as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }
        return null;
    }

    public static function getFeatured(int $limit = 3): array
    {
        $items = self::getAll();
        $featured = array_filter($items, function ($item) {
            return !empty($item['is_featured']);
        });

        return array_slice(array_values($featured), 0, $limit);
    }

    public static function getCategories(): array
    {
        return [
            ['slug' => 'all', 'label' => 'Semua Karya', 'count' => 6],
            ['slug' => 'network', 'label' => 'Jaringan dan Sistem', 'count' => 3],
            ['slug' => 'web', 'label' => 'Aplikasi Web', 'count' => 1],
            ['slug' => 'cloud', 'label' => 'Cloud Computing', 'count' => 1],
            ['slug' => 'game', 'label' => 'Grafika dan Game', 'count' => 1],
        ];
    }
}
