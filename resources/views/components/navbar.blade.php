@php
    $currentRoute = Route::currentRouteName();
    $navLinks = [
        ['name' => 'Home', 'route' => 'home', 'url' => route('home')],
        ['name' => 'About', 'route' => 'about', 'url' => route('about')],
        ['name' => 'Portfolio', 'route' => 'portfolio.*', 'url' => route('portfolio.index')],
        ['name' => 'Blog', 'route' => 'blog.*', 'url' => route('blog.index')],
        ['name' => 'Contact', 'route' => 'contact.*', 'url' => route('contact.index')],
    ];
@endphp

<header class="sticky top-0 z-50 w-full px-4 sm:px-6 lg:px-8 py-3 bg-[#ffffff]/95 backdrop-blur-md border-b border-black">
    <div class="max-w-[1440px] mx-auto flex items-center justify-between gap-4">
        
        {{-- Brand / Logo Mark --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 group select-none">
            {{-- Circular Logo Mark --}}
            <div class="w-10 h-10 md:w-11 md:h-11 rounded-full border border-black bg-white flex items-center justify-center font-display text-xl md:text-2xl text-black group-hover:bg-[#ffd731] transition-colors duration-150">
                GR
            </div>
            <div class="flex flex-col">
                <span class="font-display text-lg md:text-2xl leading-none text-black tracking-tight">GALANG REISDUANTO</span>
                <span class="text-[10px] md:text-[11px] font-bold uppercase tracking-[0.06em] text-neutral-600">Web Developer | Surabaya</span>
            </div>
        </a>

        {{-- Center Pill Navigation Bar (Desktop) --}}
        <nav class="hidden md:flex items-center p-1.5 rounded-full border border-black bg-white shadow-none gap-1">
            @foreach($navLinks as $link)
                @php
                    $isActive = request()->routeIs($link['route']);
                @endphp
                <a href="{{ $link['url'] }}" 
                   class="px-4 py-2 rounded-full text-[13px] font-bold uppercase tracking-[0.032em] transition-all duration-150 border border-transparent {{ $isActive ? 'bg-black text-white border-black' : 'text-black hover:bg-[#e9e9e9]' }}">
                    {{ $link['name'] }}
                </a>
            @endforeach
        </nav>

        {{-- Right Actions --}}
        <div class="flex items-center gap-2.5">
            {{-- Status Badge --}}
            <div class="hidden lg:flex items-center gap-2 px-3 py-1.5 rounded-full border border-black bg-[#dceeff] text-[11px] font-bold uppercase tracking-[0.03em]">
                <span class="w-2 h-2 rounded-full bg-[#55db9c] border border-black animate-pulse"></span>
                <span>Open for Hire</span>
            </div>

            {{-- Filled CTA Button --}}
            <a href="{{ route('contact.index') }}" 
               class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 rounded-full border border-black bg-black text-white text-[13px] font-bold uppercase tracking-[0.032em] hover:bg-neutral-800 transition-all active:scale-95">
                Hubungi Saya
            </a>

            {{-- Mobile Menu Trigger --}}
            <button type="button" 
                    id="mobile-menu-btn"
                    aria-label="Toggle menu"
                    class="md:hidden w-10 h-10 rounded-full border border-black bg-white flex items-center justify-center text-black hover:bg-[#e9e9e9] transition-colors">
                <svg id="menu-icon" class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

    </div>

    {{-- Mobile Dropdown Menu --}}
    <div id="mobile-menu" class="hidden md:hidden mt-3 pt-3 border-t border-black flex flex-col gap-2">
        @foreach($navLinks as $link)
            @php
                $isActive = request()->routeIs($link['route']);
            @endphp
            <a href="{{ $link['url'] }}" 
               class="px-4 py-2.5 rounded-[16px] text-sm font-bold uppercase tracking-wider border border-black {{ $isActive ? 'bg-black text-white' : 'bg-white text-black' }}">
                {{ $link['name'] }}
            </a>
        @endforeach
        <a href="{{ route('contact.index') }}" 
           class="px-4 py-2.5 rounded-[16px] text-sm font-bold uppercase tracking-wider border border-black bg-[#4da2ff] text-black text-center mt-1">
            Hubungi Saya Sekarang
        </a>
    </div>
</header>
