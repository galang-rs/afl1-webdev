@extends('layouts.app')

@section('title', 'Galang Reisduanto | Web Developer dan System Engineer')

@section('content')

{{-- ========================================================================= --}}
{{-- 1. HERO SECTION (Sky Wash #dceeff Full-Bleed Pastel Canvas)                --}}
{{-- ========================================================================= --}}
<section class="relative w-full bg-[#dceeff] border-b border-black overflow-hidden pt-12 pb-20 md:pt-16 md:pb-28">
    
    {{-- Inflatable 3D Ribbon: Diletakkan khusus di belakang judul besar tanpa menabrak teks --}}
    <div class="absolute top-16 md:top-20 inset-x-0 flex items-center justify-center opacity-70 pointer-events-none z-0">
        <x-ribbon-3d variant="curve" class="max-w-[1100px] scale-100 md:scale-110" />
    </div>

    {{-- Floating Illustrated Stickers (Confetti Effect di sekitar area hero) --}}
    <div class="absolute top-10 left-4 sm:left-10 lg:left-20 z-10 hidden sm:block">
        <x-sticker type="rocket" color="ember" size="lg" rotate="-12" />
    </div>
    <div class="absolute top-14 right-6 sm:right-12 lg:right-24 z-10 hidden sm:block">
        <x-sticker type="star" color="sunburst" size="lg" rotate="12" />
    </div>
    <div class="absolute bottom-12 left-6 sm:left-16 lg:left-32 z-10 hidden md:block">
        <x-sticker type="wallet" color="voltage" size="md" rotate="6" />
    </div>
    <div class="absolute bottom-16 right-8 sm:right-20 lg:right-36 z-10 hidden md:block">
        <x-sticker type="check" color="mint" size="lg" rotate="-6" />
    </div>

    {{-- Hero Container --}}
    <div class="relative z-10 max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center">
        
        {{-- Avatar & Identity Pill --}}
        <div class="inline-flex items-center gap-3 p-1.5 pr-5 rounded-full border border-black bg-white mb-6 select-none shadow-none">
            {{-- Foto Profil Laki-laki (Sumber: Unsplash oleh Jurica Koletic) --}}
            <div class="w-11 h-11 rounded-full border border-black bg-[#ffd731] flex items-center justify-center overflow-hidden shrink-0">
                <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=250&q=80" 
                     alt="Foto Profil Galang Reisduanto" 
                     class="w-full h-full object-cover">
            </div>
            <div class="text-left">
                <span class="text-xs md:text-sm font-black uppercase tracking-wider block text-black">Galang Reisduanto</span>
                <span class="text-[10px] md:text-[11px] font-bold text-neutral-600 block uppercase tracking-tight">Web Developer | Universitas Ciputra Surabaya</span>
            </div>
        </div>

        {{-- Lateral 800 Display Headline --}}
        <div class="relative my-4 md:my-6 select-none max-w-5xl mx-auto">
            <h1 class="font-display text-fluid-hero text-black tracking-tight uppercase break-words">
                GALANG REISDUANTO
            </h1>
        </div>

        {{-- Tagline Subhead --}}
        <p class="mt-3 md:mt-5 text-base sm:text-xl md:text-2xl font-medium text-black max-w-3xl tracking-tight leading-snug">
            Crafting <span class="bg-[#ffd731] px-2.5 py-0.5 border border-black rounded-[10px]">Inflatable</span> Digital Worlds, Resilient Systems & Engaging Interfaces.
        </p>

        {{-- Sub-description --}}
        <p class="mt-4 text-sm sm:text-base text-neutral-700 max-w-xl font-normal leading-relaxed">
            Mahasiswa S1 Informatika di Universitas Ciputra Surabaya yang berfokus pada rekayasa sistem jaringan, pengembangan aplikasi web, dan perancangan antarmuka neobrutalisme interaktif.
        </p>

        {{-- Action Buttons --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-3.5 select-none">
            <x-pill-button href="{{ route('portfolio.index') }}" variant="filled" size="lg">
                <span>Jelajahi Portofolio Nyata</span>
                <span>-></span>
            </x-pill-button>

            <x-pill-button href="{{ route('about') }}" variant="ghost" size="lg">
                <span>Profil dan Keahlian</span>
            </x-pill-button>

            <x-pill-button href="{{ route('blog.index') }}" variant="ghost" size="lg">
                <span>Baca Artikel Blog</span>
            </x-pill-button>
        </div>

        {{-- Bidang Keahlian --}}
        <div class="mt-12 flex flex-wrap items-center justify-center gap-2 select-none">
            @foreach($skillsPreview as $skill)
                @php
                    $dotColors = [
                        'mint' => 'bg-[#55db9c]',
                        'electric' => 'bg-[#4da2ff]',
                        'sunburst' => 'bg-[#ffd731]',
                        'lavender' => 'bg-[#e9ccff]',
                        'ember' => 'bg-[#fb4903]',
                        'voltage' => 'bg-[#5c4ade]',
                    ];
                    $dot = $dotColors[$skill['color']] ?? 'bg-black';
                @endphp
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-black bg-white text-xs font-bold uppercase tracking-wider hover:-translate-y-0.5 transition-transform">
                    <span class="w-2 h-2 rounded-full border border-black {{ $dot }}"></span>
                    <span>{{ $skill['name'] }}</span>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 2. METRICS (Concrete Gray #cccccc Surface)                               --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#cccccc] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-16">
            @foreach($stats as $stat)
                @php
                    $colors = [
                        'mint' => 'bg-[#55db9c]',
                        'sunburst' => 'bg-[#ffd731]',
                        'lavender' => 'bg-[#e9ccff]',
                        'electric' => 'bg-[#4da2ff]',
                    ];
                    $bg = $colors[$stat['accent']] ?? 'bg-white';
                @endphp
                <div class="sticker-card p-6 md:p-8 flex flex-col justify-between items-start {{ $bg }} text-black">
                    <span class="font-display text-fluid-stat leading-none text-black">
                        {{ $stat['value'] }}
                    </span>
                    <span class="text-xs md:text-sm font-bold uppercase tracking-wider mt-4 border-t border-black/20 pt-3 w-full">
                        {{ $stat['label'] }}
                    </span>
                </div>
            @endforeach
        </div>

        {{-- Intro Statement Box --}}
        <div class="sticker-card p-8 md:p-12 bg-white flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
            <div class="max-w-2xl">
                <x-badge color="voltage" size="sm" class="mb-3">Komitmen Kualitas</x-badge>
                <h3 class="font-display text-fluid-card uppercase leading-tight text-black">
                    Kode Bersih, Rekayasa Andal, dan Antarmuka Berkarakter
                </h3>
                <p class="mt-4 text-sm md:text-base text-neutral-700 leading-relaxed font-normal">
                    Setiap sistem dan aplikasi dirancang dengan mengutamakan performa, arsitektur modular, dan kepuasan pengguna akhir. Melalui proyek terbuka di GitHub dan tugas akademik di Universitas Ciputra Surabaya, saya terus mengasah kemampuan dalam memecahkan masalah komputasi nyata.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-3 shrink-0 w-full lg:w-auto">
                <x-pill-button href="{{ route('about') }}" variant="filled" size="lg" class="w-full sm:w-auto">
                    <span>Baca Profil Lengkap</span>
                    <span>-></span>
                </x-pill-button>
                <x-pill-button href="https://wa.me/628123456789" target="_blank" variant="mint" size="lg" class="w-full sm:w-auto">
                    <span>Hubungi via WhatsApp</span>
                </x-pill-button>
            </div>
        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 3. FEATURED PORTFOLIO SECTION (Paper White #ffffff Background)            --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
            <div>
                <x-badge color="sunburst" size="md" class="mb-3">Karya Nyata Pilihan</x-badge>
                <h2 class="font-display text-fluid-section text-black uppercase">
                    PROYEK UNGGULAN
                </h2>
                <p class="text-sm md:text-base text-neutral-600 mt-4 max-w-xl">
                    Kurasi proyek nyata dari repositori publik GitHub @galang-rs yang mengimplementasikan protokol jaringan dan aplikasi web.
                </p>
            </div>

            <x-pill-button href="{{ route('portfolio.index') }}" variant="ghost" size="md" class="self-start md:self-end">
                <span>Lihat Semua Proyek (6 Karya)</span>
                <span>-></span>
            </x-pill-button>
        </div>

        {{-- Portfolio Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($featuredProjects as $project)
                <x-portfolio-card :project="$project" :featured="true" />
            @endforeach
        </div>

    </div>
</section>

{{-- Horizontal Interlude Marquee --}}
<x-marquee bg="bg-[#4da2ff]" textColor="text-black" border="border-y border-black" />

{{-- ========================================================================= --}}
{{-- 4. LATEST BLOG ARTICLES (Lavender Pastel #e9ccff Canvas)                  --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#e9ccff] border-b border-black py-20 md:py-28">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
            <div>
                <x-badge color="mint" size="md" class="mb-3">Catatan dan Pembelajaran</x-badge>
                <h2 class="font-display text-fluid-section text-black uppercase">
                    ARTIKEL TERBARU
                </h2>
                <p class="text-sm md:text-base text-neutral-800 mt-4 max-w-xl">
                    Tulisan mengenai arsitektur perangkat lunak, protokol jaringan, dan perjalanan belajar di kampus.
                </p>
            </div>

            <x-pill-button href="{{ route('blog.index') }}" variant="filled" size="md" class="self-start md:self-end">
                <span>Semua Artikel Blog</span>
                <span>-></span>
            </x-pill-button>
        </div>

        {{-- Blog Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($latestArticles as $article)
                <x-blog-card :article="$article" />
            @endforeach
        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 5. CALL TO ACTION & CONNECT (Sky Wash #dceeff Ground)                     --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#dceeff] py-20 md:py-28 relative overflow-hidden">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="sticker-card-lg p-8 sm:p-12 md:p-16 bg-white border border-black flex flex-col lg:flex-row items-center justify-between gap-10 relative">
            
            <div class="max-w-2xl">
                <x-badge color="ember" size="md" class="mb-4">Mulai Kolaborasi</x-badge>
                <h2 class="font-display text-fluid-card text-black uppercase mb-5">
                    PUNYA PROYEK MENARIK ATAU INGIN BERDISKUSI?
                </h2>
                <p class="text-neutral-700 text-sm md:text-base leading-relaxed">
                    Saya selalu terbuka untuk berdiskusi seputar peluang magang, proyek rekayasa sistem, pengembangan aplikasi web, ataupun riset jaringan komputer.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <x-pill-button href="{{ route('contact.index') }}" variant="filled" size="lg">
                        <span>Kirim Pesan Sekarang</span>
                        <span>-></span>
                    </x-pill-button>
                    <x-pill-button href="https://wa.me/628123456789" target="_blank" variant="mint" size="lg">
                        <span>WhatsApp: 08123456789</span>
                    </x-pill-button>
                </div>
            </div>

            {{-- Slush Signature QR Card --}}
            <div class="shrink-0 w-full sm:w-auto">
                <x-qr-card label="GITHUB REPO" sublabel="KUNJUNGI KODE" url="https://github.com/galang-rs" />
            </div>

        </div>
    </div>
</section>

@endsection
