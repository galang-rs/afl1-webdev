@props([
    'project',
    'featured' => false,
])

<article class="sticker-card p-6 md:p-7 flex flex-col justify-between group hover:-translate-y-1.5 transition-transform duration-200">
    <div>
        {{-- Card Header: Category & Year --}}
        <div class="flex items-center justify-between gap-2 mb-4">
            <x-badge :color="$project['badge_color'] ?? 'mint'" size="sm">
                {{ $project['category_label'] }}
            </x-badge>
            <span class="text-xs font-bold uppercase tracking-wider text-neutral-600 border border-black rounded-full px-2.5 py-0.5 bg-[#e9e9e9]">
                {{ $project['year'] }}
            </span>
        </div>

        {{-- Project Image / Thumbnail with 1px black outline --}}
        <div class="relative w-full aspect-[16/10] overflow-hidden rounded-[18px] border border-black mb-3 bg-[#dceeff]">
            <img src="{{ $project['image'] }}" 
                 alt="{{ $project['title'] }}" 
                 loading="lazy"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            
            {{-- Floating Sticker Accent in Corner --}}
            <div class="absolute top-3 right-3 pointer-events-none">
                <x-sticker :type="$project['sticker_accent'] ?? 'star'" 
                           :color="$project['badge_color'] ?? 'sunburst'" 
                           size="sm" 
                           rotate="6" />
            </div>
        </div>

        {{-- Sumber Foto Image Attribution --}}
        <div class="mb-3 text-[10px] text-neutral-500 font-medium">
            <span>Sumber Foto: </span>
            <a href="{{ $project['image_source_url'] }}" target="_blank" rel="noopener noreferrer" class="underline hover:text-black">
                {{ $project['image_source'] }}
            </a>
        </div>

        {{-- Project Title & Tagline --}}
        <h3 class="text-xl md:text-2xl font-black uppercase tracking-tight text-black leading-tight mb-2 group-hover:text-[#4da2ff] transition-colors">
            <a href="{{ route('portfolio.show', $project['slug']) }}">
                {{ $project['title'] }}
            </a>
        </h3>

        <p class="text-xs font-bold uppercase tracking-wider text-neutral-500 mb-3">
            {{ $project['tagline'] }}
        </p>

        <p class="text-sm text-neutral-700 leading-relaxed line-clamp-3 mb-5 font-normal">
            {{ $project['description'] }}
        </p>
    </div>

    {{-- Bottom Keahlian & Tindakan --}}
    <div class="pt-4 border-t border-black/10 mt-auto">
        <div class="flex flex-wrap gap-1.5 mb-5">
            @foreach(array_slice($project['tools'], 0, 4) as $item)
                <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full border border-black bg-white text-black">
                    {{ $item }}
                </span>
            @endforeach
            @if(count($project['tools']) > 4)
                <span class="text-[11px] font-bold px-2 py-1 rounded-full border border-black bg-[#e9ccff] text-black">
                    +{{ count($project['tools']) - 4 }}
                </span>
            @endif
        </div>

        <div class="flex items-center gap-2">
            <x-pill-button href="{{ route('portfolio.show', $project['slug']) }}" variant="filled" size="sm" class="flex-1">
                <span>Studi Kasus Detail</span>
                <span>-></span>
            </x-pill-button>

            @if(!empty($project['github_url']))
                <a href="{{ $project['github_url'] }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   title="Lihat Kode di GitHub @galang-rs"
                   class="w-9 h-9 rounded-full border border-black bg-white flex items-center justify-center hover:bg-[#ffd731] transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                </a>
            @endif
        </div>
    </div>
</article>
