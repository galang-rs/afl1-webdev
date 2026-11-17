@props([
    'variant' => 'filled', // 'filled', 'ghost', 'electric', 'mint', 'sunburst', 'lavender', 'ember'
    'href' => null,
    'type' => 'button',
    'size' => 'md',
    'class' => '',
])

@php
    $variants = [
        'filled' => 'bg-black text-white hover:bg-neutral-800 border-black',
        'ghost' => 'bg-white text-black hover:bg-[#e9e9e9] border-black',
        'electric' => 'bg-[#4da2ff] text-black hover:bg-[#3d91ee] border-black',
        'mint' => 'bg-[#55db9c] text-black hover:bg-[#43c889] border-black',
        'sunburst' => 'bg-[#ffd731] text-black hover:bg-[#ebc41f] border-black',
        'lavender' => 'bg-[#e9ccff] text-black hover:bg-[#d6b5f0] border-black',
        'ember' => 'bg-[#fb4903] text-white hover:bg-[#e03d00] border-black',
    ];

    $sizes = [
        'sm' => 'text-[12px] px-3.5 py-1.5',
        'md' => 'text-[13px] md:text-[14px] px-5 py-2.5',
        'lg' => 'text-[14px] md:text-[15px] px-7 py-3',
    ];

    $variantClass = $variants[$variant] ?? $variants['filled'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $baseClasses = "inline-flex items-center justify-center gap-2 border font-bold rounded-full tracking-[0.03em] select-none transition-all duration-150 active:scale-95 $variantClass $sizeClass $class";
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses]) }}>
        {{ $slot }}
    </button>
@endif
