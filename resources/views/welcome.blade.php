<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Primary SEO --}}
    <title>Huruhara Running Community — Jakarta</title>
    <meta name="description" content="Huruhara is an active running community based in Jakarta, Indonesia. Move together, grow together.">
    <meta name="keywords" content="huruhara, huruhara run, huruhara running, huruhara running community, huru hara, komunitas lari, komunitas lari Indonesia, running community Indonesia">
    <meta name="author" content="Huruhara Running Community">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://huruhararunning.com">

    {{-- Open Graph (WhatsApp, IG, Facebook) --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://huruhararunning.com">
    <meta property="og:site_name" content="Huruhara Running Community">
    <meta property="og:locale" content="id_ID">
    <meta property="og:title" content="Huruhara Running Community — Jakarta">
    <meta property="og:description" content="Huruhara is an active running community based in Jakarta, Indonesia. Move together, grow together.">
    <meta property="og:image" content="https://huruhararunning.com/images/og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Huruhara Running Community — Jakarta">
    <meta name="twitter:description" content="Huruhara is an active running community based in Jakarta, Indonesia. Move together, grow together.">
    <meta name="twitter:image" content="https://huruhararunning.com/images/og-image.jpg">

    {{-- JSON-LD Structured Data --}}
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SportsOrganization",
        "name": "Huruhara Running Community",
        "alternateName": ["Huruhara Run", "Huruhara", "Huru Hara Running"],
        "url": "https://huruhararunning.com",
        "logo": "https://huruhararunning.com/images/logo/huruhara-logo.png",
        "image": "https://huruhararunning.com/images/og-image.jpg",
        "description": "Huruhara adalah komunitas lari Indonesia yang aktif, bergerak bersama, bertumbuh bersama.",
        "sport": "Running",
        "email": "huruhararunning@gmail.com",
        "sameAs": [
            "https://www.instagram.com/____huruhara",
            "https://www.strava.com/clubs/1145349",
            "https://www.tiktok.com/@huruhararunningclub"
        ]
    }
    </script>
    @endverbatim

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

    {{-- Preload critical assets --}}
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <link rel="preload" href="{{ asset('js/alpine-intersect.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('js/alpine.min.js') }}" as="script">

    {{-- Tailwind CSS (pre-built, minified) --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Alpine.js (local, intersect plugin must load first) --}}
    <script defer src="{{ asset('js/alpine-intersect.min.js') }}"></script>
    <script defer src="{{ asset('js/alpine.min.js') }}"></script>

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
