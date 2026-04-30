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
    {{-- Main bar --}}
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="#hero" class="flex items-center" @click="open = false">
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
                    :class="open ? 'text-white' : (scrolled && !darkSection && !nearGallery) ? 'text-gray-900' : 'text-white'"
                    class="p-2 transition-colors duration-200 relative z-[60]"
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
                    x-show="nearGallery && !open"
                    x-transition:enter="transition duration-300 ease-out"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition duration-200 ease-in"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    style="position: absolute; top: 100%; right: 0.5rem; white-space: nowrap; color: rgba(255,255,255,0.55); font-family: Helvetica,Arial,sans-serif; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.2em;"
                >01 / 12</span>
            </div>

        </div>
    </div>

    {{-- Mobile fullscreen menu overlay --}}
    <div
        x-show="open"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="lg:hidden fixed inset-0 z-[55] flex flex-col"
        style="background: #1A1A1A; position: fixed;"
    >
        {{-- Close button --}}
        <button
            @click="open = false"
            aria-label="Close menu"
            style="position: absolute; top: 1.25rem; right: 1.25rem; color: rgba(255,255,255,0.6); background: none; border: none; cursor: pointer; padding: 0.5rem; transition: color 0.2s ease;"
            onmouseover="this.style.color='rgba(255,255,255,1)'"
            onmouseout="this.style.color='rgba(255,255,255,0.6)'"
        >
            <svg style="width: 1.75rem; height: 1.75rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="flex flex-col h-full px-8 pb-10" style="padding-top: 9rem;">

            {{-- Nav links (natural height, no flex-1 so spacing stays consistent) --}}
            <div class="flex flex-col">
                @foreach(['About' => '#about', 'Gallery' => '#gallery', 'Videos' => '#video', 'Collabs' => '#collaborations', 'Product' => '#products'] as $label => $href)
                <a
                    href="{{ $href }}"
                    @click="open = false"
                    class="group flex items-center justify-between border-b py-4 transition-colors duration-200"
                    style="border-color: rgba(255,255,255,0.08);"
                >
                    <span
                        class="font-black uppercase text-white group-hover:text-[#D5FF4F] transition-colors duration-200"
                        style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(1.6rem, 6vw, 2.2rem); letter-spacing: -0.03em; line-height: 1;"
                    >{{ $label }}</span>
                    <svg class="w-4 h-4 text-white/20 group-hover:text-[#D5FF4F] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @endforeach
            </div>

            {{-- Partnership CTA (tight below links) --}}
            <div class="pt-5">
                <a
                    href="#partnership"
                    @click="open = false"
                    class="inline-block font-black uppercase text-[#1A1A1A] bg-[#D5FF4F] px-7 py-3.5 transition-opacity duration-200 hover:opacity-80"
                    style="font-family: Helvetica, Arial, sans-serif; font-size: 0.95rem; letter-spacing: -0.01em;"
                >Partnership →</a>
            </div>

            {{-- Flexible spacer pushes social to bottom --}}
            <div class="flex-1"></div>

            {{-- Bottom: social + contact --}}
            <div class="pt-5" style="border-top: 1px solid rgba(255,255,255,0.08);">
                <div class="flex gap-6 mb-3">
                    <a href="https://www.instagram.com/____huruhara" target="_blank"
                       class="text-white/40 hover:text-white/80 transition-colors duration-200"
                       style="font-size: 0.65rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; font-family: Helvetica,Arial,sans-serif;">
                        Instagram
                    </a>
                    <a href="https://www.strava.com/clubs/1145349" target="_blank"
                       class="text-white/40 hover:text-white/80 transition-colors duration-200"
                       style="font-size: 0.65rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; font-family: Helvetica,Arial,sans-serif;">
                        Strava
                    </a>
                    <a href="https://www.tiktok.com/@huruhararunningclub" target="_blank"
                       class="text-white/40 hover:text-white/80 transition-colors duration-200"
                       style="font-size: 0.65rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; font-family: Helvetica,Arial,sans-serif;">
                        TikTok
                    </a>
                </div>
                <p style="color: rgba(255,255,255,0.25); font-size: 0.65rem; font-family: Helvetica,Arial,sans-serif; letter-spacing: 0.05em;">
                    huruhararunning@gmail.com
                </p>
            </div>

        </div>
    </div>

</nav>
