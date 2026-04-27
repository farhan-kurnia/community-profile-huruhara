<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Huruhara — Indonesia's running community. Building connections, pushing limits, and celebrating every step together.">
    <meta property="og:title" content="Huruhara Running Community">
    <meta property="og:description" content="Indonesia's running community. Moving together, growing together.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <title>Huruhara Running Community</title>

    {{-- Tailwind CSS CDN with custom config --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif'],
                    },
                    letterSpacing: {
                        tightest: '-0.04em',
                    }
                }
            }
        }
    </script>

    {{-- Alpine.js CDN (intersect plugin must load first) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        html { scroll-behavior: smooth; }
        [x-cloak] { display: none !important; }
        section[id] { scroll-margin-top: 80px; }
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; letter-spacing: -0.02em; }
        h1, h2, h3, h4, h5, h6 { letter-spacing: -0.04em; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased" x-data>

    @include('partials.navbar')

    @include('partials.hero')

    @include('partials.about')

    @include('partials.stats')

    @include('partials.gallery')

    @include('partials.videos')

    @include('partials.collaborations')

    @include('partials.products')

    @include('partials.partnership')

    @include('partials.footer')

    {{-- Alpine counter component definition --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productCarousel', () => ({
                current: 0,
                perPage: 3,
                total: 0,
                init() {
                    this.total = parseInt(this.$el.dataset.count || 0);
                    this.updatePerPage();
                    window.addEventListener('resize', () => this.updatePerPage(), { passive: true });
                },
                updatePerPage() {
                    const w = window.innerWidth;
                    this.perPage = w >= 1024 ? 3 : w >= 640 ? 2 : 1;
                    this.current = Math.min(this.current, this.maxIndex);
                },
                get maxIndex() { return Math.max(0, this.total - this.perPage); },
                get canPrev() { return this.current > 0; },
                get canNext() { return this.current < this.maxIndex; },
                get dots() { return Array.from({ length: this.maxIndex + 1 }, (_, i) => i); },
                prev() { if (this.canPrev) this.current--; },
                next() { if (this.canNext) this.current++; },
            }));

            Alpine.data('counter', ({ target, suffix = '' }) => ({
                display: '0' + suffix,
                started: false,
                start() {
                    if (this.started) return;
                    this.started = true;
                    const steps = 60;
                    const step = target / steps;
                    let current = 0;
                    const timer = setInterval(() => {
                        current = Math.min(current + step, target);
                        this.display = Math.floor(current).toLocaleString('id-ID') + suffix;
                        if (current >= target) clearInterval(timer);
                    }, 1800 / steps);
                }
            }));
        });
    </script>

</body>
</html>
