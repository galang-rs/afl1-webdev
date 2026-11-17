@props([
    'label' => 'CONNECT',
    'sublabel' => 'SCAN TO VIEW REPO',
    'url' => 'https://github.com/galang-rs',
    'class' => '',
])

<div {{ $attributes->merge(['class' => "flex items-center gap-4 bg-[#5c4ade] border border-black p-3.5 rounded-[20px] max-w-sm select-none transition-transform hover:scale-[1.02] duration-150 $class"]) }}>
    {{-- White QR code panel with 1px black border --}}
    <div class="w-16 h-16 md:w-20 md:h-20 bg-white border border-black rounded-[14px] p-1.5 flex items-center justify-center shrink-0">
        {{-- High quality SVG QR Code pattern --}}
        <svg class="w-full h-full text-black fill-current" viewBox="0 0 100 100">
            <!-- Position Detection Patterns (Corners) -->
            <rect x="5" y="5" width="28" height="28" fill="black" />
            <rect x="9" y="9" width="20" height="20" fill="white" />
            <rect x="13" y="13" width="12" height="12" fill="black" />

            <rect x="67" y="5" width="28" height="28" fill="black" />
            <rect x="71" y="9" width="20" height="20" fill="white" />
            <rect x="75" y="13" width="12" height="12" fill="black" />

            <rect x="5" y="67" width="28" height="28" fill="black" />
            <rect x="9" y="71" width="20" height="20" fill="white" />
            <rect x="13" y="75" width="12" height="12" fill="black" />

            <!-- Random Matrix Modules -->
            <rect x="38" y="10" width="7" height="7" fill="black" />
            <rect x="49" y="10" width="7" height="7" fill="black" />
            <rect x="38" y="24" width="7" height="7" fill="black" />
            <rect x="49" y="24" width="7" height="7" fill="black" />
            <rect x="10" y="38" width="7" height="7" fill="black" />
            <rect x="24" y="38" width="7" height="7" fill="black" />
            <rect x="38" y="38" width="7" height="7" fill="black" />
            <rect x="52" y="38" width="7" height="7" fill="black" />
            <rect x="66" y="38" width="7" height="7" fill="black" />
            <rect x="80" y="38" width="7" height="7" fill="black" />
            <rect x="38" y="52" width="7" height="7" fill="black" />
            <rect x="52" y="52" width="7" height="7" fill="black" />
            <rect x="70" y="52" width="7" height="7" fill="black" />
            <rect x="84" y="52" width="7" height="7" fill="black" />
            <rect x="38" y="66" width="7" height="7" fill="black" />
            <rect x="52" y="66" width="7" height="7" fill="black" />
            <rect x="66" y="66" width="7" height="7" fill="black" />
            <rect x="80" y="75" width="7" height="7" fill="black" />
            <rect x="45" y="80" width="7" height="7" fill="black" />
            <rect x="60" y="84" width="7" height="7" fill="black" />
        </svg>
    </div>

    {{-- Label panel --}}
    <div class="flex flex-col justify-center text-white">
        <span class="text-[10px] md:text-[11px] font-bold tracking-[0.08em] opacity-90 uppercase">{{ $sublabel }}</span>
        <span class="text-xl md:text-2xl font-black tracking-tight leading-none uppercase mt-0.5">{{ $label }}</span>
        <span class="text-[11px] font-medium text-purple-200 mt-1 flex items-center gap-1">
            <span>Scan via Smartphone</span>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </span>
    </div>
</div>
