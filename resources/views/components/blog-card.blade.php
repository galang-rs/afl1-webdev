@props([
    'article',
])

<article class="sticker-card p-6 md:p-7 flex flex-col justify-between group hover:-translate-y-1.5 transition-transform duration-200">
    <div>
        {{-- Header metadata: Category & Read Time --}}
        <div class="flex items-center justify-between gap-2 mb-4">
            <x-badge :color="$article['badge_color'] ?? 'electric'" size="sm">
                {{ $article['category_label'] }}
            </x-badge>
            <div class="flex items-center gap-1.5 text-xs font-bold text-neutral-600">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path d="M12 6v6l4 2" stroke-width="2" stroke-linecap="round"/></svg>
                <span>{{ $article['read_time'] }}</span>
            </div>
        </div>

        {{-- Thumbnail with 1px black outline --}}
        <div class="relative w-full aspect-[16/10] overflow-hidden rounded-[18px] border border-black mb-5 bg-[#e9e9e9]">
            <img src="{{ $article['image'] }}" 
                 alt="{{ $article['title'] }}" 
                 loading="lazy"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            
            {{-- Date Pill Badge in Bottom Left of image --}}
            <div class="absolute bottom-3 left-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full border border-black bg-white text-black text-[11px] font-bold uppercase tracking-wider">
                    {{ $article['published_at'] }}
                </span>
            </div>
        </div>

        {{-- Title --}}
        <h3 class="text-xl md:text-2xl font-black uppercase tracking-tight text-black leading-snug mb-3 group-hover:text-[#4da2ff] transition-colors">
            <a href="{{ route('blog.show', $article['slug']) }}">
                {{ $article['title'] }}
            </a>
        </h3>

        {{-- Summary snippet --}}
        <p class="text-sm text-neutral-700 leading-relaxed line-clamp-3 mb-6 font-normal">
            {{ $article['summary'] }}
        </p>
    </div>

    {{-- Footer: Author & Read More Link --}}
    <div class="pt-4 border-t border-black/10 mt-auto flex items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-full border border-black bg-[#ffd731] flex items-center justify-center font-display text-xs text-black">
                GR
            </div>
            <span class="text-xs font-bold uppercase tracking-wider text-neutral-700">
                {{ $article['author'] }}
            </span>
        </div>

        <x-pill-button href="{{ route('blog.show', $article['slug']) }}" variant="filled" size="sm">
            <span>Baca Selengkapnya</span>
            <span>-></span>
        </x-pill-button>
    </div>
</article>
