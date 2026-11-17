@props([
    'color' => 'mint',
    'size' => 'sm',
    'class' => '',
])

@php
    $colorMaps = [
        'mint' => 'bg-[#55db9c] text-black',
        'electric' => 'bg-[#4da2ff] text-black',
        'lavender' => 'bg-[#e9ccff] text-black',
        'ember' => 'bg-[#fb4903] text-white',
        'sunburst' => 'bg-[#ffd731] text-black',
        'voltage' => 'bg-[#5c4ade] text-white',
        'carbon' => 'bg-black text-white',
        'paper' => 'bg-white text-black',
        'soft' => 'bg-[#e9e9e9] text-black',
    ];

    $sizes = [
        'xs' => 'text-[11px] px-2.5 py-0.5',
        'sm' => 'text-[12px] px-3.5 py-1',
        'md' => 'text-[13px] px-4 py-1.5',
    ];

    $bgClass = $colorMaps[$color] ?? $colorMaps['mint'];
    $sizeClass = $sizes[$size] ?? $sizes['sm'];
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 border border-black rounded-full font-bold uppercase tracking-[0.03em] select-none $bgClass $sizeClass $class"]) }}>
    {{ $slot }}
</span>
