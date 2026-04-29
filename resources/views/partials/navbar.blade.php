<nav
    x-data="{ scrolled: false, open: false, nearVideo: false, darkSection: false, nearGallery: false }"
    x-init="
        const update = () => {
            scrolled = window.scrollY > 60;
            const video = document.getElementById('video');
            if (video) {
                const r = video.getBoundingClientRect();
                nearVideo = r.top <= 200 && r.bottom > 0;
                darkSection = r.top <= 80 && r.bottom > 80;
            }
            const gallery = document.getElementById('gallery');
            if (gallery) {
                const g = gallery.getBoundingClientRect();
                nearGallery = g.top <= 80 && g.bottom > 80;
            }
        };
        window.addEventListener('scroll', update, { passive: true });
    "
    :class="(scrolled && !nearVideo && !nearGallery) ? 'bg-white shadow-sm' : 'bg-transparent'"
    :style="darkSection ? 'opacity: 0; pointer-events: none;' : 'opacity: 1;'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="#hero" class="flex items-center">
                <img
                    :src="(scrolled && !darkSection && !nearGallery) ? '{{ asset('images/logo/huruhara-logo.png') }}' : '{{ asset('images/logo/huruhara-logo-white.png') }}'"
                    alt="Huruhara"
                    class="h-10 lg:h-14 object-contain transition-all duration-300"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block'"
                >
                <span
                    :class="(scrolled && !darkSection && !nearGallery) ? 'text-gray-900' : 'text-white'"
                    class="font-black text-2xl tracking-tight uppercase hidden transition-colors duration-300"
                    style="font-family: Helvetica, Arial, sans-serif;"
                >Huruhara</span>
            </a>

            {{-- Desktop nav --}}
            <div class="hidden lg:flex items-center gap-8">
                @foreach(['About' => '#about', 'Gallery' => '#gallery', 'Videos' => '#video', 'Collabs' => '#collaborations', 'Product' => '#products'] as $label => $href)
                <a
                    href="{{ $href }}"
                    :class="(scrolled && !darkSection && !nearGallery) ? 'text-gray-900 hover:text-gray-600' : 'text-white hover:text-white/70'"
                    class="text-sm font-medium tracking-wide transition-colors duration-200"
                >{{ $label }}</a>
                @endforeach
                <div style="position: relative;">
                    <a
                        href="#partnership"
                        :class="nearGallery
                            ? 'text-white hover:text-white/70'
                            : 'bg-gray-900 text-white hover:bg-gray-700 px-5 py-2.5'"
                        class="text-sm font-semibold transition-all duration-300"
                    >Partnership</a>
                    <span
                        class="gallery-counter-display"
                        x-show="nearGallery"
                        x-transition:enter="transition duration-300 ease-out"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition duration-200 ease-in"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        style="position: absolute; top: 100%; right: 0; margin-top: 0.3rem; white-space: nowrap; color: rgba(255,255,255,0.55); font-family: Helvetica,Arial,sans-serif; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em;"
                    >01 / 12</span>
                </div>
            </div>

            {{-- Mobile hamburger --}}
            <div class="lg:hidden" style="position: relative;">
            <button
                @click="open = !open"
                :class="(scrolled && !darkSection && !nearGallery) ? 'text-gray-900' : 'text-white'"
                class="p-2 transition-colors duration-200"
                aria-label="Toggle menu"
            >
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <span
                class="gallery-counter-display"
                x-show="nearGallery"
                x-transition:enter="transition duration-300 ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition duration-200 ease-in"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                style="position: absolute; top: 100%; right: 0.5rem; white-space: nowrap; color: rgba(255,255,255,0.55); font-family: Helvetica,Arial,sans-serif; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em;"
            >01 / 12</span>
            </div>

        {{-- Mobile menu --}}
        <div
            x-show="open"
            x-transition:enter="transition duration-200 ease-out"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition duration-150 ease-in"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="lg:hidden bg-white border-t border-gray-100 py-4"
        >
            <div class="flex flex-col gap-1">
                @foreach(['About' => '#about', 'Gallery' => '#gallery', 'Videos' => '#video', 'Collabs' => '#collaborations', 'Product' => '#products'] as $label => $href)
                <a
                    href="{{ $href }}"
                    @click="open = false"
                    class="text-gray-900 text-sm font-medium px-4 py-3 hover:bg-gray-50 transition-colors"
                >{{ $label }}</a>
                @endforeach
                <div class="px-4 pt-2">
                    <a
                        href="#partnership"
                        @click="open = false"
                        class="block bg-gray-900 text-white text-sm font-semibold px-5 py-3 text-center hover:bg-gray-700 transition-colors"
                    >Partnership</a>
                </div>
            </div>
        </div>
    </div>
</nav>
