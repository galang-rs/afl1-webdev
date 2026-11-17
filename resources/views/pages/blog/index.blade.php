@extends('layouts.app')

@section('title', 'Blog dan Catatan Teknis | Galang Reisduanto')

@section('content')

{{-- ========================================================================= --}}
{{-- 1. HEADER SECTION (Lavender #e9ccff Canvas)                              --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#e9ccff] border-b border-black py-16 md:py-20 relative overflow-hidden">
    <div class="absolute top-8 inset-x-0 flex items-center justify-center opacity-60 pointer-events-none z-0">
        <x-ribbon-3d variant="loop" class="max-w-[1000px]" />
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center select-none">
        <x-badge color="mint" size="md" class="mb-4">Artikel dan Catatan</x-badge>
        <h1 class="font-display text-fluid-page text-black uppercase">
            BLOG DAN ARTIKEL
        </h1>
        <p class="mt-4 text-base sm:text-xl font-medium text-black max-w-2xl tracking-tight leading-relaxed">
            Tulisan mengenai arsitektur sistem, protokol jaringan, dan perjalanan belajar di Universitas Ciputra Surabaya.
        </p>

        {{-- Search Input Bar --}}
        <form action="{{ route('blog.index') }}" method="GET" class="mt-8 w-full max-w-lg">
            <div class="relative flex items-center">
                <input type="text" 
                       name="q" 
                       value="{{ $search ?? '' }}"
                       placeholder="Cari artikel (misal: arsitektur, neobrutalisme, jaringan)..." 
                       class="w-full px-5 py-3 rounded-full border border-black bg-white text-sm text-black placeholder-neutral-500 focus:outline-none focus:ring-2 focus:ring-black">
                <button type="submit" 
                        class="absolute right-1.5 px-4 py-2 rounded-full border border-black bg-black text-white text-xs font-bold uppercase tracking-wider hover:bg-neutral-800 transition-colors">
                    Cari
                </button>
            </div>
            @if($currentCategory !== 'all')
                <input type="hidden" name="category" value="{{ $currentCategory }}">
            @endif
        </form>

        {{-- Categories Filter Pills --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-2 select-none">
            @foreach($categories as $cat)
                @php
                    $isActive = ($currentCategory === $cat['slug']);
                @endphp
                <a href="{{ route('blog.index', ['category' => $cat['slug'], 'q' => $search]) }}" 
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
{{-- 2. ARTICLES GRID (Paper White #ffffff Ground)                             --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        @if($search)
            <div class="mb-8 flex items-center justify-between">
                <p class="text-sm font-bold uppercase tracking-wider text-neutral-600">
                    Hasil pencarian untuk: <span class="text-black bg-[#ffd731] px-2 py-0.5 rounded border border-black">"{{ $search }}"</span>
                </p>
                <a href="{{ route('blog.index') }}" class="text-xs font-bold uppercase tracking-wider underline text-neutral-700 hover:text-black">
                    Reset Pencarian
                </a>
            </div>
        @endif

        @if(count($articles) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @foreach($articles as $article)
                    <x-blog-card :article="$article" />
                @endforeach
            </div>
        @else
            <div class="sticker-card p-12 text-center max-w-xl mx-auto bg-[#e9ccff]">
                <x-sticker type="star" color="voltage" size="lg" class="mx-auto mb-4" />
                <h3 class="font-display text-fluid-card text-black uppercase mb-2">Artikel Tidak Ditemukan</h3>
                <p class="text-sm text-neutral-700 mb-6">Tidak ada artikel yang cocok dengan kata kunci pencarian Anda.</p>
                <x-pill-button href="{{ route('blog.index') }}" variant="filled" size="md">
                    <span>Lihat Semua Artikel</span>
                </x-pill-button>
            </div>
        @endif

    </div>
</section>

@endsection
