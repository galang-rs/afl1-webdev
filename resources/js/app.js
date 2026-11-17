/**
 * =============================================================================
 * SPA NAVIGATION ENGINE - Personal Branding Galang Reisduanto
 * =============================================================================
 *
 * File ini mengubah seluruh navigasi website menjadi SPA (Single Page Application).
 * Setiap klik tautan atau pencarian form GET diproses di sisi klien tanpa
 * me-reload/merestart browser (zero full page reload).
 *
 * MANFAAT DAN ALUR KERJA:
 * 1. Menghilangkan kedipan putih dan restart halaman saat berpindah antar rute.
 * 2. Mengambil konten halaman tujuan melalui Fetch API secara asinkron.
 * 3. Menukar isi elemen <main> dan <title> secara dinamis dengan transisi halus.
 * 4. Memperbarui status aktif (active indicator) pada navbar desktop dan mobile.
 * 5. Menampilkan indikator progress bar di bagian atas layar selama proses muat.
 * 6. Mengintegrasikan History API (pushState dan popstate) agar navigasi browser
 *    (tombol Back / Forward) tetap berfungsi normal dengan memori posisi scroll.
 * 7. Melakukan pre-fetch data saat kursor mouse melayang di atas link (hover)
 *    sehingga transisi halaman terasa seketika (sub-50ms).
 */

