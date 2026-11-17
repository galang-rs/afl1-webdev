@extends('layouts.app')

@section('title', 'Tentang Saya | Galang Reisduanto')

@section('content')

{{-- ========================================================================= --}}
{{-- 1. HEADER SECTION (Sky Wash #dceeff Pastel Surface)                       --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#dceeff] border-b border-black py-16 md:py-20 relative overflow-hidden">
    <div class="absolute top-8 inset-x-0 flex items-center justify-center opacity-60 pointer-events-none z-0">
        <x-ribbon-3d variant="loop" class="max-w-[1000px]" />
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center text-center max-w-4xl mx-auto select-none">
            <x-badge color="electric" size="md" class="mb-4">Profil Mahasiswa</x-badge>
            <h1 class="font-display text-fluid-page text-black uppercase">
                TENTANG SAYA
            </h1>
            <p class="mt-4 text-base sm:text-xl font-medium text-black max-w-2xl tracking-tight leading-relaxed">
                Mengenal lebih dekat latar belakang, filosofi rekayasa perangkat lunak, dan dedikasi saya dalam dunia pengembangan sistem dan web.
            </p>
        </div>
    </div>
</section>

{{-- ========================================================================= --}}
{{-- 2. BIO & PHILOSOPHY (Paper White #ffffff Ground)                          --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            
            {{-- Col 1: Photo & Details (5 cols) --}}
            <div class="lg:col-span-5 flex flex-col items-center">
                <div class="relative w-full max-w-md aspect-square rounded-[30px] border border-black overflow-hidden bg-[#e9ccff] p-3">
                    <div class="w-full h-full rounded-[20px] border border-black overflow-hidden relative">
                        <img src="{{ $bio['photo'] }}" 
                             alt="Foto Profil Galang Reisduanto" 
                             class="w-full h-full object-cover">
                    </div>

                    {{-- Floating Sticker Badges Over Photo --}}
                    <div class="absolute -top-3 -right-3 z-10">
                        <x-sticker type="spark" color="sunburst" size="md" rotate="12" />
                    </div>
                    <div class="absolute -bottom-3 -left-3 z-10">
                        <x-sticker type="check" color="mint" size="md" rotate="-12" />
                    </div>
                </div>

                {{-- Quick Bio Card beneath photo --}}
                <div class="w-full max-w-md sticker-card p-6 mt-6 bg-[#dceeff] flex flex-col gap-3">
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-black border-b border-black/10 pb-2">
                        <span>Nama Lengkap</span>
                        <span class="bg-white px-2.5 py-0.5 rounded-full border border-black font-black">{{ $bio['name'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-black border-b border-black/10 pb-2">
                        <span>Jenis Kelamin</span>
                        <span class="bg-white px-2.5 py-0.5 rounded-full border border-black">{{ $bio['gender'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-black border-b border-black/10 pb-2">
                        <span>Asal SMA</span>
                        <span class="bg-white px-2.5 py-0.5 rounded-full border border-black font-black">SMAN 10 Surabaya</span>
                    </div>
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-black border-b border-black/10 pb-2">
                        <span>Perguruan Tinggi</span>
                        <span class="bg-white px-2.5 py-0.5 rounded-full border border-black">Universitas Ciputra Surabaya</span>
                    </div>
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-black border-b border-black/10 pb-2">
                        <span>Status</span>
                        <span class="bg-[#55db9c] px-2.5 py-0.5 rounded-full border border-black">{{ $bio['availability'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-black">
                        <span>Pengalaman</span>
                        <span class="bg-white px-2.5 py-0.5 rounded-full border border-black">{{ $bio['experience_years'] }}</span>
                    </div>
                </div>

                {{-- Sumber Foto Card --}}
                <div class="w-full max-w-md sticker-card p-4 mt-4 bg-[#ffd731]/40 border border-black text-xs">
                    <span class="font-black uppercase tracking-wider block text-black mb-1">* Sumber Foto Profil:</span>
                    <p class="text-neutral-700">
                        Foto diambil dari platform resmi 
                        <a href="{{ $bio['photo_source_url'] }}" target="_blank" rel="noopener noreferrer" class="font-bold underline text-black hover:text-blue-800">
                            {{ $bio['photo_source'] }}
                        </a> 
                        dengan lisensi Unsplash Free to Use.
                    </p>
                </div>
            </div>

            {{-- Col 2: Detailed Bio Narrative (7 cols) --}}
            <div class="lg:col-span-7 flex flex-col gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-[0.1em] text-neutral-500 block mb-1">Perjalanan dan Minat Profesional</span>
                    <h2 class="font-display text-fluid-card text-black uppercase">
                        {{ $bio['role'] }}
                    </h2>
                </div>

                <div class="prose max-w-none text-neutral-800 text-base md:text-lg leading-relaxed font-normal flex flex-col gap-4">
                    <p>
                        {{ $bio['about_text'] }}
                    </p>
                    <p>
                        {{ $bio['philosophy'] }}
                    </p>
                    <p>
                        Sebagai lulusan dari <strong>SMAN 10 Surabaya</strong> yang saat ini menempuh jenjang sarjana di <strong>Universitas Ciputra Surabaya</strong>, saya aktif mempublikasikan kode sumber terbuka di GitHub (@galang-rs), khususnya pada proyek jaringan seperti klien WireGuard, OpenVPN, dan server proxy SOCKS5 modular.
                    </p>
                </div>

                {{-- Action Row --}}
                <div class="pt-4 flex flex-wrap items-center gap-3">
                    <x-pill-button href="{{ route('portfolio.index') }}" variant="filled" size="md">
                        <span>Lihat Karya Nyata di GitHub</span>
                        <span>-></span>
                    </x-pill-button>
                    <x-pill-button href="https://wa.me/628123456789" target="_blank" variant="mint" size="md">
                        <span>WhatsApp: 08123456789</span>
                    </x-pill-button>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 3. SKILLS & COMPETENCIES (Concrete Gray #cccccc Surface)                  --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#cccccc] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <x-badge color="sunburst" size="md" class="mb-3">Kompetensi dan Keahlian</x-badge>
            <h2 class="font-display text-fluid-section text-black uppercase">
                KEAHLIAN TEKNIS
            </h2>
            <p class="text-sm md:text-base text-neutral-800 mt-4 font-normal">
                Spektrum kompetensi mulai dari pemrograman sistem dan jaringan hingga rekayasa aplikasi web.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
            @foreach($skillCategories as $cat)
                <div class="sticker-card p-6 md:p-8 bg-white flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between gap-3 mb-6 border-b border-black/10 pb-4">
                            <h3 class="font-display text-fluid-sm text-black uppercase tracking-tight">
                                {{ $cat['category'] }}
                            </h3>
                            <x-badge :color="$cat['badge_color']" size="xs">
                                Terverifikasi
                            </x-badge>
                        </div>

                        <div class="flex flex-col gap-4">
                            @foreach($cat['skills'] as $skill)
                                <div>
                                    <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider mb-1.5">
                                        <span class="text-black">{{ $skill['name'] }}</span>
                                        <span class="text-neutral-600">{{ $skill['level'] }} | {{ $skill['pct'] }}%</span>
                                    </div>
                                    <div class="w-full h-3 rounded-full border border-black bg-[#e9e9e9] overflow-hidden p-0.5">
                                        <div class="h-full rounded-full border border-black bg-[#4da2ff]" style="width: {{ $skill['pct'] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 4. EDUCATION & BACKGROUND (Paper White #ffffff Ground)                    --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            
            <div class="lg:col-span-5">
                <x-badge color="lavender" size="md" class="mb-3">Latar Belakang Akademis</x-badge>
                <h2 class="font-display text-fluid-section text-black uppercase mb-4">
                    PENDIDIKAN FORMAL
                </h2>
                <p class="text-sm md:text-base text-neutral-600 leading-relaxed font-normal">
                    Pondasi keilmuan yang kuat dari SMAN 10 Surabaya dan jenjang sarjana Informatika di Universitas Ciputra Surabaya.
                </p>

                <div class="mt-8">
                    <x-qr-card label="REPOSITORI" sublabel="GITHUB PROFILE" url="https://github.com/galang-rs" />
                </div>
            </div>

            <div class="lg:col-span-7 flex flex-col gap-6">
                @foreach($education as $edu)
                    <div class="sticker-card p-6 md:p-8 bg-[#dceeff] flex flex-col justify-between">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                            <span class="px-3 py-1 rounded-full border border-black bg-white text-xs font-bold uppercase tracking-wider text-black">
                                {{ $edu['period'] }}
                            </span>
                            <span class="text-xs font-bold uppercase tracking-wider text-neutral-700 bg-[#ffd731] px-2.5 py-0.5 rounded-full border border-black">
                                {{ $edu['badge'] }}
                            </span>
                        </div>

                        <h3 class="font-display text-fluid-sm text-black uppercase leading-tight mt-1 mb-1">
                            {{ $edu['degree'] }}
                        </h3>
                        <p class="text-xs font-bold uppercase tracking-wider text-neutral-600 mb-3">
                            {{ $edu['institution'] }}
                        </p>
                        <p class="text-sm text-neutral-800 leading-relaxed font-normal">
                            {{ $edu['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 5. EXPERIENCE & ACHIEVEMENTS (Lavender #e9ccff Canvas)                    --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#e9ccff] py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <x-badge color="ember" size="md" class="mb-3">Jejak Langkah dan Karya</x-badge>
            <h2 class="font-display text-fluid-section text-black uppercase">
                PENGALAMAN NYATA
            </h2>
            <p class="text-sm md:text-base text-neutral-800 mt-4 font-normal">
                Aktivitas pengembangan perangkat lunak terbuka di GitHub serta pengerjaan proyek akademik di kampus.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($experiences as $exp)
                <div class="sticker-card p-6 md:p-8 bg-white flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-4">
                            <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full border border-black bg-[#55db9c] text-black">
                                {{ $exp['tag'] }}
                            </span>
                            <span class="text-xs font-bold text-neutral-500">
                                {{ $exp['period'] }}
                            </span>
                        </div>

                        <h3 class="text-xl md:text-2xl font-black uppercase text-black leading-tight mb-2">
                            {{ $exp['role'] }}
                        </h3>

                        <p class="text-xs font-bold uppercase tracking-wider text-neutral-600 mb-4">
                            {{ $exp['company'] }}
                        </p>

                        <p class="text-sm text-neutral-700 leading-relaxed font-normal">
                            {{ $exp['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
