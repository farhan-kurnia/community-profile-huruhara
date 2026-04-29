<div
    id="intro-overlay"
    style="position: fixed; inset: 0; z-index: 300; background: #1A1A1A; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 1.25rem;"
>
    <img
        id="intro-logo"
        src="{{ asset('images/logo/huruhara-logo-white.png') }}"
        alt="Huruhara"
        onerror="this.style.display='none'; document.getElementById('intro-logo-text').style.display='block';"
        style="width: 220px; max-width: 60vw; object-fit: contain; opacity: 0; transform: scale(0.82); transition: opacity 0.85s ease, transform 1s cubic-bezier(0.34, 1.56, 0.64, 1);"
    >
    <span
        id="intro-logo-text"
        style="display: none; font-family: Helvetica, Arial, sans-serif; color: #fff; font-size: clamp(2rem, 9vw, 3.5rem); font-weight: 900; letter-spacing: -0.04em; text-transform: uppercase; opacity: 0; transform: scale(0.82); transition: opacity 0.85s ease, transform 1s cubic-bezier(0.34, 1.56, 0.64, 1);"
    >HURUHARA</span>

    <p
        id="intro-tagline"
        style="color: rgba(255,255,255,0.4); font-size: 0.65rem; font-weight: 600; letter-spacing: 0.28em; text-transform: uppercase; opacity: 0; transition: opacity 1s ease 0.45s;"
    >Running Community</p>
</div>

<script>
    (function () {
        var overlay  = document.getElementById('intro-overlay');
        var logo     = document.getElementById('intro-logo');
        var logoText = document.getElementById('intro-logo-text');
        var tagline  = document.getElementById('intro-tagline');

        document.body.style.overflow = 'hidden';

        // Phase 1 — logo & tagline fade in
        setTimeout(function () {
            logo.style.opacity     = '1';
            logo.style.transform   = 'scale(1)';
            logoText.style.opacity = '1';
            logoText.style.transform = 'scale(1)';
            tagline.style.opacity  = '1';
        }, 80);

        // Phase 2 — overlay slides up off screen
        setTimeout(function () {
            overlay.style.transition = 'transform 0.95s cubic-bezier(0.76, 0, 0.24, 1)';
            overlay.style.transform  = 'translateY(-105%)';
        }, 2500);

        // Phase 3 — remove from DOM, restore scroll
        setTimeout(function () {
            document.body.style.overflow = '';
            if (overlay && overlay.parentNode) overlay.parentNode.removeChild(overlay);
        }, 3550);
    })();
</script>
