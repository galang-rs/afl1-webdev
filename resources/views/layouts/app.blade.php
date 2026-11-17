<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Galang Reisduanto | Personal Branding dan Portfolio') | Tugas AFL-1</title>
    <meta name="description" content="@yield('meta_description', 'Website Personal Branding Galang Reisduanto - Mahasiswa S1 Informatika Universitas Ciputra Surabaya. Portofolio proyek nyata, blog teknologi, profil dan kontak.')">

    {{-- Google Fonts: Antonio & Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Antonio:wght@700;800&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    {{-- Vite CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#ffffff] text-[#000000] font-sans antialiased min-h-screen flex flex-col selection:bg-[#ffd731] selection:text-black">

    {{-- Top Running Marquee Banner --}}
    <x-marquee bg="bg-black" textColor="text-white" border="border-b border-black" />

    {{-- Main Sticky Navigation --}}
    <x-navbar />

    {{-- Flash Message Notification Banner --}}
    @if(session('success'))
        <div class="w-full bg-[#55db9c] border-b border-black px-4 py-3 select-none">
            <div class="max-w-[1440px] mx-auto flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <x-sticker type="check" color="paper" size="sm" />
                    <p class="text-sm font-bold text-black uppercase tracking-wider">
                        {{ session('success') }}
                    </p>
                </div>
                <button type="button" 
                        data-dismiss-flash
                        onclick="this.parentElement.parentElement.remove()" 
                        class="w-7 h-7 rounded-full border border-black bg-white flex items-center justify-center font-bold text-xs hover:bg-black hover:text-white transition-colors">
                    x
                </button>
            </div>
        </div>
    @endif

    {{-- Main Page Content --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Universal Footer --}}
    <x-footer />
</body>
</html>