(function () {
    'use strict';

    // =========================================================================
    // 1. KONFIGURASI DAN STATE GLOBAL
    // =========================================================================

    /** Durasi transisi visual (fade) dalam milidetik */
    const TRANSITION_MS = 150;

    /** Penyimpanan cache HTML halaman dalam memori agar tidak fetch ulang */
    const pageCache = new Map();

    /** Penyimpanan posisi scroll berdasarkan URL untuk tombol Back/Forward */
    const scrollPositions = new Map();

    /** Status apakah sedang dalam proses navigasi aktif */
    let isNavigating = false;

    /** Elemen indikator loading progress bar di bagian paling atas viewport */
    let progressBar = null;
    let progressTimer = null;

    // =========================================================================
    // 2. INDIKATOR PROGRESS BAR
    // =========================================================================

    /**
     * initProgressBar - Membuat elemen progress bar di bagian paling atas layar.
     * Progress bar ini memberi umpan balik visual bahwa halaman sedang dimuat
     * tanpa perlu me-reload atau me-restart jendela peramban.
     */
    function initProgressBar() {
        if (progressBar) return;

        progressBar = document.createElement('div');
        progressBar.id = 'spa-progress-bar';
        progressBar.style.position = 'fixed';
        progressBar.style.top = '0';
        progressBar.style.left = '0';
        progressBar.style.height = '3px';
        progressBar.style.width = '0%';
        progressBar.style.backgroundColor = '#ffd731';
        progressBar.style.borderBottom = '1px solid #000000';
        progressBar.style.zIndex = '99999';
        progressBar.style.pointerEvents = 'none';
        progressBar.style.transition = 'width 250ms ease-out, opacity 200ms ease';
        progressBar.style.opacity = '0';

        document.body.appendChild(progressBar);
    }

    /**
     * startProgress - Memulai animasi progress bar saat permintaan navigasi dimulai.
     */
    function startProgress() {
        if (!progressBar) initProgressBar();
        clearTimeout(progressTimer);

        progressBar.style.transition = 'none';
        progressBar.style.width = '0%';
        progressBar.style.opacity = '1';

        // Paksa browser membaca perubahan awal sebelum menganimasikan
        void progressBar.offsetWidth;

        progressBar.style.transition = 'width 300ms cubic-bezier(0.1, 0.5, 0.1, 1)';
        progressBar.style.width = '70%';
    }

    /**
     * finishProgress - Menyelesaikan progress bar ke 100% lalu menghilangkannya secara halus.
     */
    function finishProgress() {
        if (!progressBar) return;

        progressBar.style.transition = 'width 150ms ease-out, opacity 200ms ease 100ms';
        progressBar.style.width = '100%';
        progressBar.style.opacity = '0';

        progressTimer = setTimeout(() => {
            progressBar.style.width = '0%';
        }, 350);
    }

    // =========================================================================
    // 3. FUNGSI INTI: NAVIGASI SPA
    // =========================================================================

    /**
     * navigateTo - Menjalankan alur pergantian halaman SPA.
     *
     * @param {string} url      - URL lengkap atau relatif yang dituju
     * @param {boolean} push    - true jika dipicu klik tautan baru (pushState),
     *                            false jika dipicu oleh tombol Back/Forward browser (popstate)
     * @param {boolean} restoreScroll - apakah perlu mengembalikan posisi scroll tersimpan
     */
    async function navigateTo(url, push = true, restoreScroll = false) {
        // Cegah eksekusi ganda jika navigasi sebelumnya belum tuntas
        if (isNavigating) return;
        isNavigating = true;

        const mainElement = document.querySelector('main');
        if (!mainElement) {
            window.location.href = url;
            return;
        }

        // Simpan posisi scroll halaman saat ini sebelum berpindah
        scrollPositions.set(window.location.href, window.scrollY);

        // Nyalakan progress bar atas
        startProgress();

        try {
            // Ambil konten HTML dari cache atau jaringan
            let htmlContent = '';
            if (pageCache.has(url)) {
                htmlContent = pageCache.get(url);
            } else {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-SPA-Request': 'true'
                    }
                });

                if (!response.ok) {
                    // Fallback jika respons bukan 200 (misal 404 atau redirect)
                    window.location.href = url;
                    return;
                }

                htmlContent = await response.text();
                pageCache.set(url, htmlContent);
            }

            // Parse dokumen HTML hasil respons
            const domParser = new DOMParser();
            const targetDoc = domParser.parseFromString(htmlContent, 'text/html');
            const targetMain = targetDoc.querySelector('main');
            const targetTitle = targetDoc.querySelector('title');
            const targetMetaDesc = targetDoc.querySelector('meta[name="description"]');

            if (!targetMain) {
                // Jika halaman tidak memiliki elemen main, fallback ke muat biasa
                window.location.href = url;
                return;
            }

            // Animasi Fade Out konten main lama
            mainElement.style.transition = `opacity ${TRANSITION_MS}ms ease`;
            mainElement.style.opacity = '0';

            await sleep(TRANSITION_MS);

            // Tukar isi konten utama
            mainElement.innerHTML = targetMain.innerHTML;

            // Perbarui judul halaman di tab peramban
            if (targetTitle) {
                document.title = targetTitle.textContent;
            }

            // Perbarui meta deskripsi jika ada
            if (targetMetaDesc) {
                const currentMetaDesc = document.querySelector('meta[name="description"]');
                if (currentMetaDesc) {
                    currentMetaDesc.setAttribute('content', targetMetaDesc.getAttribute('content') || '');
                }
            }

            // Perbarui URL browser tanpa memicu refresh
            if (push) {
                history.pushState({ url: url }, '', url);
            }

            // Perbarui penanda rute aktif pada navbar
            updateNavigationIndicators(url);

            // Tutup menu dropdown mobile jika sedang terbuka
            closeMobileDropdown();

            // Bersihkan banner notifikasi kilat jika berpindah halaman
            dismissFlashAlert();

            // Atur posisi scroll
            if (restoreScroll && scrollPositions.has(url)) {
                window.scrollTo({ top: scrollPositions.get(url), behavior: 'instant' });
            } else {
                window.scrollTo({ top: 0, behavior: 'instant' });
            }

            // Jalankan skrip inline di dalam kontainer main baru (bila ada)
            rehydrateScripts(mainElement);

            // Animasi Fade In konten main baru
            requestAnimationFrame(() => {
                mainElement.style.opacity = '1';
            });

        } catch (fetchError) {
            console.warn('Gagal memproses navigasi SPA, mengalihkan ke muat standar:', fetchError);
            window.location.href = url;
        } finally {
            finishProgress();
            setTimeout(() => {
                isNavigating = false;
            }, TRANSITION_MS);
        }
    }

    // =========================================================================
    // 4. PEMBARUAN INDIKATOR NAVIGASI (ACTIVE STATE)
    // =========================================================================

    /**
     * updateNavigationIndicators - Memperbarui kelas visual tautan aktif
     * pada menu desktop dan menu dropdown mobile.
     *
     * @param {string} activeUrl - URL tujuan yang sedang dibuka
     */
    function updateNavigationIndicators(activeUrl) {
        let pathName = '';
        try {
            pathName = new URL(activeUrl, window.location.origin).pathname;
        } catch {
            pathName = activeUrl;
        }

        // Daftar pemetaan awalan rute ke penanda aktif
        const routeRules = [
            { prefix: '/portfolio', key: 'portfolio' },
            { prefix: '/blog', key: 'blog' },
            { prefix: '/contact', key: 'contact' },
            { prefix: '/about', key: 'about' },
            { prefix: '/', key: 'home' }
        ];

        let matchedKey = 'home';
        for (const rule of routeRules) {
            if (rule.prefix === '/' && (pathName === '/' || pathName === '')) {
                matchedKey = rule.key;
                break;
            } else if (rule.prefix !== '/' && pathName.startsWith(rule.prefix)) {
                matchedKey = rule.key;
                break;
            }
        }

        // Tautan pemetaan URL absolut/relatif
        const navMap = {
            'home': '/',
            'about': '/about',
            'portfolio': '/portfolio',
            'blog': '/blog',
            'contact': '/contact'
        };

        // 1. Menu Navigasi Desktop (header nav a)
        const desktopNav = document.querySelector('header nav');
        if (desktopNav) {
            const navAnchors = desktopNav.querySelectorAll('a');
            navAnchors.forEach(anchor => {
                const anchorPath = new URL(anchor.href, window.location.origin).pathname;
                const linkKey = Object.keys(navMap).find(k => navMap[k] === anchorPath);
                const isCurrentActive = (linkKey && linkKey === matchedKey);

                anchor.classList.remove('bg-black', 'text-white', 'border-black');
                anchor.classList.remove('hover:bg-[#e9e9e9]', 'text-black');
                anchor.classList.add('border-transparent');

                if (isCurrentActive) {
                    anchor.classList.add('bg-black', 'text-white', 'border-black');
                    anchor.classList.remove('border-transparent');
                } else {
                    anchor.classList.add('text-black', 'hover:bg-[#e9e9e9]');
                }
            });
        }

        // 2. Menu Navigasi Mobile (#mobile-menu a)
        const mobileContainer = document.getElementById('mobile-menu');
        if (mobileContainer) {
            const mobileAnchors = mobileContainer.querySelectorAll('a');
            mobileAnchors.forEach(anchor => {
                const anchorPath = new URL(anchor.href, window.location.origin).pathname;
                const linkKey = Object.keys(navMap).find(k => navMap[k] === anchorPath);
                const isCurrentActive = (linkKey && linkKey === matchedKey);

                if (linkKey) {
                    anchor.classList.remove('bg-black', 'text-white', 'bg-white', 'text-black');
                    if (isCurrentActive) {
                        anchor.classList.add('bg-black', 'text-white');
                    } else {
                        anchor.classList.add('bg-white', 'text-black');
                    }
                }
            });
        }
    }

    // =========================================================================
    // 5. FUNGSI BANTUAN SISTEM
    // =========================================================================

    /**
     * sleep - Fungsi penunda berbasis Promise.
     * @param {number} ms - Durasi tunda
     */
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    /**
     * isEligibleLink - Memeriksa apakah tautan memenuhi syarat untuk navigasi SPA.
     * @param {HTMLAnchorElement} anchor - Elemen tautan yang diklik
     * @returns {boolean}
     */
    function isEligibleLink(anchor) {
        if (!anchor || !anchor.href) return false;
        if (anchor.target === '_blank' || anchor.hasAttribute('download')) return false;

        const rawHref = anchor.getAttribute('href') || '';
        if (/^(mailto:|tel:|javascript:|#)/.test(rawHref)) return false;

        try {
            const parsedUrl = new URL(anchor.href, window.location.origin);
            if (parsedUrl.hostname !== window.location.hostname) return false;
            if (parsedUrl.port !== window.location.port) return false;
        } catch {
            return false;
        }

        return true;
    }

    /**
     * closeMobileDropdown - Menutup panel dropdown pada layar perangkat mobile.
     */
    function closeMobileDropdown() {
        const menu = document.getElementById('mobile-menu');
        if (menu && !menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
        }
    }

    /**
     * dismissFlashAlert - Menghapus banner pesan kilat setelah navigasi rute.
     */
    function dismissFlashAlert() {
        const flashBanner = document.querySelector('.bg-\\[\\#55db9c\\].border-b');
        if (flashBanner) {
            flashBanner.remove();
        }
    }

    /**
     * rehydrateScripts - Mengeksekusi ulang elemen skrip inline yang berada
     * di dalam konten yang baru dimasukkan lewat innerHTML.
     * @param {HTMLElement} container - Kontainer yang memuat skrip
     */
    function rehydrateScripts(container) {
        const scriptElements = container.querySelectorAll('script');
        scriptElements.forEach(scriptTag => {
            const replacementTag = document.createElement('script');
            Array.from(scriptTag.attributes).forEach(attr => {
                replacementTag.setAttribute(attr.name, attr.value);
            });
            replacementTag.textContent = scriptTag.textContent;
            scriptTag.parentNode.replaceChild(replacementTag, scriptTag);
        });
    }

    /**
     * prefetchUrl - Memuat data halaman di latar belakang ketika tautan disentuh kursor.
     * @param {string} url - Target URL
     */
    function prefetchUrl(url) {
        if (pageCache.has(url)) return;
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-SPA-Request': 'true'
            }
        })
            .then(res => (res.ok ? res.text() : null))
            .then(html => {
                if (html) pageCache.set(url, html);
            })
            .catch(() => {});
    }

    // =========================================================================
    // 6. PENANGAN ACARA GLOBAL (EVENT DELEGATION)
    // =========================================================================

    /**
     * Delegasi Klik:
     * 1. Menangani tombol buka/tutup mobile menu
     * 2. Menangkap klik link internal untuk diproses oleh SPA
     */
    document.addEventListener('click', function (event) {
        // A. Penangan Tombol Mobile Menu
        const mobileToggleBtn = event.target.closest('#mobile-menu-btn');
        if (mobileToggleBtn) {
            event.preventDefault();
            const mobileMenuPanel = document.getElementById('mobile-menu');
            if (mobileMenuPanel) {
                mobileMenuPanel.classList.toggle('hidden');
            }
            return;
        }

        // B. Penangan Tombol Tutup Flash Message
        const closeFlashBtn = event.target.closest('[data-dismiss-flash]');
        if (closeFlashBtn) {
            event.preventDefault();
            dismissFlashAlert();
            return;
        }

        // C. Penangan Navigasi Tautan SPA
        const targetAnchor = event.target.closest('a');
        if (!targetAnchor) return;

        // Jangan proses jika tombol modifikasi keyboard ditekan (buka tab baru)
        if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;

        // Pastikan tautan merupakan rute internal yang sah
        if (!isEligibleLink(targetAnchor)) return;

        // Jika tautan sama persis dengan rute dan query saat ini, cukup gulir ke atas
        if (targetAnchor.href === window.location.href) {
            event.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
            closeMobileDropdown();
            return;
        }

        // Jalankan transisi SPA
        event.preventDefault();
        navigateTo(targetAnchor.href, true, false);
    });

    /**
     * Penangan Formulir GET (Misal: Pencarian Blog):
     * Mengubah pencarian form GET menjadi navigasi SPA tanpa reload browser.
     */
    document.addEventListener('submit', function (event) {
        const formElement = event.target.closest('form');
        if (!formElement) return;

        const formMethod = (formElement.method || 'GET').toUpperCase();

        if (formMethod === 'GET') {
            try {
                const targetUrl = new URL(formElement.action || window.location.href, window.location.origin);
                if (targetUrl.hostname === window.location.hostname) {
                    event.preventDefault();
                    const formPayload = new FormData(formElement);
                    const queryParams = new URLSearchParams();

                    for (const [fieldName, fieldValue] of formPayload.entries()) {
                        if (fieldValue !== '') {
                            queryParams.append(fieldName, fieldValue);
                        }
                    }

                    const destinationUrl = targetUrl.pathname + (queryParams.toString() ? '?' + queryParams.toString() : '');
                    navigateTo(destinationUrl, true, false);
                }
            } catch (err) {
                // Biarkan submit standar jika terjadi kendala parsing URL
            }
        } else if (formMethod === 'POST') {
            // Form POST (seperti pengiriman pesan kontak) diproses normal dengan flash data
            pageCache.delete(window.location.origin + '/contact');
            pageCache.delete('/contact');
        }
    });

    /**
     * Penangan Tombol Riwayat Browser (Back / Forward):
     */
    window.addEventListener('popstate', function (event) {
        const targetLocation = (event.state && event.state.url) ? event.state.url : window.location.href;
        navigateTo(targetLocation, false, true);
    });

    /**
     * Penangan Pre-fetch saat Hover Kursor (Desktop):
     */
    document.addEventListener('mouseover', function (event) {
        const hoverAnchor = event.target.closest('a');
        if (!hoverAnchor || !isEligibleLink(hoverAnchor)) return;
        prefetchUrl(hoverAnchor.href);
    });

    // =========================================================================
    // 7. INISIALISASI AWAL
    // =========================================================================

    // Buat indikator progress bar saat DOM siap
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initProgressBar);
    } else {
        initProgressBar();
    }

    // Rekam status awal ke dalam history peramban
    history.replaceState({ url: window.location.href }, '', window.location.href);

    // Bila ada notifikasi flash sukses, jangan simpan halaman saat ini ke dalam cache
    if (document.querySelector('.bg-\\[\\#55db9c\\].border-b')) {
        pageCache.delete(window.location.href);
    }

})();
