<section id="collaborations" class="py-24 lg:py-36 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Section header --}}
        <div
            x-data="{ visible: false }"
            x-intersect.once="visible = true"
            :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
            class="text-center mb-16 transition-all duration-700 ease-out"
        >
            <p class="text-xs font-semibold tracking-[0.2em] uppercase text-gray-400 mb-4">
                Past Collaborations
            </p>
            <h2
                class="font-black text-gray-900 uppercase leading-none"
                style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2rem, 5vw, 4rem);"
            >
                Brands That Believe in Us
            </h2>
        </div>

        {{-- Brand logos --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8 lg:gap-12 mb-24">
            @foreach($brands as $index => $brand)
            <div
                class="group"
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                :style="'transition: opacity 0.5s ease, transform 0.5s ease; transition-delay: ' + ({{ $index }} * 80) + 'ms'"
            >
                <img
                    src="{{ asset('images/collaborations/' . $brand['logo']) }}"
                    alt="{{ $brand['name'] }}"
                    class="h-16 lg:h-20 w-full object-contain grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300"
                    onerror="this.parentElement.innerHTML = '<span class=\'text-gray-300 font-semibold text-sm tracking-widest uppercase\'>' + '{{ $brand['name'] }}' + '</span>'"
                >
            </div>
            @endforeach
        </div>

        {{-- Brand quote --}}
        <div
            x-data="{ visible: false }"
            x-intersect.once="visible = true"
            :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-6'"
            class="max-w-3xl mx-auto border-l-4 border-gray-900 pl-8 lg:pl-12 transition-all duration-1000 ease-out"
        >
            <blockquote
                class="font-black text-gray-900 uppercase leading-tight mb-6"
                style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(1.5rem, 4vw, 2.5rem);"
            >
                "Huruhara isn't just an audience — we are a community that genuinely shows up and moves."
            </blockquote>
            <cite class="text-gray-400 text-sm not-italic">
                <span class="font-semibold text-gray-900">Andya Amarendra</span>, Founder
            </cite>
        </div>

    </div>
</section>
