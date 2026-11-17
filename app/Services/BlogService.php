<?php

namespace App\Services;

/**
 * Class BlogService
 *
 * Service layer yang bertanggung jawab mengelola dan menyediakan artikel blog
 * teknologi milik Galang Reisduanto. Mendukung pencarian kata kunci dan filter kategori.
 */
class BlogService
{
    /**
     * Mengambil seluruh data artikel dengan opsi filter kategori dan pencarian keyword.
     *
     * @param string|null $category Filter berdasarkan slug kategori
     * @param string|null $search Kata kunci pencarian judul atau isi
     * @return array Daftar artikel yang sesuai kriteria
     */
    public static function getAll(?string $category = null, ?string $search = null): array
    {
        $posts = [
            [
                'id' => 1,
                'slug' => 'membangun-neobrutalism-ui-laravel-tailwind',
                'title' => 'Membangun Antarmuka Neobrutalisme Inflatable Sticker Universe dengan Tailwind CSS v4',
                'category' => 'design',
                'category_label' => 'UI/UX & Design',
                'badge_color' => 'electric',
                'published_at' => '12 Nov 2026',
                'read_time' => '5 min read',
                'author' => 'Galang Reisduanto',
                'author_role' => 'Web Developer dan System Engineer',
                // Sumber Foto: Unsplash - Foto oleh Milad Fakurian (https://unsplash.com/photos/E8UjrkgMwFo)
                'image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Milad Fakurian)',
                'image_source_url' => 'https://unsplash.com/photos/E8UjrkgMwFo',
                'summary' => 'Panduan komprehensif mengawinkan estetika sticker-book fisik, palet warna pastel saturasi tinggi, dan tipografi display Lateral 800 menggunakan Tailwind CSS v4 dan Blade Components.',
                'content' => [
                    'intro' => 'Dalam lanskap desain antarmuka modern yang sering kali seragam dan kaku, gaya neobrutalisme "Inflatable Sticker Universe" hadir sebagai nafas segar. Dengan memadukan kanvas kertas pastel, garis kontur hitam pekat 1px, tombol pill-shaped lembut, dan aksen stiker 3D inflatable yang ekspresif, kita dapat menciptakan identitas web yang tak terlupakan.',
                    'sections' => [
                        [
                            'heading' => '1. Filosofi Sticker-Book Logic',
                            'body' => 'Gaya visual Slush berakar pada metafora buku stiker masa kecil. Setiap elemen di halaman diperlakukan sebagai potongan fisik yang ditempel di atas kertas pastel (Sky Wash #dceeff, Paper White #ffffff, atau Concrete Gray #cccccc). Tidak ada gradien halus atau drop-shadow kabur; hierarki dibangun murni lewat kontras warna, border hitam tajam (1px solid #000000), dan radius lengkung ekstrem (1600px untuk pill controls, 20-40px untuk kartu).'
                        ],
                        [
                            'heading' => '2. Tipografi Skulptural: Lateral 800 & Leading Padat',
                            'body' => 'Kunci dari visual ini adalah memperlakukan teks display bukan sekadar sebagai kalimat yang dibaca, melainkan sebagai objek fisik skulptural. Dengan memanfaatkan ukuran masif (70px hingga 140px+) dan line-height yang sangat padat (0.78 - 0.85), kata-kata menumpuk padat dan tampak kokoh, berinteraksi harmonis dengan lengkungan pita 3D tubular Electric Blue.'
                        ],
                        [
                            'heading' => '3. Implementasi dengan Tailwind CSS v4 & Blade Components',
                            'body' => 'Menggunakan Tailwind v4, kita mendefinisikan token kustom dalam direktif @theme dan merangkum elemen berulang ke dalam Blade Components. Misalnya, komponen <x-sticker> mengontrol rotasi dinamis, palet warna stiker (Mint Pop, Lavender, Ember, Sunburst, Voltage Violet), dan ikon SVG dengan stroke kontur yang presisi.'
                        ]
                    ],
                    'conclusion' => 'Desain neobrutalist bukan berarti mengabaikan aksesibilitas atau kerapian kode. Dengan arsitektur Blade yang modular, kita mendapatkan tampilan visual yang luar biasa menonjol tanpa mengorbankan performa kecepatan muat.'
                ],
                'tags' => ['Neobrutalism', 'Tailwind CSS v4', 'UI/UX Design', 'Blade Components'],
                'is_featured' => true,
            ],
            [
                'id' => 2,
                'slug' => 'menguasai-pola-mvc-laravel-11',
                'title' => 'Menguasai Pola Arsitektur MVC di Laravel 11: Dari Routing Rapi hingga Blade Component Modular',
                'category' => 'laravel',
                'category_label' => 'Laravel & Backend',
                'badge_color' => 'mint',
                'published_at' => '08 Nov 2026',
                'read_time' => '7 min read',
                'author' => 'Galang Reisduanto',
                'author_role' => 'Web Developer dan System Engineer',
                // Sumber Foto: Unsplash - Foto oleh Fatos Bytyqi (https://unsplash.com/photos/Agx5_TLsII4)
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Fatos Bytyqi)',
                'image_source_url' => 'https://unsplash.com/photos/Agx5_TLsII4',
                'summary' => 'Bedah tuntas pemisahan tanggung jawab (Separation of Concerns) dalam ekosistem Laravel 11. Mengapa Controller ramping dan View terstruktur adalah standar industri yang wajib dikuasai.',
                'content' => [
                    'intro' => 'Banyak pengembang pemula tergoda menumpuk seluruh logika bisnis di dalam route closures atau langsung di dalam berkas template Blade. Padahal, kekuatan sejati Laravel terletak pada disiplin arsitektur Model-View-Controller (MVC) yang membuat basis kode dapat terus berkembang tanpa kekacauan.',
                    'sections' => [
                        [
                            'heading' => '1. Routing Deklaratif dan Bernama (Named Routes)',
                            'body' => 'Penggunaan Route::get() dengan penamaan eksplisit (->name(\'portfolio.show\')) memberikan kemudahan refactoring URL tanpa merusak tautan internal aplikasi. Ini mempermudah helper route(\'...\') menghasilkan tautan aman dan teruji.'
                        ],
                        [
                            'heading' => '2. Controller sebagai Konduktor Orkestrasi',
                            'body' => 'Controller tidak seharusnya menulis query SQL mentah atau mengolah logika tampilan rumit. Tugasnya murni menerima HTTP Request, mendelegasikan pemrosesan ke Service Layer atau Model, lalu mengembalikan Response berupa View yang disuplai data terstruktur.'
                        ],
                        [
                            'heading' => '3. Daya Magis Blade: Slots, Props, dan Reusability',
                            'body' => 'Dengan Blade Components (<x-portfolio-card>, <x-badge>, <x-navbar>), kita dapat menulis antarmuka deklaratif layaknya framework modern seperti React atau Vue, namun dieksekusi di sisi server dengan kecepatan native PHP 8.3.'
                        ]
                    ],
                    'conclusion' => 'Memahami arsitektur MVC bukan sekadar memenuhi kriteria tugas kuliah, tetapi fondasi vital sebelum Anda melangkah ke proyek skala industri di dunia kerja profesional.'
                ],
                'tags' => ['Laravel 11', 'Architecture', 'MVC Pattern', 'PHP 8.3'],
                'is_featured' => true,
            ],
            [
                'id' => 3,
                'slug' => 'vite-tailwind-v4-performa-modern',
                'title' => 'Mengapa Vite & Tailwind CSS v4 adalah Kombinasi Terbaik untuk Developer Laravel Modern',
                'category' => 'tooling',
                'category_label' => 'Frontend Tooling',
                'badge_color' => 'sunburst',
                'published_at' => '02 Nov 2026',
                'read_time' => '4 min read',
                'author' => 'Galang Reisduanto',
                'author_role' => 'Web Developer dan System Engineer',
                // Sumber Foto: Unsplash - Foto oleh Christopher Gower (https://unsplash.com/photos/m_HRfLhgABo)
                'image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Christopher Gower)',
                'image_source_url' => 'https://unsplash.com/photos/m_HRfLhgABo',
                'summary' => 'Menyelami inovasi mesin Oxide baru dari Tailwind CSS v4, integrasi instan dengan Vite HMR, dan bagaimana efisiensi bundle size berdampak langsung pada pengalaman pengguna.',
                'content' => [
                    'intro' => 'Era menunggu webpack melakukan compile selama puluhan detik sudah resmi berakhir. Kombinasi Laravel Vite Plugin dan Tailwind CSS v4 menghadirkan pengalaman pengembangan (Developer Experience) yang nyaris tanpa hambatan.',
                    'sections' => [
                        [
                            'heading' => '1. Tailwind v4 Tanpa postcss.config.js dan tailwind.config.js',
                            'body' => 'Perubahan paling radikal di Tailwind CSS v4 adalah arsitektur berbasis CSS-first. Konfigurasi tema langsung dideklarasikan di dalam file CSS utama dengan direktif @theme, menghilangkan kompleksitas file konfigurasi JavaScript terpisah.'
                        ],
                        [
                            'heading' => '2. Hot Module Replacement Sub-10ms',
                            'body' => 'Begitu Anda menyimpan file Blade template atau mengubah kelas utility CSS, perubahan seketika terpantul di browser tanpa reload penuh (full refresh), menjaga state form dan interaksi pengguna tetap utuh.'
                        ],
                        [
                            'heading' => '3. Tree-shaking Agresif dan CSS Ringan',
                            'body' => 'Tailwind v4 mendeteksi kelas utilitas secara instan dari seluruh file Blade dan PHP, menghasilkan file CSS produksi yang ukurannya sering kali di bawah 15KB gzipped.'
                        ]
                    ],
                    'conclusion' => 'Dengan menguasai alat pengembangan modern ini, produktivitas coding meningkat drastis sehingga Anda dapat memfokuskan energi pada estetika antarmuka dan kepuasan pengguna.'
                ],
                'tags' => ['Vite', 'Tailwind CSS v4', 'Performance', 'Developer Experience'],
                'is_featured' => true,
            ],
            [
                'id' => 4,
                'slug' => 'optimasi-core-web-vitals-google-lighthouse',
                'title' => 'Strategi Meraih Skor 100 di Google Lighthouse: Optimasi Core Web Vitals & Aksesibilitas',
                'category' => 'performance',
                'category_label' => 'Web Performance',
                'badge_color' => 'lavender',
                'published_at' => '27 Okt 2026',
                'read_time' => '6 min read',
                'author' => 'Galang Reisduanto',
                'author_role' => 'Web Developer dan System Engineer',
                // Sumber Foto: Unsplash - Foto oleh Carlos Muza (https://unsplash.com/photos/hpjSkU2UYSU)
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Carlos Muza)',
                'image_source_url' => 'https://unsplash.com/photos/hpjSkU2UYSU',
                'summary' => 'Langkah praktis menekan LCP (Largest Contentful Paint), meniadakan CLS (Cumulative Layout Shift), dan memastikan kontras rasio warna ramah pembaca pada website bergaya neobrutalism.',
                'content' => [
                    'intro' => 'Website dengan visual yang kaya dan warna-warni tetap harus cepat dibuka di koneksi lambat. Google Lighthouse dan Core Web Vitals menjadi tolok ukur standar dalam menguji kualitas performa dan keramahan aksesibilitas web.',
                    'sections' => [
                        [
                            'heading' => '1. Optimasi Gambar dan Format Modern (WebP / AVIF)',
                            'body' => 'Hindari memuat file JPG/PNG berukuran megabyte. Gunakan srcset responsif dan tag loading="lazy" untuk gambar di bawah lipatan layar (below-the-fold), serta prioritaskan fetchpriority="high" untuk hero image.'
                        ],
                        [
                            'heading' => '2. Mencegah Layout Shift (CLS) dengan Aspek Rasio Pasti',
                            'body' => 'Elemen kartu dan gambar stiker wajib memiliki dimensi eksplisit (width/height atau rasio aspect-video) sehingga browser dapat memesan ruang render sebelum aset media selesai diunduh.'
                        ],
                        [
                            'heading' => '3. Kontras Warna Neobrutalisme & Skema Warna A11y',
                            'body' => 'Ciri khas tema Slush adalah teks Carbon #000000 di atas latar pastel Sky Wash (#dceeff) atau Paper White (#ffffff), yang secara alamiah melampaui standar kontras WCAG AAA (rasio > 7:1).'
                        ]
                    ],
                    'conclusion' => 'Kecepatan dan aksesibilitas bukanlah fitur tambahan, melainkan pondasi dari profesionalisme sebuah personal branding website.'
                ],
                'tags' => ['Lighthouse', 'Core Web Vitals', 'SEO', 'Accessibility'],
                'is_featured' => false,
            ],
            [
                'id' => 5,
                'slug' => 'perjalanan-mahasiswa-menuju-web-artisan',
                'title' => 'Dari Bangku Kuliah Menuju Web Artisan: Refleksi Perjalanan Membangun Karya Nyata',
                'category' => 'career',
                'category_label' => 'Career & Story',
                'badge_color' => 'ember',
                'published_at' => '20 Okt 2026',
                'read_time' => '5 min read',
                'author' => 'Galang Reisduanto',
                'author_role' => 'Web Developer dan System Engineer',
                // Sumber Foto: Unsplash - Foto oleh Glenn Carstens-Peters (https://unsplash.com/photos/RLw-UC03Gwc)
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Glenn Carstens-Peters)',
                'image_source_url' => 'https://unsplash.com/photos/RLw-UC03Gwc',
                'summary' => 'Refleksi personal mengenai bagaimana portofolio daring, kurasi karya nyata, dan konsistensi menulis teknis membuka pintu peluang kolaborasi dan karier di industri teknologi.',
                'content' => [
                    'intro' => 'Personal branding bagi seorang software developer bukanlah tentang membual atau membuat klaim kosong, melainkan tentang menunjukkan bukti nyata dari apa yang bisa kita selesaikan (proof of work), cara kita memecahkan masalah, dan nilai-nilai estetika yang kita junjung tinggi.',
                    'sections' => [
                        [
                            'heading' => '1. Memilih Fokus Bidang Tanpa Terjebak Menjadi Kaku',
                            'body' => 'Fokus pada fondasi web (HTML, CSS, PHP, JavaScript) memberikan keluwesan untuk mengadopsi framework apa pun dengan cepat. Laravel menjadi pilihan ideal karena arsitekturnya yang elegan dan ekosistemnya yang sangat matang.'
                        ],
                        [
                            'heading' => '2. Kekuatan Studi Kasus Portofolio Mendalam',
                            'body' => 'Pemberi kerja atau klien tidak hanya ingin melihat screenshot aplikasi; mereka ingin tahu: Apa tantangan teknisnya? Mengapa memilih teknologi tersebut? Dan bagaimana solusinya mengatasi kendala nyata pengguna?'
                        ],
                        [
                            'heading' => '3. Menulis sebagai Bentuk Refleksi & Reputasi',
                            'body' => 'Dengan membagikan apa yang kita pelajari di blog, kita memperdalam pemahaman konsep teknis sendiri sekaligus memberikan kontribusi nyata bagi komunitas developer.'
                        ]
                    ],
                    'conclusion' => 'Setiap baris kode yang Anda tulis hari ini adalah batu bata pembangun reputasi digital Anda di masa depan.'
                ],
                'tags' => ['Personal Branding', 'Career Growth', 'Mindset', 'Student Journey'],
                'is_featured' => false,
            ],
            [
                'id' => 6,
                'slug' => 'mendesain-restful-api-laravel-11',
                'title' => 'Mendesain RESTful API yang Bersih, Tangguh, dan Self-Documenting dengan Laravel 11',
                'category' => 'laravel',
                'category_label' => 'API Engineering',
                'badge_color' => 'voltage',
                'published_at' => '14 Okt 2026',
                'read_time' => '6 min read',
                'author' => 'Galang Reisduanto',
                'author_role' => 'Web Developer dan System Engineer',
                // Sumber Foto: Unsplash - Foto oleh Markus Spiske (https://unsplash.com/photos/iar-afB0QQw)
                'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1200&q=80',
                'image_source' => 'Unsplash (Markus Spiske)',
                'image_source_url' => 'https://unsplash.com/photos/iar-afB0QQw',
                'summary' => 'Standar terbaik membangun endpoint API modern: Form Request Validation, API Resource Transformations, penanganan exception terpusat, dan status HTTP semantik.',
                'content' => [
                    'intro' => 'Sebuah API yang baik bagaikan pelayan restoran bintang lima: dapat diprediksi, merespons dengan cepat, dan memberikan informasi yang jelas bahkan ketika terjadi kendala.',
                    'sections' => [
                        [
                            'heading' => '1. Transformasi Data dengan Eloquent API Resources',
                            'body' => 'Jangan pernah mengembalikan raw database model secara langsung ke respons JSON. Gunakan API Resource untuk menyembunyikan kolom sensitif, memformat tanggal, dan menyusun nested relations dengan aman.'
                        ],
                        [
                            'heading' => '2. Validasi Deklaratif Menggunakan Form Requests',
                            'body' => 'Pindahkan aturan validasi input keluar dari controller ke berkas FormRequest khusus. Dengan cara ini, controller hanya memproses payload data yang sudah dipastikan valid dan tersanitasi.'
                        ],
                        [
                            'heading' => '3. Status Code HTTP yang Konsisten & Semantic Error Responses',
                            'body' => 'Gunakan status code 200, 201, 400, 404, 422, dan 500 secara tepat disertai struktur pesan JSON yang seragam memudahkan integrasi antarmuka.'
                        ]
                    ],
                    'conclusion' => 'Arsitektur API yang solid adalah fondasi dari seluruh aplikasi web dan mobile modern.'
                ],
                'tags' => ['REST API', 'Laravel 11', 'Backend', 'JSON Resources'],
                'is_featured' => false,
            ]
        ];

        if ($category && $category !== 'all') {
            $posts = array_values(array_filter($posts, function ($post) use ($category) {
                return $post['category'] === $category;
            }));
        }

        if ($search) {
            $query = strtolower(trim($search));
            $posts = array_values(array_filter($posts, function ($post) use ($query) {
                return str_contains(strtolower($post['title']), $query)
                    || str_contains(strtolower($post['summary']), $query)
                    || in_array($query, array_map('strtolower', $post['tags']));
            }));
        }

        return $posts;
    }

    /**
     * Mencari data artikel blog berdasarkan slug URL unik.
     *
     * @param string $slug Slug URL artikel
     * @return array|null Data artikel lengkap atau null jika tidak ditemukan
     */
    public static function findBySlug(string $slug): ?array
    {
        $posts = self::getAll();
        foreach ($posts as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }
        return null;
    }

    /**
     * Mengambil daftar artikel terbaru untuk ditampilkan di Beranda.
     *
     * @param int $limit Jumlah artikel (default: 3)
     * @return array
     */
    public static function getLatest(int $limit = 3): array
    {
        $posts = self::getAll();
        return array_slice($posts, 0, $limit);
    }

    /**
     * Mengambil daftar kategori blog beserta jumlah artikel di dalamnya.
     *
     * @return array
     */
    public static function getCategories(): array
    {
        return [
            ['slug' => 'all', 'label' => 'Semua Artikel', 'count' => 6],
            ['slug' => 'design', 'label' => 'UI/UX & Design', 'count' => 1],
            ['slug' => 'laravel', 'label' => 'Laravel & Backend', 'count' => 2],
            ['slug' => 'tooling', 'label' => 'Frontend Tooling', 'count' => 1],
            ['slug' => 'performance', 'label' => 'Web Performance', 'count' => 1],
            ['slug' => 'career', 'label' => 'Career & Reflection', 'count' => 1],
        ];
    }
}
