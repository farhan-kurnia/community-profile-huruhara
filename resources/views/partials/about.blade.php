<section id="about" class="py-24 lg:py-36 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

            {{-- Text column — slides in from left --}}
            <div
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-12'"
                class="transition-all duration-700 ease-out"
            >
                <p class="text-xs font-semibold tracking-[0.2em] uppercase bg-[#1A1A1A] text-white inline-block px-3 py-1 mb-6">
                    About Us
                </p>

                <h2
                    class="font-black text-gray-900 uppercase leading-none mb-8 tracking-tighter"
                    style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2rem, 6vw, 5rem);"
                >
                    Born on<br>City Streets
                </h2>

                <p class="text-gray-500 text-lg leading-relaxed mb-6">
                    Huruhara started as a small group of runners who believed that running is more than a sport —
                    it's a way to build community, push boundaries, and celebrate every single step.
                </p>

                <p class="text-gray-500 text-lg leading-relaxed mb-10">
                    From early morning runs through city streets to collaborations with top brands,
                    Huruhara continues to grow as the authentic voice of Indonesia's running community.
                </p>

                <ul class="space-y-4">
                    @foreach(['Community First, Always', 'Show Up Every Day', 'Driven By Performance'] as $value)
                    <li class="flex items-center gap-3">
                        <span class="w-6 h-0.5 bg-gray-900 flex-shrink-0"></span>
                        <span class="font-medium text-gray-900">{{ $value }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Image column — slides in from right --}}
            <div
                class="relative"
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-12'"
                style="transition: opacity 0.7s ease-out 0.15s, transform 0.7s ease-out 0.15s;"
            >
                <div class="w-full aspect-[4/5] bg-gray-100 overflow-hidden">
                    <img
                        src="{{ asset('images/gallery/about-main.jpg') }}"
                        alt="Huruhara running together"
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.style.background='#E5E7EB'; this.style.display='none'"
                    >
                </div>
                <div class="absolute -bottom-10 -left-6 w-2/3 aspect-square border-4 border-white shadow-2xl hidden lg:block overflow-hidden bg-gray-200">
                    <img
                        src="{{ asset('images/gallery/about-secondary.jpg') }}"
                        alt="Huruhara community"
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.style.background='#D1D5DB'; this.style.display='none'"
                    >
                </div>
            </div>

        </div>
    </div>
</section>
