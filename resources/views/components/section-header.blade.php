@props([
    'title' => '',
    'subtitle' => '',
    'badge' => null,
    'badgeColor' => 'mint',
    'align' => 'center', // 'left', 'center'
    'class' => '',
])

@php
    $alignClasses = [
        'left' => 'text-left items-start',
        'center' => 'text-center items-center',
    ];
    $alignClass = $alignClasses[$align] ?? $alignClasses['center'];
@endphp

<div {{ $attributes->merge(['class' => "flex flex-col $alignClass max-w-4xl mx-auto mb-12 md:mb-16 select-none relative $class"]) }}>
    @if($badge)
        <div class="mb-4">
            <x-badge :color="$badgeColor" size="md">
                {{ $badge }}
            </x-badge>
        </div>
    @endif

    <h2 class="font-display text-fluid-section text-black tracking-tight uppercase">
        {{ $title }}
    </h2>

    @if($subtitle)
        <p class="mt-4 md:mt-5 text-base sm:text-lg md:text-xl font-medium text-neutral-800 max-w-2xl tracking-tight leading-relaxed">
            {{ $subtitle }}
        </p>
    @endif
</div>
