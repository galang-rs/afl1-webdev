@extends('layouts.app')

@section('title', 'Galeri Portofolio Proyek Nyata | Galang Reisduanto')

@section('content')

{{-- ========================================================================= --}}
{{-- 1. HEADER SECTION (Sky Wash #dceeff Ground)                               --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#dceeff] border-b border-black py-16 md:py-20 relative overflow-hidden">
    <div class="absolute top-8 inset-x-0 flex items-center justify-center opacity-60 pointer-events-none z-0">
        <x-ribbon-3d variant="banner" class="max-w-[1100px]" />
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center">
        <x-badge color="sunburst" size="md" class="mb-4">Repositori Publik GitHub @galang-rs</x-badge>
        <h1 class="font-display text-fluid-page text-black uppercase">
            PORTOFOLIO
        </h1>
        <p class="mt-4 text-base sm:text-xl font-medium text-black max-w-2xl tracking-tight leading-relaxed">
            Kumpulan proyek nyata dari repositori resmi GitHub @galang-rs meliputi protokol jaringan, sistem proxy, dan aplikasi web.
        </p>

        {{-- Filter Pills Category Bar --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-2 select-none">
            @foreach($categories as $cat)
                @php
                    $isActive = ($currentCategory === $cat['slug']);
                @endphp
                <a href="{{ route('portfolio.index', ['category' => $cat['slug']]) }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-black text-xs md:text-sm font-bold uppercase tracking-wider transition-all duration-150 {{ $isActive ? 'bg-black text-white' : 'bg-white text-black hover:bg-[#e9e9e9]' }}">
                    <span>{{ $cat['label'] }}</span>
                    <span class="text-[11px] px-1.5 py-0.2 rounded-full border border-current {{ $isActive ? 'bg-white text-black' : 'bg-[#e9e9e9] text-black' }}">
                        {{ $cat['count'] }}
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================================================= --}}
{{-- 2. PROJECTS GRID (Paper White #ffffff Ground)                             --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(count($projects) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($projects as $project)
                    <x-portfolio-card :project="$project" />
                @endforeach
            </div>
        @else
            <div class="sticker-card p-12 text-center max-w-xl mx-auto bg-[#dceeff]">
                <x-sticker type="star" color="sunburst" size="lg" class="mx-auto mb-4" />
                <h3 class="font-display text-fluid-card text-black uppercase mb-2">Belum Ada Proyek</h3>
                <p class="text-sm text-neutral-700 mb-6">Tidak ditemukan proyek untuk kategori ini.</p>
                <x-pill-button href="{{ route('portfolio.index') }}" variant="filled" size="md">
                    <span>Lihat Semua Proyek</span>
                </x-pill-button>
            </div>
        @endif

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 3. BOTTOM CTA BANNER (Concrete Gray #cccccc)                              --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#cccccc] py-16 md:py-20">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center">
        <h3 class="font-display text-fluid-section text-black uppercase mb-4">
            INGIN BERKOLABORASI PADA PROYEK NYATA?
        </h3>
        <p class="text-sm md:text-base text-neutral-800 max-w-xl mb-8 font-normal">
            Buka peluang kerja sama atau diskusikan ide proyek rekayasa sistem dan aplikasi web.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <x-pill-button href="{{ route('contact.index') }}" variant="filled" size="lg">
                <span>Hubungi Saya Sekarang</span>
                <span>-></span>
            </x-pill-button>
            <x-pill-button href="https://github.com/galang-rs" target="_blank" variant="ghost" size="lg">
                <span>Kunjungi GitHub @galang-rs</span>
            </x-pill-button>
        </div>
    </div>
</section>

@endsection
