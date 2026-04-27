<section id="video" class="relative flex items-end pb-24 lg:pb-40 overflow-hidden" style="min-height: 140vh;">

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
            <source src="{{ asset('videos/community-video.mp4') }}" type="video/mp4">
        </video>

        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-black/10"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 w-full">

        <p class="text-white/60 text-xs font-semibold tracking-[0.2em] uppercase mb-5">
            Huruhara in Motion
        </p>

        <h2
            class="text-white font-black uppercase leading-none mb-6 tracking-tighter"
            style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2.5rem, 7vw, 5.5rem);"
        >
            Watch Us<br>Move.
        </h2>

        <p class="text-white/70 text-lg max-w-md leading-relaxed">
            The journey and energy of the Huruhara community, on film.
        </p>

    </div>

</section>
