<script>
    window.__galleryPhotos = @json($galleryPhotos);
</script>

<section id="gallery" class="py-24 lg:py-36 bg-gray-50"
    x-data="{
        active: null,
        photos: window.__galleryPhotos,
        open(index) { this.active = index; document.body.style.overflow = 'hidden'; },
        close() { this.active = null; document.body.style.overflow = ''; },
        prev() { this.active = (this.active - 1 + this.photos.length) % this.photos.length; },
        next() { this.active = (this.active + 1) % this.photos.length; }
    }"
    @keydown.escape.window="close()"
    @keydown.arrow-left.window="if(active !== null) prev()"
    @keydown.arrow-right.window="if(active !== null) next()"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-12">
            <h2
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="font-black text-gray-900 uppercase leading-none transition-all duration-700 ease-out"
                style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2.5rem, 7vw, 5.5rem);"
            >
                Our Best<br>Moments
            </h2>
            <p
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                class="text-gray-500 max-w-xs text-sm mt-4 lg:mt-0 lg:mb-2 transition-all duration-700 ease-out delay-150"
            >
                Every run is a story. These are ours.
            </p>
        </div>

        {{-- CSS Masonry Grid --}}
        <div class="columns-2 lg:columns-3 xl:columns-4 gap-3">
            @foreach($galleryPhotos as $index => $photo)
            <div
                class="break-inside-avoid mb-3 cursor-pointer group relative overflow-hidden"
                @click="open({{ $index }})"
            >
                <img
                    src="{{ $photo['src'] }}"
                    alt="{{ $photo['alt'] }}"
                    class="w-full object-cover group-hover:scale-105 transition-transform duration-500"
                    loading="lazy"
                    onerror="this.parentElement.style.background='#E5E7EB'; this.parentElement.style.minHeight='200px'; this.style.display='none'"
                >
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/35 transition-colors duration-300 flex items-center justify-center">
                    <svg class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                    </svg>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Lightbox --}}
    <div
        x-show="active !== null"
        x-transition:enter="transition duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-[200] bg-black/95 flex items-center justify-center"
        @click.self="close()"
    >
        {{-- Prev button --}}
        <button
            @click="prev()"
            class="absolute left-4 lg:left-8 text-white/70 hover:text-white p-2 transition-colors"
            aria-label="Previous"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        {{-- Image --}}
        <img
            :src="active !== null && photos[active] ? photos[active].src : ''"
            :alt="active !== null && photos[active] ? photos[active].alt : ''"
            class="max-h-[85vh] max-w-[80vw] object-contain"
        >

        {{-- Next button --}}
        <button
            @click="next()"
            class="absolute right-4 lg:right-8 text-white/70 hover:text-white p-2 transition-colors"
            aria-label="Next"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        {{-- Close button --}}
        <button
            @click="close()"
            class="absolute top-4 right-4 text-white/70 hover:text-white p-2 transition-colors"
            aria-label="Close"
        >
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Counter --}}
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white/50 text-sm">
            <span x-text="active !== null ? (active + 1) + ' / ' + photos.length : ''"></span>
        </div>
    </div>

</section>
