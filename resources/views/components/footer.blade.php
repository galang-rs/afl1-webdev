<footer class="w-full bg-[#000000] text-white border-t border-black select-none">
    {{-- Marquee inside Footer --}}
    <x-marquee bg="bg-black" textColor="text-white" border="border-b border-neutral-800" />

    {{-- Main Footer Body --}}
    <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-14 items-start">
            
            {{-- Col 1: Brand & Philosophy (5 cols) --}}
            <div class="md:col-span-5 flex flex-col gap-5">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full border border-white bg-white text-black flex items-center justify-center font-display text-2xl">
                        GR
                    </div>
                    <div>
                        <span class="font-display text-fluid-sm text-white tracking-tight block leading-none">GALANG REISDUANTO</span>
                        <span class="text-xs font-bold uppercase tracking-[0.06em] text-[#55db9c]">Web Developer | Universitas Ciputra Surabaya</span>
                    </div>
                </div>

                <p class="text-neutral-400 text-sm md:text-base leading-relaxed max-w-md font-normal">
                    Membangun aplikasi web dan sistem berkarakter kuat menggunakan arsitektur bersih, estetika neobrutalisme Inflatable Sticker Universe, dan kode yang teruji.
                </p>

                {{-- Interactive Sticker Row --}}
                <div class="flex items-center gap-2.5 pt-2">
                    <x-sticker type="rocket" color="ember" size="md" rotate="-6" />
                    <x-sticker type="star" color="sunburst" size="md" rotate="6" />
                    <x-sticker type="check" color="mint" size="md" rotate="-3" />
                    <x-sticker type="wallet" color="voltage" size="md" rotate="3" />
                    <x-sticker type="code" color="electric" size="md" rotate="-12" />
                </div>
            </div>

            {{-- Col 2: Navigation Links (3 cols) --}}
            <div class="md:col-span-3 flex flex-col gap-4">
                <span class="text-xs font-bold uppercase tracking-[0.1em] text-[#ffd731]">Navigasi Utama</span>
                <ul class="flex flex-col gap-2.5 text-sm font-bold uppercase tracking-wider">
                    <li><a href="{{ route('home') }}" class="text-neutral-300 hover:text-white transition-colors flex items-center gap-2"><span>-></span> Beranda / Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-neutral-300 hover:text-white transition-colors flex items-center gap-2"><span>-></span> Profil / About</a></li>
                    <li><a href="{{ route('portfolio.index') }}" class="text-neutral-300 hover:text-white transition-colors flex items-center gap-2"><span>-></span> Galeri Portofolio</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-neutral-300 hover:text-white transition-colors flex items-center gap-2"><span>-></span> Artikel dan Blog</a></li>
                    <li><a href="{{ route('contact.index') }}" class="text-neutral-300 hover:text-white transition-colors flex items-center gap-2"><span>-></span> Kontak dan WhatsApp</a></li>
                </ul>
            </div>

            {{-- Col 3: QR Card & Connectivity (4 cols) --}}
            <div class="md:col-span-4 flex flex-col gap-4">
                <span class="text-xs font-bold uppercase tracking-[0.1em] text-[#e9ccff]">Koneksi dan Repositori</span>
                <x-qr-card label="GITHUB REPO" sublabel="AKUN RESMI" url="https://github.com/galang-rs" />

                <div class="pt-2 text-xs text-neutral-400 flex flex-col gap-1">
                    <p>
                        WhatsApp: <a href="https://wa.me/628123456789" target="_blank" class="text-[#55db9c] font-bold hover:underline">08123456789</a>
                    </p>
                    <p>
                        Email: <a href="mailto:greisduanto@student.ciputra.ac.id" class="text-white underline hover:text-[#ffd731]">greisduanto@student.ciputra.ac.id</a>
                    </p>
                    <p>
                        GitHub: <a href="https://github.com/galang-rs" target="_blank" class="text-[#4da2ff] font-bold underline hover:text-white">github.com/galang-rs</a>
                    </p>
                    <p class="text-[11px] text-neutral-500 mt-2">
                        Sumber Foto: Unsplash (Jurica Koletic, Markus Spiske, Alina Grubnyak, dll). Lisensi Unsplash Free to Use.
                    </p>
                </div>
            </div>

        </div>

        {{-- Bottom Copyright Band --}}
        <div class="mt-14 pt-8 border-t border-neutral-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-neutral-500 font-medium">
            <p>(c) {{ date('Y') }} Galang Reisduanto. Tugas AFL-1 Web Development | Universitas Ciputra Surabaya.</p>
            <div class="flex items-center gap-4">
                <span class="px-2.5 py-1 rounded-full border border-neutral-700 bg-neutral-900 text-neutral-300 text-[11px] font-bold">
                    Web Development | Universitas Ciputra Surabaya
                </span>
            </div>
        </div>
    </div>
</footer>
