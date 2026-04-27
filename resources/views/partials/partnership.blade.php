<section id="partnership" class="py-24 lg:py-36 bg-[#1A1A1A]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        {{-- Section header --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <div
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10'"
                class="transition-all duration-700 ease-out"
            >
                <p class="text-white/50 text-xs font-semibold tracking-[0.2em] uppercase mb-6">
                    Media Kit & Partnership
                </p>
                <h2
                    class="font-black text-white uppercase leading-none"
                    style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2.5rem, 7vw, 5.5rem);"
                >
                    Let's Move<br>Together
                </h2>
            </div>
            <div
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-10'"
                class="flex flex-col justify-end gap-6 transition-all duration-700 ease-out delay-150"
            >
                <p class="text-white/70 text-lg leading-relaxed">
                    Huruhara offers an authentic platform to reach Indonesia's active running community —
                    young, engaged, and with real purchasing power.
                </p>
                <a
                    href="{{ asset('media/huruhara-media-kit.pdf') }}"
                    download
                    class="inline-flex items-center gap-3 border border-white text-white px-6 py-4 text-sm font-semibold tracking-wide uppercase hover:bg-white hover:text-gray-900 transition-colors duration-200 w-fit"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Download Media Kit (PDF)
                </a>
            </div>
        </div>

        {{-- Audience demographics --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-white/10 mb-20">
            @php
            $demographics = [
                ['metric' => '78%', 'label' => 'Ages 22–35', 'desc' => 'Productive age segment with active purchasing power'],
                ['metric' => '60/40', 'label' => 'Male / Female', 'desc' => 'Balanced audience with active lifestyle interests'],
                ['metric' => '25K+', 'label' => 'Total Social Reach', 'desc' => 'Instagram, Strava, and WhatsApp community'],
            ];
            @endphp

            @foreach($demographics as $index => $demo)
            <div
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                :style="'background: #1A1A1A; transition: opacity 0.6s ease-out ' + ({{ $index }} * 120) + 'ms, transform 0.6s ease-out ' + ({{ $index }} * 120) + 'ms'"
                class="p-8 lg:p-12"
            >
                <div
                    class="font-black text-white leading-none mb-3"
                    style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2.5rem, 6vw, 4.5rem);"
                >{{ $demo['metric'] }}</div>
                <p class="text-white font-semibold mb-2">{{ $demo['label'] }}</p>
                <p class="text-white/40 text-sm">{{ $demo['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Why partner --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <h3
                x-data="{ visible: false }"
                x-intersect.once="visible = true"
                :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="font-black text-white uppercase leading-tight transition-all duration-700 ease-out"
                style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2rem, 5vw, 3.5rem);"
            >
                Why Partner<br>with Huruhara?
            </h3>
            <ul class="space-y-5">
                @foreach([
                    'An organic audience that\'s actively engaged — not passive followers',
                    'Authentic UGC content from events and community activities',
                    'Cross-platform exposure: Instagram, Strava, WhatsApp, TikTok',
                    'A runner network with high brand loyalty',
                    'Event co-branding, product seeding, and ambassador programs',
                ] as $index => $reason)
                <li
                    x-data="{ visible: false }"
                    x-intersect.once="visible = true"
                    :class="visible ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-6'"
                    :style="'transition: opacity 0.5s ease-out ' + ({{ $index }} * 80) + 'ms, transform 0.5s ease-out ' + ({{ $index }} * 80) + 'ms'"
                    class="flex items-start gap-4"
                >
                    <span class="w-5 h-5 bg-white flex-shrink-0 mt-0.5"></span>
                    <span class="text-white/75 leading-relaxed">{{ $reason }}</span>
                </li>
                @endforeach
            </ul>
        </div>

        {{-- Strava social proof --}}
        <div class="flex flex-col sm:flex-row sm:items-center gap-4 border border-white/15 p-6 mb-20">
            <div class="w-10 h-10 bg-[#FC4C02] rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M15.387 17.944l-2.089-4.116h-3.065L15.387 24l5.15-10.172h-3.066m-7.008-5.599l2.836 5.598h4.172L10.463 0l-7 13.828h4.169"/>
                </svg>
            </div>
            <div>
                <p class="text-white font-semibold">Find Us on Strava</p>
                <p class="text-white/40 text-sm">Our activity is publicly verifiable — not just claims.</p>
            </div>
            <a
                href="https://www.strava.com/clubs/1145349"
                target="_blank"
                rel="noopener noreferrer"
                class="sm:ml-auto text-white text-sm font-semibold hover:underline whitespace-nowrap"
            >
                View Club →
            </a>
        </div>

        {{-- Partnership form --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                <h3
                    class="font-black text-white uppercase leading-tight mb-4"
                    style="font-family: Helvetica, Arial, sans-serif; font-size: clamp(2rem, 5vw, 3rem);"
                >
                    Get in Touch
                </h3>
                <p class="text-white/50 text-sm mb-2">Or email us directly at</p>
                <a
                    href="mailto:huruhararunning@gmail.com"
                    class="text-white hover:underline font-medium"
                >huruhararunning@gmail.com</a>

                <div class="mt-8 space-y-4 text-white/40 text-sm">
                    <p>We're open to all forms of collaboration:</p>
                    <ul class="space-y-2 ml-4">
                        <li>• Event sponsorship & co-branding</li>
                        <li>• Product seeding & review</li>
                        <li>• Brand ambassador program</li>
                        <li>• Content creation & social media</li>
                        <li>• Bespoke partnership</li>
                    </ul>
                </div>
            </div>

            {{-- Form --}}
            @if(session('partnership_success'))
                <div class="text-center py-16">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-white font-semibold text-xl mb-2">Message Sent!</p>
                    <p class="text-white/50">We'll get back to you within 1–2 business days.</p>
                </div>
            @else
                <form action="{{ route('partnership.store') }}" method="POST" class="space-y-4">
                    @csrf

                    @if($errors->any())
                    <div class="border border-red-500/40 bg-red-500/10 px-4 py-3 text-red-300 text-sm">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input
                            type="text" name="name" placeholder="Full Name" required
                            value="{{ old('name') }}"
                            class="bg-transparent border border-white/25 text-white placeholder-white/35 px-4 py-3 text-sm focus:outline-none focus:border-white transition-colors duration-200 w-full"
                        >
                        <input
                            type="text" name="company" placeholder="Brand / Company" required
                            value="{{ old('company') }}"
                            class="bg-transparent border border-white/25 text-white placeholder-white/35 px-4 py-3 text-sm focus:outline-none focus:border-white transition-colors duration-200 w-full"
                        >
                    </div>

                    <input
                        type="email" name="email" placeholder="Email Address" required
                        value="{{ old('email') }}"
                        class="bg-transparent border border-white/25 text-white placeholder-white/35 px-4 py-3 text-sm focus:outline-none focus:border-white transition-colors duration-200 w-full"
                    >

                    <input
                        type="tel" name="phone" placeholder="WhatsApp Number (optional)"
                        value="{{ old('phone') }}"
                        class="bg-transparent border border-white/25 text-white placeholder-white/35 px-4 py-3 text-sm focus:outline-none focus:border-white transition-colors duration-200 w-full"
                    >

                    <select
                        name="budget_range"
                        class="bg-[#1A1A1A] border border-white/25 text-white/60 px-4 py-3 text-sm focus:outline-none focus:border-white transition-colors duration-200 w-full appearance-none"
                    >
                        <option value="" disabled selected>Collaboration Budget Range</option>
                        <option value="<5jt" class="text-gray-900 bg-white">Under Rp 5,000,000</option>
                        <option value="5-20jt" class="text-gray-900 bg-white">Rp 5,000,000 – 20,000,000</option>
                        <option value="20-50jt" class="text-gray-900 bg-white">Rp 20,000,000 – 50,000,000</option>
                        <option value=">50jt" class="text-gray-900 bg-white">Above Rp 50,000,000</option>
                    </select>

                    <textarea
                        name="message" placeholder="Tell us about the collaboration you have in mind..." rows="4" required
                        class="bg-transparent border border-white/25 text-white placeholder-white/35 px-4 py-3 text-sm focus:outline-none focus:border-white transition-colors duration-200 w-full resize-none"
                    >{{ old('message') }}</textarea>

                    <button
                        type="submit"
                        class="w-full bg-white text-gray-900 font-semibold py-4 text-sm tracking-wide uppercase hover:bg-gray-100 transition-colors duration-200"
                    >
                        Send Message
                    </button>
                </form>
            @endif
        </div>

    </div>
</section>
