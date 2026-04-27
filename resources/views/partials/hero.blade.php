<section id="hero" class="relative min-h-screen flex items-end pb-20 lg:pb-32 overflow-hidden">

    {{-- Background video --}}
<div class="absolute inset-0 z-0">
    <video
        autoplay
        muted
        loop
        playsinline
        class="w-full h-full object-cover object-center"
        onerror="this.parentElement.style.background='#1A1A1A'"
    >
        <source src="{{ asset('videos/hero-video.mp4') }}" type="video/mp4">
    </video>

    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/20"></div>
</div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 w-full">

        <p class="text-white/60 text-xs font-semibold tracking-[0.2em] uppercase mb-5">
            Running Community
        </p>

        <h1
            class="text-white font-bold uppercase leading-none mb-6 tracking-tighter"
            style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2rem, 6vw, 5rem);"
        >
            Jakarta, ID.<br>Built on Connection.
        </h1>

        <p class="text-white/75 text-lg max-w-md mb-10 leading-relaxed">
            Indonesia's running community — building connections, pushing limits, and celebrating every step together.
        </p>

        <div class="flex flex-col sm:flex-row gap-4">
            <a
                href="#about"
                class="inline-block bg-white text-gray-900 font-semibold px-8 py-4 text-sm tracking-wide uppercase hover:bg-gray-100 transition-colors duration-200"
            >
                Who We Are
            </a>
            <a
                href="#partnership"
                class="inline-block border border-white text-white font-semibold px-8 py-4 text-sm tracking-wide uppercase hover:bg-white hover:text-gray-900 transition-colors duration-200"
            >
                Become a Partner
            </a>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>

</section>
