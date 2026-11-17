@extends('layouts.app')

@section('title', $article['title'] . ' | Blog Galang Reisduanto')

@section('content')

{{-- ========================================================================= --}}
{{-- 1. ARTICLE HEADER (Sky Wash #dceeff Surface)                              --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#dceeff] border-b border-black py-12 md:py-20">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Back Link & Category --}}
        <div class="flex items-center justify-between mb-8">
            <x-pill-button href="{{ route('blog.index') }}" variant="ghost" size="sm">
                <span><-</span>
                <span>Kembali ke Indeks Blog</span>
            </x-pill-button>

            <x-badge :color="$article['badge_color']" size="sm">
                {{ $article['category_label'] }}
            </x-badge>
        </div>

        {{-- Article Title & Metadata --}}
        <div class="max-w-4xl">
            <h1 class="font-display text-fluid-detail text-black uppercase mb-6">
                {{ $article['title'] }}
            </h1>

            <div class="flex flex-wrap items-center gap-4 text-xs font-bold uppercase tracking-wider text-black">
                <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-full border border-black">
                    <span class="w-2 h-2 rounded-full bg-[#55db9c] border border-black"></span>
                    <span>Oleh {{ $article['author'] }}</span>
                </div>
                <div class="bg-white px-3 py-1.5 rounded-full border border-black text-neutral-600">
                    Dipublikasikan: {{ $article['published_at'] }}
                </div>
                <div class="bg-[#ffd731] px-3 py-1.5 rounded-full border border-black text-black">
                    Waktu Baca: {{ $article['read_time'] }}
                </div>
            </div>
        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 2. ARTICLE BODY (Paper White #ffffff Ground)                              --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14">
            
            {{-- Main Content Column (8 cols) --}}
            <article class="lg:col-span-8 flex flex-col gap-8">
                
                {{-- Hero Thumbnail with 1px black outline --}}
                <div class="relative w-full aspect-[16/9] rounded-[24px] md:rounded-[36px] border border-black overflow-hidden bg-[#e9e9e9]">
                    <img src="{{ $article['image'] }}" 
                         alt="{{ $article['title'] }}" 
                         class="w-full h-full object-cover">
                    
                    <div class="absolute top-4 right-4">
                        <x-sticker type="spark" :color="$article['badge_color']" size="lg" rotate="-6" />
                    </div>
                </div>

                {{-- Sumber Foto Image Attribution --}}
                <div class="text-xs text-neutral-600 font-medium -mt-4">
                    <span>* Sumber Foto Artikel: </span>
                    <a href="{{ $article['image_source_url'] }}" target="_blank" rel="noopener noreferrer" class="font-bold underline text-black hover:text-blue-700">
                        {{ $article['image_source'] }}
                    </a>
                    <span class="text-neutral-400"> (Lisensi Unsplash Free to Use)</span>
                </div>

                {{-- Intro Lead --}}
                <div class="p-6 md:p-8 rounded-[20px] border border-black bg-[#dceeff]/50">
                    <p class="text-base sm:text-xl font-medium text-black leading-relaxed">
                        {{ $article['content']['intro'] }}
                    </p>
                </div>

                {{-- Article Body Sections --}}
                @foreach($article['content']['sections'] as $section)
                    <div class="flex flex-col gap-3">
                        <h2 class="font-display text-fluid-card text-black uppercase leading-tight mt-4">
                            {{ $section['heading'] }}
                        </h2>
                        <p class="text-base sm:text-lg text-neutral-800 leading-relaxed font-normal">
                            {{ $section['body'] }}
                        </p>
                    </div>
                @endforeach

                {{-- Key Takeaways Callout Box --}}
                <div class="sticker-card p-6 md:p-8 bg-[#ffd731]/30 my-4">
                    <div class="flex items-center gap-2 mb-3">
                        <x-sticker type="check" color="sunburst" size="sm" />
                        <h3 class="text-lg font-black uppercase text-black">Kesimpulan</h3>
                    </div>
                    <p class="text-sm md:text-base text-neutral-800 leading-relaxed font-normal">
                        {{ $article['content']['conclusion'] }}
                    </p>
                </div>

                {{-- Tags Bar --}}
                <div class="pt-6 border-t border-black/10 flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-neutral-500 mr-2">Topik Terkait:</span>
                    @foreach($article['tags'] as $tag)
                        <span class="px-3 py-1 rounded-full border border-black bg-white text-xs font-bold uppercase tracking-wider text-black hover:bg-[#e9ccff] transition-colors">
                            #{{ $tag }}
                        </span>
                    @endforeach
                </div>

                {{-- Author Bio Card (Galang Reisduanto) --}}
                <div class="sticker-card p-6 md:p-8 bg-[#e9e9e9] flex flex-col sm:flex-row items-center gap-6 mt-6">
                    <div class="w-20 h-20 rounded-full border border-black overflow-hidden bg-[#ffd731] shrink-0">
                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=200&q=80" 
                             alt="Galang Reisduanto" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex flex-col text-center sm:text-left">
                        <span class="text-xs font-black uppercase tracking-wider text-neutral-600">Tentang Penulis</span>
                        <h3 class="text-xl font-black uppercase text-black leading-tight mt-0.5">{{ $article['author'] }}</h3>
                        <p class="text-xs text-neutral-700 mt-2 font-normal leading-relaxed">
                            Mahasiswa S1 Informatika di Universitas Ciputra Surabaya (alumni SMAN 10 Surabaya). Aktif mengembangkan proyek terbuka di GitHub @galang-rs dan mengeksplorasi rekayasa sistem.
                        </p>
                    </div>
                </div>

            </article>

            {{-- Sidebar Column (4 cols) --}}
            <aside class="lg:col-span-4 flex flex-col gap-6">
                
                {{-- Share Box --}}
                <div class="sticker-card p-6 md:p-8 bg-[#e9ccff] flex flex-col gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-black">Bagikan Artikel</span>
                    <h3 class="font-display text-fluid-sm text-black uppercase">Share to Network</h3>
                    <p class="text-xs text-neutral-700 font-normal">
                        Bantu sebarkan artikel ini jika bermanfaat bagi rekan pengembang Anda.
                    </p>

                    <div class="flex flex-wrap gap-2 pt-2">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article['title']) }}&url={{ urlencode(url()->current()) }}" 
                           target="_blank" 
                           class="flex-1 text-center py-2 px-3 rounded-full border border-black bg-white text-xs font-bold uppercase tracking-wider hover:bg-[#ffd731] transition-colors">
                            X / Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                           target="_blank" 
                           class="flex-1 text-center py-2 px-3 rounded-full border border-black bg-white text-xs font-bold uppercase tracking-wider hover:bg-[#4da2ff] hover:text-white transition-colors">
                            LinkedIn
                        </a>
                    </div>
                </div>

                {{-- QR Download / Connect Card --}}
                <x-qr-card label="READ ON MOBILE" sublabel="URL ARTIKEL" :url="url()->current()" />

                {{-- WhatsApp Direct Chat Box --}}
                <div class="sticker-card p-6 md:p-8 bg-white flex flex-col gap-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-neutral-500">Punya Pertanyaan?</span>
                    <h3 class="font-display text-fluid-sm text-black uppercase">Tanya Penulis</h3>
                    <p class="text-xs text-neutral-700 font-normal">
                        Ingin berdiskusi lebih dalam mengenai tulisan ini?
                    </p>
                    <x-pill-button href="https://wa.me/628123456789" target="_blank" variant="mint" size="sm" class="mt-2">
                        <span>Chat WhatsApp (08123456789)</span>
                        <span>-></span>
                    </x-pill-button>
                </div>

            </aside>

        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 3. RELATED ARTICLES (Concrete Gray #cccccc)                              --}}
{{-- ========================================================================= --}}
@if(count($relatedArticles) > 0)
<section class="w-full bg-[#cccccc] py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <h2 class="font-display text-fluid-card text-black uppercase">
                ARTIKEL LAINNYA
            </h2>
            <x-pill-button href="{{ route('blog.index') }}" variant="ghost" size="sm">
                <span>Lihat Semua</span>
                <span>-></span>
            </x-pill-button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedArticles as $rel)
                <x-blog-card :article="$rel" />
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
