@props([
    'items' => [
        'GALANG REISDUANTO',
        'WEB DEVELOPER DAN SYSTEM ENGINEER',
        'UNIVERSITAS CIPUTRA SURABAYA',
        'REKAYASA JARINGAN DAN PROTOKOL',
        'DESAIN ANTARMUKA DAN SISTEM MODULAR',
        'TERBUKA UNTUK KOLABORASI DAN MAGANG',
        'KODE BERSIH DAN REKAYASA ANDAL',
    ],
    'bg' => 'bg-black',
    'textColor' => 'text-white',
    'border' => 'border-y border-black',
])

<div class="w-full overflow-hidden select-none py-2.5 {{ $bg }} {{ $textColor }} {{ $border }}">
    <div class="animate-marquee-continuous flex items-center gap-6 whitespace-nowrap text-[12px] md:text-[13px] font-bold tracking-[0.035em] uppercase">
        {{-- Set 1 --}}
        @foreach($items as $item)
            <span class="inline-flex items-center gap-4">
                <span>{{ $item }}</span>
                <span class="inline-block w-2 h-2 rounded-full bg-[#ffd731] border border-black"></span>
            </span>
        @endforeach

        {{-- Set 2 (seamless loop) --}}
        @foreach($items as $item)
            <span class="inline-flex items-center gap-4">
                <span>{{ $item }}</span>
                <span class="inline-block w-2 h-2 rounded-full bg-[#55db9c] border border-black"></span>
            </span>
        @endforeach

        {{-- Set 3 --}}
        @foreach($items as $item)
            <span class="inline-flex items-center gap-4">
                <span>{{ $item }}</span>
                <span class="inline-block w-2 h-2 rounded-full bg-[#4da2ff] border border-black"></span>
            </span>
        @endforeach
    </div>
</div>
