@props([
    'type' => 'star',
    'color' => 'sunburst',
    'size' => 'md',
    'rotate' => '0',
    'class' => '',
])

@php
    $bgColors = [
        'carbon' => 'bg-[#000000] text-[#ffffff]',
        'paper' => 'bg-[#ffffff] text-[#000000]',
        'sky' => 'bg-[#dceeff] text-[#000000]',
        'concrete' => 'bg-[#cccccc] text-[#000000]',
        'electric' => 'bg-[#4da2ff] text-[#000000]',
        'mint' => 'bg-[#55db9c] text-[#000000]',
        'lavender' => 'bg-[#e9ccff] text-[#000000]',
        'ember' => 'bg-[#fb4903] text-[#ffffff]',
        'sunburst' => 'bg-[#ffd731] text-[#000000]',
        'voltage' => 'bg-[#5c4ade] text-[#ffffff]',
    ];

    $colorClass = $bgColors[$color] ?? $bgColors['sunburst'];

    $sizeClasses = [
        'sm' => 'w-8 h-8 rounded-[14px] p-1.5',
        'md' => 'w-12 h-12 rounded-[18px] p-2.5',
        'lg' => 'w-16 h-16 rounded-[22px] p-3.5',
        'xl' => 'w-20 h-20 rounded-[26px] p-4',
    ];

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['md'];

    $rotateClasses = [
        '-12' => '-rotate-12',
        '-6' => '-rotate-6',
        '-3' => '-rotate-3',
        '0' => 'rotate-0',
        '3' => 'rotate-3',
        '6' => 'rotate-6',
        '12' => 'rotate-12',
    ];
    $rotateClass = $rotateClasses[$rotate] ?? 'rotate-0';
@endphp

<div {{ $attributes->merge(['class' => "inline-flex items-center justify-center border border-black $sizeClass $colorClass $rotateClass shadow-none select-none transition-transform hover:scale-110 duration-150 $class"]) }}>
    @switch($type)
        @case('rocket')
            <svg class="w-full h-full fill-current" viewBox="0 0 24 24">
                <path d="M13.13 2.21a1 1 0 0 0-1.26 0C8.42 5.09 6 10.3 6 15a4 4 0 0 0 4 4c1.1 0 2-.9 2-2 0-1.1.9-2 2-2s2 .9 2 2c0 1.1.9 2 2 2a4 4 0 0 0 4-4c0-4.7-2.42-9.91-5.87-12.79zM12 9a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
            </svg>
            @break

        @case('coin')
            <svg class="w-full h-full fill-current" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/>
                <path d="M12 6v12M15 9.5a2.5 2.5 0 0 0-5 0c0 3 5 2 5 5a2.5 2.5 0 0 1-5 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" fill="none"/>
            </svg>
            @break

        @case('check')
            <svg class="w-full h-full fill-none stroke-current" stroke-width="3" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            @break

        @case('wallet')
            <svg class="w-full h-full fill-current" viewBox="0 0 24 24">
                <path d="M20 7H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zm-2 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM4 5h14a1 1 0 0 0 0-2H4a3 3 0 0 0-3 3v1a2 2 0 0 0 2-1z" />
            </svg>
            @break

        @case('lightning')
            <svg class="w-full h-full fill-current" viewBox="0 0 24 24">
                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
            </svg>
            @break

        @case('heart')
            <svg class="w-full h-full fill-current" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
            @break

        @case('code')
            <svg class="w-full h-full fill-none stroke-current" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="16 18 22 12 16 6"></polyline>
                <polyline points="8 6 2 12 8 18"></polyline>
            </svg>
            @break

        @case('spark')
            <svg class="w-full h-full fill-current" viewBox="0 0 24 24">
                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
            </svg>
            @break

        @case('star')
        @default
            <svg class="w-full h-full fill-current" viewBox="0 0 24 24">
                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
            </svg>
    @endswitch
</div>
