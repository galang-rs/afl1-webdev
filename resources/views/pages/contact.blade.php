@extends('layouts.app')

@section('title', 'Kontak dan Media Sosial - Galang Reisduanto')

@section('content')

{{-- ========================================================================= --}}
{{-- 1. HEADER SECTION (Sky Wash #dceeff Surface)                              --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#dceeff] border-b border-black py-16 md:py-20 relative overflow-hidden">
    {{-- Inflatable ribbon background motif di belakang --}}
    <div class="absolute top-8 inset-x-0 flex items-center justify-center opacity-60 pointer-events-none z-0">
        <x-ribbon-3d variant="curve" class="max-w-[1100px]" />
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 text-center flex flex-col items-center select-none">
        <x-badge color="ember" size="md" class="mb-4">Saluran Resmi</x-badge>
        <h1 class="font-display text-fluid-page text-black uppercase">
            HUBUNGI SAYA
        </h1>
        <p class="mt-4 text-base sm:text-xl font-medium text-black max-w-2xl tracking-tight leading-relaxed">
            Terbuka untuk diskusi proyek web, tawaran magang, kolaborasi open source, atau sekadar berbagi pengalaman seputar rekayasa perangkat lunak.
        </p>

        {{-- Status and Quick Meta Badges --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-2.5">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-black bg-white text-xs font-bold uppercase tracking-wider">
                <span class="w-2.5 h-2.5 rounded-full bg-[#55db9c] border border-black animate-pulse"></span>
                <span>{{ $contactInfo['status'] }}</span>
            </div>
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-black bg-[#ffd731] text-xs font-bold uppercase tracking-wider text-black">
                <span>Domisili: {{ $contactInfo['location'] }}</span>
            </div>
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-black bg-[#e9ccff] text-xs font-bold uppercase tracking-wider text-black">
                <span>Jam Aktif: {{ $contactInfo['active_hours'] }}</span>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================================= --}}
{{-- 2. DIRECT SOCIAL MEDIA & CONTACT DIRECTORY (Paper White Ground)           --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#ffffff] border-b border-black py-16 md:py-24">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-12">

        {{-- Hero Priority Card: WhatsApp Langsung --}}
        <div class="sticker-card p-6 sm:p-8 md:p-10 bg-[#55db9c] border border-black flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden group">
            <div class="flex items-start sm:items-center gap-4 sm:gap-6 relative z-10">
                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full border border-black bg-white flex items-center justify-center font-black text-xl sm:text-2xl text-black shrink-0 tracking-wider shadow-none group-hover:scale-105 transition-transform">
                    WA
                </div>
                <div class="flex flex-col gap-1">
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-0.5 rounded-full border border-black bg-[#ffd731] text-[10px] font-black uppercase tracking-wider text-black">
                            {{ $contactInfo['primary']['badge'] }}
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-black/80">Saluran Utama</span>
                    </div>
                    <h2 class="font-display text-fluid-card text-black uppercase leading-tight">
                        {{ $contactInfo['primary']['handle'] }}
                    </h2>
                    <p class="text-xs sm:text-sm text-black font-medium max-w-xl">
                        {{ $contactInfo['primary']['description'] }}
                    </p>
                </div>
            </div>

            <div class="relative z-10 shrink-0 w-full sm:w-auto">
                <x-pill-button href="{{ $contactInfo['primary']['url'] }}" target="_blank" variant="filled" size="lg" class="w-full sm:w-auto">
                    <span>{{ $contactInfo['primary']['action_label'] }}</span>
                </x-pill-button>
            </div>
        </div>

        {{-- Section Grid: Email Akademis & Surel Pribadi --}}
        <div>
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-neutral-500">Korespondensi Surat Elektronik</span>
                    <h3 class="font-display text-fluid-section text-black uppercase mt-1">
                        ALAMAT EMAIL RESMI
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($contactInfo['emails'] as $em)
                    <div class="sticker-card p-6 md:p-8 bg-[#dceeff] flex flex-col justify-between gap-6">
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full border border-black bg-[#ffd731] text-[11px] font-black uppercase tracking-wider text-black">
                                    {{ $em['badge'] }}
                                </span>
                                <span class="w-8 h-8 rounded-full border border-black bg-white flex items-center justify-center font-black text-xs">
                                    @
                                </span>
                            </div>

                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-neutral-600">{{ $em['type'] }}</span>
                                <p class="text-lg sm:text-xl font-black text-black tracking-tight mt-1 break-all">
                                    {{ $em['address'] }}
                                </p>
                            </div>

                            <p class="text-xs sm:text-sm text-neutral-700 font-normal">
                                {{ $em['description'] }}
                            </p>
                        </div>

                        <div>
                            <x-pill-button href="mailto:{{ $em['address'] }}" variant="outlined" size="md">
                                <span>Kirimkan Email -&gt;</span>
                            </x-pill-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Section Grid: Social Media Channels (GitHub, LinkedIn, Discord) --}}
        <div>
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-neutral-500">Jejaring Sosial & Repositori</span>
                    <h3 class="font-display text-fluid-section text-black uppercase mt-1">
                        MEDIA SOSIAL & KODE
                    </h3>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($contactInfo['socials'] as $soc)
                    @php
                        $cardBg = match($soc['color']) {
                            'carbon' => 'bg-[#ffffff]',
                            'electric' => 'bg-[#dceeff]',
                            'lavender' => 'bg-[#e9ccff]',
                            default => 'bg-[#ffffff]'
                        };
                        $badgeBg = match($soc['color']) {
                            'carbon' => 'bg-black text-white',
                            'electric' => 'bg-[#4da2ff] text-black',
                            'lavender' => 'bg-[#ffd731] text-black',
                            default => 'bg-white text-black'
                        };
                    @endphp
                    <div class="sticker-card p-6 md:p-8 {{ $cardBg }} flex flex-col justify-between gap-6 hover:-translate-y-1 transition-transform">
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center justify-between gap-2">
                                <span class="px-3 py-1 rounded-full border border-black {{ $badgeBg }} text-[11px] font-black uppercase tracking-wider">
                                    {{ $soc['badge'] }}
                                </span>
                                <span class="text-xs font-black uppercase tracking-wider text-neutral-500">
                                    {{ $soc['name'] }}
                                </span>
                            </div>

                            <div>
                                <h4 class="font-display text-fluid-card text-black uppercase leading-tight">
                                    {{ $soc['name'] }}
                                </h4>
                                <p class="text-sm sm:text-base font-bold text-neutral-800 mt-1">
                                    {{ $soc['handle'] }}
                                </p>
                            </div>

                            <p class="text-xs sm:text-sm text-neutral-700 font-normal">
                                {{ $soc['description'] }}
                            </p>
                        </div>

                        <div>
                            <x-pill-button href="{{ $soc['url'] }}" target="_blank" variant="filled" size="md" class="w-full justify-between">
                                <span>Buka {{ $soc['name'] }}</span>
                                <span>-&gt;</span>
                            </x-pill-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Section 3: Campus Affiliation & Scan QR Connect --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch pt-4">
            
            {{-- Campus Base Details --}}
            <div class="lg:col-span-7 sticker-card p-6 sm:p-8 md:p-10 bg-[#e9e9e9] flex flex-col justify-between gap-6">
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 rounded-full border border-black bg-[#55db9c] text-[11px] font-black uppercase tracking-wider text-black">
                            {{ $contactInfo['campus']['badge'] }}
                        </span>
                        <span class="text-xs font-bold uppercase tracking-wider text-neutral-600">Perguruan Tinggi</span>
                    </div>

                    <h3 class="font-display text-fluid-section text-black uppercase leading-tight">
                        {{ $contactInfo['campus']['institution'] }}
                    </h3>

                    <div class="flex flex-col gap-1 text-sm font-bold text-neutral-800">
                        <p>{{ $contactInfo['campus']['program'] }} - {{ $contactInfo['campus']['faculty'] }}</p>
                        <p class="text-xs sm:text-sm font-normal text-neutral-600 mt-2">
                            Alamat: {{ $contactInfo['campus']['address'] }}
                        </p>
                    </div>
                </div>

                <div class="pt-2 flex flex-wrap gap-3">
                    <x-pill-button href="https://maps.google.com/?q=Universitas+Ciputra+Surabaya" target="_blank" variant="outlined" size="sm">
                        <span>Lihat Lokasi Kampus di Google Maps -&gt;</span>
                    </x-pill-button>
                </div>
            </div>

            {{-- QR Code Quick Connect --}}
            <div class="lg:col-span-5 flex flex-col justify-between gap-4">
                <x-qr-card label="GITHUB PROFILE" sublabel="KUNJUNGI REPOSITORI" url="https://github.com/galang-rs" class="w-full max-w-full" />
                <x-qr-card label="WHATSAPP RESMI" sublabel="CHAT SEKARANG" url="https://wa.me/628123456789" class="w-full max-w-full" />
            </div>

        </div>

    </div>
</section>

{{-- ========================================================================= --}}
{{-- 3. BOTTOM CTA BANNER (Concrete Gray Canvas)                               --}}
{{-- ========================================================================= --}}
<section class="w-full bg-[#cccccc] border-b border-black py-16 md:py-20 text-center">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
        <x-badge color="sunburst" size="md" class="mb-4">Kolaborasi Digital</x-badge>
        <h3 class="font-display text-fluid-section text-black uppercase max-w-2xl">
            MARI BANGUN KARYA DIGITAL BERSAMA
        </h3>
        <p class="mt-4 text-sm sm:text-base text-neutral-800 max-w-xl font-normal leading-relaxed">
            Punya ide proyek perangkat lunak, tawaran magang, atau ingin mendiskusikan topik pemrograman? Saluran komunikasi di atas selalu terbuka untuk Anda.
        </p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <x-pill-button href="https://wa.me/628123456789" target="_blank" variant="filled" size="lg">
                <span>Hubungi via WhatsApp</span>
                <span>-&gt;</span>
            </x-pill-button>
            <x-pill-button href="https://github.com/galang-rs" target="_blank" variant="outlined" size="lg">
                <span>Kunjungi GitHub @galang-rs</span>
            </x-pill-button>
        </div>
    </div>
</section>

@endsection
