<section id="stats" class="bg-[#1A1A1A] py-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <p
            x-data="{ visible: false }"
            x-intersect.once="visible = true"
            :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
            class="text-center text-white/50 text-xs font-semibold tracking-[0.2em] uppercase mb-16 transition-all duration-700 ease-out"
        >
            Huruhara by the Numbers
        </p>

        <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-white/10">

            @php
            $stats = [
                ['number' => 30,  'suffix' => '+',  'label' => 'Crew Members',       'sublabel' => 'By Invitation Only'],
                ['number' => 48,  'suffix' => '',   'label' => 'Running Events',      'sublabel' => ''],
                ['number' => 12,  'suffix' => 'K+', 'label' => 'KM Run Together',    'sublabel' => ''],
                ['number' => 25,  'suffix' => 'K+', 'label' => 'Social Media Reach', 'sublabel' => ''],
            ];
            @endphp

            @foreach($stats as $index => $stat)
            <div
                x-data="{ ...counter({ target: {{ $stat['number'] }}, suffix: '{{ $stat['suffix'] }}' }), visible: false }"
                x-intersect.once="visible = true; start()"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                :style="'transition: opacity 0.6s ease-out ' + ({{ $index }} * 120) + 'ms, transform 0.6s ease-out ' + ({{ $index }} * 120) + 'ms'"
                class="text-center px-4 lg:px-8 py-12 {{ $index === 0 ? 'border-l-0' : '' }}"
            >
                <div
                    class="font-black text-white leading-none mb-3"
                    style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(3rem, 8vw, 5.5rem);"
                >
                    <span x-text="display">0</span>
                </div>
                <p class="text-white/50 text-sm tracking-wide">{{ $stat['label'] }}</p>
                @if($stat['sublabel'])
                <p class="text-white/25 text-xs tracking-widest uppercase mt-1.5">{{ $stat['sublabel'] }}</p>
                @endif
            </div>
            @endforeach

        </div>
    </div>
</section>
