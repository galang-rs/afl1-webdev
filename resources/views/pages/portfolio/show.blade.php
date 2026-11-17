@extends('layouts.app')

@section('title', $project['title'] . ' | Detail Portofolio Galang Reisduanto')

@section('content')

{{-- ========================================================================= --}}
{{-- 1. PROJECT HERO / HEADER (Sky Wash #dceeff)                               --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#dceeff] border-b border-black py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Navigation & Back button --}}
        <div class="mb-8 flex items-center justify-between">
            <x-pill-button href="{{ route('portfolio.index') }}" variant="ghost" size="sm">
                <span><-</span>
                <span>Kembali ke Galeri Portofolio</span>
            </x-pill-button>

            <x-badge :color="$project['badge_color']" size="sm">
                {{ $project['category_label'] }}
            </x-badge>
        </div>

        {{-- Project Title & Tagline --}}
        <div class="max-w-4xl">
            <h1 class="font-display text-fluid-detail text-black uppercase mb-4">
                {{ $project['title'] }}
            </h1>
            <p class="text-base sm:text-2xl font-medium text-black max-w-2xl tracking-tight leading-snug">
                {{ $project['tagline'] }}
            </p>
        </div>

        {{-- Project Metadata Bar --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-10">
            <div class="sticker-card p-4 bg-white flex flex-col justify-center">
                <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-500">Tahun Pembuatan</span>
                <span class="text-sm md:text-base font-black text-black">{{ $project['year'] }}</span>
            </div>
            <div class="sticker-card p-4 bg-white flex flex-col justify-center">
                <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-500">Peran Pengembang</span>
                <span class="text-sm md:text-base font-black text-black">{{ $project['role'] }}</span>
            </div>
            <div class="sticker-card p-4 bg-white flex flex-col justify-center">
                <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-500">Sumber Repositori</span>
                <span class="text-sm md:text-base font-black text-black">{{ $project['client'] }}</span>
            </div>
            <div class="sticker-card p-4 bg-white flex flex-col justify-center">
                <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-500">Kategori Proyek</span>
                <span class="text-sm md:text-base font-black text-black">{{ $project['category_label'] }}</span>
            </div>
        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 2. MAIN SHOWCASE & CASE STUDY (Paper White #ffffff)                       --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Large Feature Image --}}
        <div class="relative w-full aspect-[16/9] rounded-[24px] md:rounded-[36px] border border-black overflow-hidden bg-[#e9e9e9] mb-4">
            <img src="{{ $project['image'] }}" 
                 alt="{{ $project['title'] }}" 
                 class="w-full h-full object-cover">
            
            <div class="absolute top-4 right-4">
                <x-sticker :type="$project['sticker_accent'] ?? 'star'" :color="$project['badge_color']" size="lg" rotate="6" />
            </div>
        </div>

        {{-- Sumber Foto Image Attribution --}}
        <div class="mb-14 text-xs text-neutral-600 font-medium">
            <span>* Sumber Foto Proyek: </span>
            <a href="{{ $project['image_source_url'] }}" target="_blank" rel="noopener noreferrer" class="font-bold underline text-black hover:text-blue-700">
                {{ $project['image_source'] }}
            </a>
            <span class="text-neutral-400"> (Lisensi Unsplash Free to Use)</span>
        </div>

        {{-- Case Study Narrative Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14">
            
            {{-- Col 1: Overview & Challenges (8 cols) --}}
            <div class="lg:col-span-8 flex flex-col gap-10">
                
                {{-- Overview --}}
                <div>
                    <h2 class="font-display text-fluid-card text-black uppercase mb-3">
                        Deskripsi dan Latar Belakang
                    </h2>
                    <p class="text-base sm:text-lg text-neutral-800 leading-relaxed font-normal">
                        {{ $project['description'] }}
                    </p>
                </div>

                {{-- The Challenge & The Solution --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="sticker-card p-6 md:p-8 bg-[#ffd731]/30 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-black bg-[#ffd731] px-2.5 py-1 rounded-full border border-black inline-block mb-3">
                                Tantangan Rekayasa
                            </span>
                            <h3 class="text-lg font-black uppercase text-black mb-2">Kendala Utama</h3>
                            <p class="text-sm text-neutral-800 leading-relaxed font-normal">
                                {{ $project['challenge'] }}
                            </p>
                        </div>
                    </div>

                    <div class="sticker-card p-6 md:p-8 bg-[#55db9c]/30 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-black uppercase tracking-wider text-black bg-[#55db9c] px-2.5 py-1 rounded-full border border-black inline-block mb-3">
                                Solusi Implementasi
                            </span>
                            <h3 class="text-lg font-black uppercase text-black mb-2">Solusi Rekayasa</h3>
                            <p class="text-sm text-neutral-800 leading-relaxed font-normal">
                                {{ $project['solution'] }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Key Features List --}}
                <div>
                    <h2 class="font-display text-fluid-card text-black uppercase mb-4">
                        Fitur Utama Proyek
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($project['features'] as $feat)
                            <div class="sticker-card p-4 bg-[#e9e9e9] flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full border border-black bg-[#55db9c] flex items-center justify-center font-bold text-xs shrink-0">
                                    +
                                </span>
                                <span class="text-sm font-bold text-black uppercase tracking-tight">
                                    {{ $feat }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Col 2: Spesifikasi Digunakan (4 cols) --}}
            <div class="lg:col-span-4 flex flex-col gap-6">
                
                {{-- Action Box --}}
                <div class="sticker-card p-6 md:p-8 bg-[#dceeff] flex flex-col gap-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-black">Akses Repositori</span>
                    <h3 class="font-display text-fluid-sm text-black uppercase">Kode Sumber Terbuka</h3>
                    <p class="text-xs text-neutral-700 font-normal">
                        Kunjungi repositori publik resmi proyek ini di akun GitHub @galang-rs.
                    </p>

                    <div class="flex flex-col gap-2.5 pt-2">
                        @if(!empty($project['demo_url']))
                            <x-pill-button href="{{ $project['demo_url'] }}" target="_blank" variant="filled" size="md" class="w-full">
                                <span>Buka Repositori GitHub</span>
                                <span>-></span>
                            </x-pill-button>
                        @endif

                        <x-pill-button href="https://wa.me/628123456789" target="_blank" variant="mint" size="md" class="w-full">
                            <span>Tanyakan via WhatsApp</span>
                        </x-pill-button>
                    </div>
                </div>

                {{-- Spesifikasi dan Keahlian Digunakan --}}
                <div class="sticker-card p-6 md:p-8 bg-white flex flex-col gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-neutral-500">Spesifikasi dan Keahlian Digunakan</span>
                    <div class="flex flex-wrap gap-2 pt-1">
                        @foreach($project['tools'] as $item)
                            <span class="px-3 py-1.5 rounded-full border border-black bg-white text-xs font-bold uppercase tracking-wider text-black hover:bg-[#ffd731] transition-colors">
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                </div>

                {{-- QR Card --}}
                <x-qr-card label="PROJECT REPO" sublabel="GITHUB GALANG" :url="$project['github_url']" />

            </div>

        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 3. RELATED PROJECTS (Concrete Gray #cccccc)                               --}}
{{-- ========================================================================= --}}
@if(count($relatedProjects) > 0)
<section class="w-full bg-[#cccccc] py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <h2 class="font-display text-fluid-card text-black uppercase">
                PROYEK LAINNYA
            </h2>
            <x-pill-button href="{{ route('portfolio.index') }}" variant="ghost" size="sm">
                <span>Lihat Semua</span>
                <span>-></span>
            </x-pill-button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($relatedProjects as $rel)
                <x-portfolio-card :project="$rel" />
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
