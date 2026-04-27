<section id="products" class="py-24 lg:py-36 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-12 tracking-tighter">
            <h2
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="font-black text-gray-900 uppercase leading-none transition-all duration-700 ease-out"
                style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2.5rem, 7vw, 5.5rem);"
            >
                Hhouse
            </h2>
            <p
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                class="text-gray-500 max-w-xs text-sm mt-4 lg:mt-0 lg:mb-2 transition-all duration-700 ease-out delay-150"
            >
                Hhouse is a curated space where passion, performance, and lifestyle come together.
            </p>
        </div>

        <div
            x-data="productCarousel"
            data-count="{{ count($products) }}"
            class="relative"
        >

            {{-- Track --}}
            <div class="overflow-hidden">
                <div
                    class="flex"
                    :style="`transform: translateX(-${current * (100 / perPage)}%); transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);`"
                >
                    @foreach($products as $i => $product)
                    <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 px-1.5">
                        <div class="overflow-hidden bg-gray-100 aspect-square">
                            <img
                                src="{{ $product['src'] }}"
                                alt="{{ $product['name'] }}"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                                loading="{{ $i < 3 ? 'eager' : 'lazy' }}"
                                onerror="this.parentElement.style.background='#E5E7EB'; this.style.display='none'"
                            >
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Prev arrow --}}
            <button
                @click="prev()"
                :disabled="!canPrev"
                :class="canPrev ? 'opacity-100 hover:bg-gray-900 hover:text-white hover:border-gray-900' : 'opacity-25 cursor-not-allowed'"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-5 lg:-translate-x-7 w-12 h-12 border border-gray-300 bg-white rounded-full flex items-center justify-center transition-all duration-200 shadow-sm"
                aria-label="Previous"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            {{-- Next arrow --}}
            <button
                @click="next()"
                :disabled="!canNext"
                :class="canNext ? 'opacity-100 hover:bg-gray-900 hover:text-white hover:border-gray-900' : 'opacity-25 cursor-not-allowed'"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-5 lg:translate-x-7 w-12 h-12 border border-gray-300 bg-white rounded-full flex items-center justify-center transition-all duration-200 shadow-sm"
                aria-label="Next"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            {{-- Dots --}}
            <div class="flex justify-center items-center gap-2 mt-8">
                <template x-for="dot in dots" :key="dot">
                    <button
                        @click="current = dot"
                        :class="current === dot ? 'bg-gray-900 w-5' : 'bg-gray-300 w-2'"
                        class="h-2 rounded-full transition-all duration-300"
                    ></button>
                </template>
            </div>

        </div>

    </div>
</section>
