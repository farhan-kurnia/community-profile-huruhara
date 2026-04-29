<style>
    @media (max-width: 1023px) {
        .gallery-photo-12 { object-position: 20% 8% !important; }
    }
</style>

<section id="gallery" style="position: relative; height: calc({{ count($galleryPhotos) + 1 }} * 100vh);">

    <div style="position: sticky; top: 0; height: 100vh; overflow: hidden;">

        {{-- Photo slides (stacked, fade in/out via JS) --}}
        @foreach($galleryPhotos as $index => $photo)
        <div class="gallery-slide"
             style="position: absolute; inset: 0; z-index: 1; opacity: 0;">
            @php $objPos = in_array($index, [4, 9]) ? 'center 20%' : ($index === 11 ? 'center 8%' : 'center center'); @endphp
            <img
                src="{{ $photo['src'] }}"
                alt="{{ $photo['alt'] }}"
                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                class="{{ $index === 11 ? 'gallery-photo-12' : '' }}"
                style="width: 100%; height: 100%; object-fit: cover; object-position: {{ $objPos }};"
                onerror="this.parentElement.style.background='#1A1A1A'"
            >
        </div>
        @endforeach

        {{-- Gradient overlay --}}
        <div style="position: absolute; inset: 0; z-index: 10; pointer-events: none;
                    background: linear-gradient(to bottom, rgba(0,0,0,0.32) 0%, transparent 30%, transparent 60%, rgba(0,0,0,0.55) 100%);"></div>

        {{-- UI overlay --}}
        <div style="position: absolute; inset: 0; z-index: 20; pointer-events: none; display: flex; flex-direction: column; justify-content: space-between;">

            {{-- Top spacer (counter moved to navbar) --}}
            <div style="height: 1.75rem;"></div>

            {{-- Bottom: large number + title + progress bar --}}
            <div style="padding: 2rem 2rem 0;">
                <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 0.5rem;">
                    <span id="gallery-big-num"
                          style="color: rgba(255,255,255,0.12); font-family: Helvetica,Arial,sans-serif; font-size: clamp(4rem, 15vw, 9rem); font-weight: 900; line-height: 1; letter-spacing: -0.04em;">
                        01
                    </span>
                    <span style="color: rgba(255,255,255,0.35); font-family: Helvetica,Arial,sans-serif; font-size: 0.65rem; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 0.5rem;">
                        Scroll to explore
                    </span>
                </div>
                <p style="color: rgba(255,255,255,0.75); font-family: Helvetica,Arial,sans-serif; font-size: clamp(1.1rem, 3vw, 1.6rem); font-weight: 800; letter-spacing: -0.02em; text-transform: uppercase; margin-bottom: 0.85rem;">
                    Our Best Moments
                </p>
                {{-- Progress bar --}}
                <div style="height: 1px; background: rgba(255,255,255,0.12);">
                    <div id="gallery-progress"
                         style="height: 100%; background: rgba(255,255,255,0.6); width: 0%; transition: width 0.45s ease;">
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<script>
(function () {
    var section  = document.getElementById('gallery');
    var slides   = Array.from(section.querySelectorAll('.gallery-slide'));
    var counters = Array.from(document.querySelectorAll('.gallery-counter-display'));
    var bigNum   = document.getElementById('gallery-big-num');
    var progress = document.getElementById('gallery-progress');
    var total    = slides.length;
    var current  = -1;

    function pad(n) { return String(n).padStart(2, '0'); }

    function fadeTo(idx) {
        if (idx === current) return;

        var newSlide = slides[idx];

        // Place new slide on top, invisible
        newSlide.style.transition = 'none';
        newSlide.style.opacity    = '0';
        newSlide.style.zIndex     = '3';
        newSlide.offsetHeight;                       // force reflow

        // Fade new slide in
        newSlide.style.transition = 'opacity 0.65s ease';
        newSlide.style.opacity    = '1';

        // Fade old slide out
        if (current >= 0) {
            var oldSlide = slides[current];
            oldSlide.style.transition = 'opacity 0.65s ease';
            oldSlide.style.opacity    = '0';
            (function (i) {
                setTimeout(function () { slides[i].style.zIndex = '1'; }, 700);
            })(current);
        }

        current = idx;
    }

    function update() {
        var rect       = section.getBoundingClientRect();
        var scrollable = section.offsetHeight - window.innerHeight;
        var scrolled   = Math.max(0, Math.min(-rect.top, scrollable));
        var pct        = scrollable > 0 ? scrolled / scrollable : 0;
        var idx        = Math.min(Math.floor(pct * total), total - 1);

        fadeTo(idx);

        var label = pad(idx + 1);
        counters.forEach(function(el) { el.textContent = label + ' / ' + pad(total); });
        bigNum.textContent = label;
        progress.style.width = Math.round((idx + 1) / total * 100) + '%';
    }

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update, { passive: true });
    update();
})();
</script>
