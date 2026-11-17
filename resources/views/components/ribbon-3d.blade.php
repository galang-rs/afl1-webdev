@props([
    'variant' => 'curve',
    'class' => '',
])

<div {{ $attributes->merge(['class' => "pointer-events-none select-none overflow-hidden $class"]) }}>
    @if($variant === 'curve')
        {{-- Smooth Inflatable 3D Blue Ribbon Arch - Diposisikan di atas/belakang judul agar tidak menimpa teks --}}
        <svg viewBox="0 0 1200 240" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-none">
            <defs>
                <linearGradient id="ribbonGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#4da2ff"/>
                    <stop offset="40%" stop-color="#70b5ff"/>
                    <stop offset="70%" stop-color="#2484f3"/>
                    <stop offset="100%" stop-color="#1466ca"/>
                </linearGradient>
                <linearGradient id="ribbonHighlight" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#ffffff" stop-opacity="0.6"/>
                    <stop offset="50%" stop-color="#4da2ff" stop-opacity="0"/>
                </linearGradient>
            </defs>
            {{-- Base Tube with Black Contour Outline --}}
            <path d="M-20,180 C260,20 880,20 1220,180" 
                  stroke="#000000" stroke-width="52" stroke-linecap="round" fill="none"/>
            <path d="M-20,180 C260,20 880,20 1220,180" 
                  stroke="url(#ribbonGrad1)" stroke-width="46" stroke-linecap="round" fill="none"/>
            {{-- Tube Specular Highlight --}}
            <path d="M-20,174 C260,14 880,14 1220,174" 
                  stroke="url(#ribbonHighlight)" stroke-width="12" stroke-linecap="round" fill="none"/>
        </svg>
    @elseif($variant === 'loop')
        {{-- Inflatable Loop Ribbon di belakang judul --}}
        <svg viewBox="0 0 800 180" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
            <defs>
                <linearGradient id="ribbonGrad2" x1="0%" y1="50%" x2="100%" y2="50%">
                    <stop offset="0%" stop-color="#2a7fe8"/>
                    <stop offset="50%" stop-color="#60adff"/>
                    <stop offset="100%" stop-color="#1e6ed1"/>
                </linearGradient>
            </defs>
            <path d="M20,140 Q220,20 450,110 T780,50" 
                  stroke="#000000" stroke-width="46" stroke-linecap="round" fill="none"/>
            <path d="M20,140 Q220,20 450,110 T780,50" 
                  stroke="url(#ribbonGrad2)" stroke-width="40" stroke-linecap="round" fill="none"/>
            <path d="M20,135 Q220,15 450,105 T780,45" 
                  stroke="#ffffff" stroke-opacity="0.5" stroke-width="8" stroke-linecap="round" fill="none"/>
        </svg>
    @else
        {{-- Arc Banner Ribbon --}}
        <svg viewBox="0 0 1000 140" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
            <path d="M10,110 C300,15 700,15 990,110" 
                  stroke="#000000" stroke-width="44" stroke-linecap="round" fill="none"/>
            <path d="M10,110 C300,15 700,15 990,110" 
                  stroke="#4da2ff" stroke-width="38" stroke-linecap="round" fill="none"/>
            <path d="M10,105 C300,10 700,10 990,105" 
                  stroke="#ffffff" stroke-opacity="0.45" stroke-width="8" stroke-linecap="round" fill="none"/>
        </svg>
    @endif
</div>
