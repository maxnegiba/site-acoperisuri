/* ==========================================================================
   CSS VARIABLES
   ========================================================================== */

:root {
    /* ===== CULORI PRINCIPALE ===== */
    --primary-color: #d32f2f;
    --primary-dark: #b71c1c;
    --primary-light: #ff6659;
    --color-whatsapp: #25d366;
    --color-green: #4caf50;
    --color-blue: #1976d2;

    /* ===== CULORI NEUTRE ===== */
    --text-primary: #2c3e50;
    --text-secondary: #555;
    --text-light: #bbb;
    --bg-light: #f8f9fa;
    --bg-white: #ffffff;
    --border-color: rgba(0, 0, 0, 0.1);

    /* ===== DIMENSIUNI LAYOUT ===== */
    --header-height: 100px;
    --header-height-mobile: 80px;
    --max-container-width: 1400px;
    --section-padding: 5rem;
    --section-padding-mobile: 3rem;

    /* ===== BREAKPOINTS ===== */
    --mobile: 480px;
    --tablet: 768px;
    --desktop: 1200px;
    --desktop-xl: 1600px;

    /* ===== EFECTE VISUALE ===== */
    --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
    --shadow-lg: 0 8px 25px rgba(0, 0, 0, 0.2);
    --shadow-primary: 0 4px 15px rgba(211, 47, 47, 0.3);
    --border-radius-sm: 4px;
    --border-radius-md: 8px;
    --border-radius-lg: 16px;
    --border-radius-xl: 24px;

    /* ===== STRATIFICARE (z-index) ===== */
    --z-base: 1;
    --z-low: 10;
    --z-mid: 100;
    --z-high: 1000;
    --z-header: var(--z-high);             /* 1000 */
    --z-hero-video: calc(var(--z-high) - 5); /* 995 */
    --z-hero-overlay: var(--z-high);       /* 1000 */
    --z-hero-content: calc(var(--z-high) + 1); /* 1001 */
    --z-overlay: 1010;
    --z-modal: 1020;
    --z-tooltip: 1030;
    --z-notification: 1040;

    /* ===== VALORI RGB PENTRU EFECTE ===== */
    --primary-color-rgb: 211, 47, 47;
    --black-rgb: 0, 0, 0;
    --white-rgb: 255, 255, 255;
}

/* ===== MEDIA QUERIES PENTRU VARIABILE ===== */
@media (max-width: 768px) {
    :root {
        --header-height: var(--header-height-mobile);
        --section-padding: var(--section-padding-mobile);
    }
}

/* ==========================================================================
   RESET & BASE STYLES
   ========================================================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: var(--text-primary);
    background: var(--bg-white);
    overflow-x: hidden;
}

img {
    max-width: 100%;
    height: auto;
    display: block;
}

a {
    text-decoration: none;
    color: inherit;
}

ul, ol {
    list-style: none;
}

button, input, textarea, select {
    font-family: inherit;
    font-size: inherit;
    border: none;
    background: none;
    outline: none;
}

button {
    cursor: pointer;
}

/* Focus styles for accessibility */
*:focus-visible {
    outline: 2px solid var(--primary-color);
    outline-offset: 2px;
}

/* ==========================================================================
   TYPOGRAPHY SYSTEM
   ========================================================================== */

/* Font sizes */
.text-xs { font-size: 0.75rem; }
.text-sm { font-size: 0.875rem; }
.text-base { font-size: 1rem; }
.text-lg { font-size: 1.125rem; }
.text-xl { font-size: 1.25rem; }
.text-2xl { font-size: 1.5rem; }
.text-3xl { font-size: 1.875rem; }
.text-4xl { font-size: 2.25rem; }
.text-5xl { font-size: 3rem; }

/* Font weights */
.font-light { font-weight: 300; }
.font-normal { font-weight: 400; }
.font-medium { font-weight: 500; }
.font-semibold { font-weight: 600; }
.font-bold { font-weight: 700; }
.font-extrabold { font-weight: 800; }

/* Line heights */
.leading-none { line-height: 1; }
.leading-tight { line-height: 1.25; }
.leading-snug { line-height: 1.375; }
.leading-normal { line-height: 1.5; }
.leading-relaxed { line-height: 1.625; }
.leading-loose { line-height: 2; }

/* Responsive font sizes */
h1 { font-size: clamp(2rem, 4vw, 3.5rem); }
h2 { font-size: clamp(1.75rem, 3vw, 2.5rem); }
h3 { font-size: clamp(1.5rem, 2.5vw, 2rem); }
h4 { font-size: clamp(1.25rem, 2vw, 1.5rem); }
h5 { font-size: clamp(1.125rem, 1.5vw, 1.25rem); }
h6 { font-size: clamp(1rem, 1vw, 1.125rem); }

p { font-size: clamp(1rem, 1vw, 1.125rem); }

/* ==========================================================================
   ANIMATIONS
   ========================================================================== */

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes scroll {
    0% { 
        opacity: 0.5;
        transform: translateY(0) translateX(-50%);
    }
    50% {
        opacity: 1;
        transform: translateY(-10px) translateX(-50%);
    }
    100% {
        opacity: 0.5;
        transform: translateY(0) translateX(-50%);
    }
}

@keyframes scrollBounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(5px);
    }
}

@keyframes cinematicZoom {
    0% { 
        transform: translate(-50%, -50%) scale(1.05);
        filter: brightness(0.6) contrast(1.1) saturate(1.2);
    }
    100% { 
        transform: translate(-50%, -50%) scale(1.15);
        filter: brightness(0.7) contrast(1.2) saturate(1.3);
    }
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

@keyframes particleFloat {
    0% { 
        transform: translateY(0) scale(0);
        opacity: 0;
    }
    10% {
        opacity: 1;
        transform: scale(1);
    }
    90% {
        opacity: 1;
    }
    100% { 
        transform: translateY(-100vh) scale(0);
        opacity: 0;
    }
}

@keyframes cardAppear {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes spin {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}

@keyframes shimmer {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-30px); }
    to { opacity: 1; transform: translateX(0); }
}

/* ==========================================================================
   HEADER STYLES
   ========================================================================== */

.header {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.95));
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    border-bottom: 1px solid rgba(211, 47, 47, 0.1);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1010;
    height: 100px;
    padding: 0;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.header::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, transparent 0%, rgba(211, 47, 47, 0.02) 50%, transparent 100%);
    pointer-events: none;
}

.header .container {
    width: 100%;
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100%;
    padding: 0 32px;
    position: relative;
}

/* === LOGO === */
.logo {
    display: flex;
    align-items: center;
    height: 100%;
    text-decoration: none;
    padding: 0;
    z-index: 1011;
    transition: transform 0.3s ease;
    gap: 8px;
    margin-right: auto;
}

.logo-main {
    height: 100%;
    width: auto;
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
    transition: all 0.3s ease;
}

.logo-text {
    height: 100%;
    width: auto;
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.1));
    transition: all 0.3s ease;
}

.logo:hover {
    transform: scale(1.05);
}

.logo:hover .logo-main,
.logo:hover .logo-text {
    filter: drop-shadow(0 4px 12px rgba(211, 47, 47, 0.2));
}

/* === DESKTOP NAVIGATION === */
.nav-desktop {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-left: 2rem;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(15px);
    border-radius: 50px;
    padding: 8px 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.3);
    z-index: 1005;
}

.nav-desktop ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 8px;
    align-items: center;
}

.nav-desktop li {
    position: relative;
}

.nav-desktop a {
    text-decoration: none;
    color: #2c3e50;
    font-weight: 600;
    font-size: 15px;
    padding: 12px 20px;
    border-radius: 25px;
    position: relative;
    transition: all 0.3s ease;
    overflow: hidden;
    display: block;
}

.nav-desktop a::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(211, 47, 47, 0.1), transparent);
    transition: left 0.5s ease;
}

.nav-desktop a:hover::before {
    left: 100%;
}

.nav-desktop a:hover {
    color: #d32f2f;
    background: rgba(211, 47, 47, 0.08);
    transform: translateY(-2px);
}

.nav-desktop a.active {
    color: #fff;
    background: linear-gradient(135deg, #d32f2f, #b71c1c);
    box-shadow: 0 4px 15px rgba(211, 47, 47, 0.3);
    transform: translateY(-1px);
}

.nav-desktop a.active::before {
    display: none;
}

/* === CTA BUTTON === */
.header .cta-button {
    background: linear-gradient(135deg, #d32f2f, #b71c1c);
    color: #fff !important;
    padding: 12px 24px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(211, 47, 47, 0.3);
    position: relative;
    z-index: 1006;
    border: 2px solid transparent;
    overflow: hidden;
}

.header .cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s ease;
}

.header .cta-button:hover::before {
    left: 100%;
}

.header .cta-button:hover {
    background: linear-gradient(135deg, #b71c1c, #8e0000);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(211, 47, 47, 0.4);
}

/* === MOBILE NAVIGATION (hidden ≥ 992px) === */
.mobile-nav,
.hamburger,
.mobile-menu-toggle {
    display: none;
}

@media (max-width: 991.98px) {
    .nav-desktop,
    .header .cta-button {
        display: none;
    }

    .mobile-nav,
    .hamburger {
        display: block;
    }

    .hamburger {
        position: relative;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        border: 2px solid rgba(211, 47, 47, 0.1);
        border-radius: 12px;
        padding: 10px;
        width: 44px;
        height: 44px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .hamburger span {
        position: absolute;
        left: 10px;
        height: 2px;
        width: 24px;
        background: linear-gradient(90deg, #d32f2f, #b71c1c);
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .hamburger span:nth-child(1) { top: 12px; }
    .hamburger span:nth-child(2) { top: 20px; }
    .hamburger span:nth-child(3) { top: 28px; }

    .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(7px, 7px);
    }
    .hamburger.active span:nth-child(2) { opacity: 0; }
    .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -7px);
    }

    .nav-mobile {
        position: fixed;
        top: 100px;
        left: -100%;
        width: 85%;
        max-width: 300px;
        height: calc(100vh - 100px);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 249, 250, 0.98));
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 4px 0 30px rgba(0, 0, 0, 0.15);
        transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1008;
        overflow-y: auto;
        border-right: 1px solid rgba(211, 47, 47, 0.1);
    }

    .nav-mobile.active { left: 0; }

    .nav-mobile ul {
        list-style: none;
        padding: 40px 20px;
        margin: 0;
    }

    .nav-mobile li { margin-bottom: 8px; }

    .nav-mobile a {
        text-decoration: none;
        color: #2c3e50;
        font-size: 18px;
        font-weight: 600;
        display: block;
        padding: 18px 24px;
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .nav-mobile a:hover {
        color: #d32f2f;
        background: rgba(211, 47, 47, 0.08);
        transform: translateX(10px);
    }

    .nav-mobile a.active {
        background: linear-gradient(135deg, #d32f2f, #b71c1c);
        color: white;
        box-shadow: 0 4px 15px rgba(211, 47, 47, 0.3);
    }

    .mobile-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1007;
    }

    .mobile-overlay.active {
        opacity: 1;
        visibility: visible;
    }
}

@media (max-width: 768px) {
    .header { height: 80px; }
    .nav-mobile { top: 80px; height: calc(100vh - 80px); }
    .header.scrolled { height: 70px; }
    .logo-main, .logo-text { max-height: 40px; }
    .header.scrolled .logo-main,
    .header.scrolled .logo-text { max-height: 35px; }
}

@media (max-width: 600px) {
    .header .container { padding: 0 15px; }
    .nav-mobile { width: 90%; }
    .nav-mobile a {
        font-size: 16px;
        padding: 14px 20px;
    }
    .logo-main, .logo-text { max-height: 35px; }
}

/* === ANIMATIONS === */
.nav-mobile.active ul { animation: fadeInUp 0.6s ease; }
.nav-mobile.active li {
    animation: slideInLeft 0.5s ease;
    animation-fill-mode: both;
}
.nav-mobile.active li:nth-child(1) { animation-delay: 0.1s; }
.nav-mobile.active li:nth-child(2) { animation-delay: 0.2s; }
.nav-mobile.active li:nth-child(3) { animation-delay: 0.3s; }
.nav-mobile.active li:nth-child(4) { animation-delay: 0.4s; }
.nav-mobile.active li:nth-child(5) { animation-delay: 0.5s; }

/* ==========================================================================
   BUTTON STYLES
   ========================================================================== */

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.9rem 2rem;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    min-height: 44px;
}

/* Variante */
.btn--primary {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: #fff;
    box-shadow: 0 4px 15px rgba(211, 47, 47, 0.3);
}

.btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(211, 47, 47, 0.4);
}

.btn--outline {
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.btn--outline:hover {
    background: var(--primary-color);
    color: #fff;
}

/* CTA Button */
.cta-button {
    display: inline-block;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    text-decoration: none;
    box-shadow: var(--shadow-primary);
    transition: all var(--transition-normal);
    border: none;
    cursor: pointer;
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(211, 47, 47, 0.4);
}

/* Secondary Button */
.btn-secondary {
    display: inline-block;
    padding: 1rem 2.8rem;
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    font-weight: 600;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    position: relative;
    overflow: hidden;
    z-index: 1;
    font-size: clamp(1.05rem, 1.8vw, 1.15rem);
    letter-spacing: 0.5px;
}

.btn-secondary::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    transition: width 0.4s ease;
    z-index: -1;
}

.btn-secondary:hover {
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(211, 47, 47, 0.4);
    border-color: transparent;
}

.btn-secondary:hover::before {
    width: 100%;
}

/* ==========================================================================
   HERO SECTION
   ========================================================================== */

.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding-top: var(--header-height);
    box-sizing: border-box;
    background: #000;
}

.hero-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: var(--z-hero-video);
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: var(--z-hero-overlay);
}

.hero-content {
    position: relative;
    z-index: var(--z-hero-content);
    text-align: center;
    max-width: 1200px;
    width: 90%;
    padding: 2rem;
    color: white;
}

.hero-content h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    margin-bottom: 1rem;
    animation: fadeInUp 1s ease-out;
    line-height: 1.2;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

.hero-content h2 {
    font-size: clamp(1.5rem, 3vw, 2.5rem);
    font-weight: 400;
    margin-bottom: 1.5rem;
    animation: fadeInUp 1s ease-out 0.2s forwards;
    opacity: 0;
    line-height: 1.3;
}

.hero-content p {
    font-size: clamp(1.1rem, 2vw, 1.25rem);
    max-width: 800px;
    margin: 0 auto 2rem;
    animation: fadeInUp 1s ease-out 0.4s forwards;
    opacity: 0;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
}

.trust-badges {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
    margin-top: 2rem;
    animation: fadeInUp 1s ease-out 0.8s forwards;
    opacity: 0;
}

.trust-badges span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 0.5rem 1rem;
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: var(--z-hero-content);
    animation: scroll 2s infinite;
    width: 30px;
    height: 50px;
    border-radius: 15px;
    border: 2px solid white;
    display: flex;
    justify-content: center;
    padding-top: 10px;
}

.scroll-indicator span {
    display: block;
    width: 8px;
    height: 8px;
    background: white;
    border-radius: 50%;
    animation: scrollBounce 2s infinite;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section {
        min-height: 90vh;
    }
    
    .hero-content {
        padding: 1rem;
    }
    
    .hero-content h1 {
        font-size: 2.2rem;
    }
    
    .hero-content h2 {
        font-size: 1.4rem;
    }
    
    .trust-badges {
        gap: 0.8rem;
    }
    
    .trust-badges span {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
    }
}

@media (max-width: 480px) {
    .hero-section {
        min-height: 85vh;
    }
    
    .hero-content h1 {
        font-size: 1.8rem;
    }
    
    .hero-content h2 {
        font-size: 1.2rem;
    }
    
    .hero-content p {
        font-size: 1rem;
    }
    
    .trust-badges {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .cta-button {
        padding: 0.8rem 2rem;
        font-size: 1rem;
    }
    
    .scroll-indicator {
        bottom: 1rem;
    }
}

/* ==========================================================================
   QUICK SERVICES SECTION
   ========================================================================== */

.quick-services {
    padding: 6rem 1.5rem;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    text-align: center;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.quick-services::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="1" fill="%23d32f2f" opacity="0.05"/></svg>') repeat;
    background-size: 50px 50px;
    z-index: 0;
}

.section-header {
    max-width: 900px;
    width: 100%;
    margin: 0 auto 3.5rem;
    padding: 0 1.5rem;
    position: relative;
    z-index: 1;
}

.quick-services h2 {
    font-size: clamp(2.2rem, 4.5vw, 3.2rem);
    margin-bottom: 1.2rem;
    color: #2B2B2B;
    position: relative;
    display: inline-block;
    padding-bottom: 0.8rem;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.quick-services h2::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(211, 47, 47, 0.3);
}

.quick-services .subheading {
    font-size: clamp(1.1rem, 2vw, 1.3rem);
    color: #555;
    max-width: 700px;
    margin: 0 auto 2.5rem;
    line-height: 1.7;
    font-weight: 400;
}

.btn-container {
    margin: 0 0 3rem;
    position: relative;
    z-index: 1;
}

.services-container {
    max-width: 1300px;
    width: 100%;
    margin: 0 auto;
    padding: 0 1rem;
    position: relative;
    z-index: 1;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2.5rem;
    margin-bottom: 2rem;
}

.service-card {
    background: #fff;
    border-radius: 20px;
    padding: 3rem 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    position: relative;
    overflow: hidden;
    z-index: 1;
    opacity: 0;
    transform: translateY(30px);
    animation: cardAppear 0.6s forwards;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    border: 1px solid rgba(211, 47, 47, 0.1);
}

.service-card:nth-child(1) { animation-delay: 0.2s; }
.service-card:nth-child(2) { animation-delay: 0.3s; }
.service-card:nth-child(3) { animation-delay: 0.4s; }
.service-card:nth-child(4) { animation-delay: 0.5s; }

.service-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 0;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    transition: height 0.5s ease;
    z-index: -1;
    opacity: 0.95;
}

.service-card::after {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(211, 47, 47, 0.05) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: -2;
}

.service-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.service-card:hover::before {
    height: 100%;
}

.service-card:hover::after {
    opacity: 1;
}

.service-card:hover i,
.service-card:hover h3,
.service-card:hover p {
    color: #fff;
}

.service-card i {
    font-size: 4rem;
    color: var(--primary-color);
    margin-bottom: 2rem;
    transition: all 0.4s ease;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.service-card:hover i {
    transform: scale(1.15) rotate(5deg);
    -webkit-text-fill-color: #fff;
}

.service-card h3 {
    font-size: clamp(1.3rem, 1.8vw, 1.6rem);
    margin-bottom: 1.2rem;
    color: #2B2B2B;
    transition: color 0.4s ease;
    font-weight: 700;
    line-height: 1.3;
}

.service-card p {
    font-size: clamp(0.95rem, 1.5vw, 1.05rem);
    color: #666;
    line-height: 1.7;
    transition: color 0.4s ease;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.card-link {
    display: inline-flex;
    align-items: center;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    margin-top: auto;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    border: 1px solid transparent;
}

.card-link i {
    font-size: 1.1rem;
    margin-left: 0.5rem;
    margin-bottom: 0;
    color: inherit;
    transition: transform 0.3s ease;
}

.service-card:hover .card-link {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.2);
}

.service-card:hover .card-link i {
    transform: translateX(4px);
}

/* ==========================================================================
   CINEMATIC CAROUSEL
   ========================================================================== */

.cinematic-carousel {
    position: relative;
    height: 100vh;
    min-height: 600px;
    overflow: hidden;
    background: #000;
    isolation: isolate;
}

.videoProjectsSwiper {
    width: 100%;
    height: 100%;
}

.swiper-slide {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}

/* Enhanced Video Container */
.video-container {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.bg-video {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    transform: translate(-50%, -50%) scale(1.05);
    object-fit: cover;
    filter: brightness(0.6) contrast(1.1) saturate(1.2);
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.swiper-slide-active .bg-video {
    animation: cinematicZoom 15s ease-in-out infinite alternate;
}

/* Enhanced Video Overlay */
.video-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        135deg,
        rgba(0, 0, 0, 0.7) 0%,
        rgba(211, 47, 47, 0.3) 50%,
        rgba(0, 0, 0, 0.8) 100%
    );
    opacity: 0.9;
}

/* Enhanced Slide Overlay */
.slide-overlay {
    position: relative;
    z-index: 10;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    padding: 0 5%;
}

.slide-content {
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 4rem;
    align-items: center;
}

.content-wrapper {
    color: white;
    max-width: 600px;
}

/* Enhanced Project Tag */
.project-tag {
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%,
        rgba(255, 255, 255, 0.05) 100%
    );
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 12px 24px;
    border-radius: 30px;
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    backdrop-filter: blur(20px);
    margin-bottom: 1.5rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
}

.project-tag:hover {
    background: linear-gradient(135deg, 
        rgba(211, 47, 47, 0.3) 0%,
        rgba(211, 47, 47, 0.1) 100%
    );
    transform: translateY(-2px);
}

.project-tag i {
    font-size: 1rem;
}

/* Enhanced Project Title */
.project-title {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 900;
    margin-bottom: 1rem;
    line-height: 1.1;
    background: linear-gradient(135deg, #ffffff 0%, #f5f5f5 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    letter-spacing: -0.02em;
}

/* Enhanced Project Description */
.project-desc {
    font-size: 1.3rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    opacity: 0.9;
}

.location {
    position: relative;
    padding-left: 1.5rem;
}

.location::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background: #d32f2f;
    border-radius: 50%;
}

.year {
    background: rgba(255, 255, 255, 0.1);
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.9rem;
    font-weight: 600;
}

/* Project Stats */
.project-stats {
    display: flex;
    gap: 2rem;
    margin-bottom: 2.5rem;
}

.stat {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 2rem;
    font-weight: 800;
    color: #d32f2f;
    line-height: 1;
}

.stat-label {
    display: block;
    font-size: 0.9rem;
    opacity: 0.8;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 0.25rem;
}

/* Enhanced Button */
.btn-explore {
    background: linear-gradient(135deg, #d32f2f 0%, #b71c1c 100%);
    color: white;
    padding: 18px 36px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 700;
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 
        0 8px 30px rgba(211, 47, 47, 0.4),
        0 4px 15px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
}

.btn-explore::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, #ff4444 0%, #d32f2f 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.btn-explore:hover {
    transform: translateY(-4px) scale(1.05);
    box-shadow: 
        0 15px 40px rgba(211, 47, 47, 0.6),
        0 8px 25px rgba(0, 0, 0, 0.3);
    border-color: rgba(255, 255, 255, 0.3);
}

.btn-explore:hover::before {
    opacity: 1;
}

.btn-explore span,
.btn-explore i {
    position: relative;
    z-index: 1;
}

.btn-explore i {
    transition: transform 0.3s ease;
}

.btn-explore:hover i {
    transform: translateX(4px);
}

/* Decorative Elements */
.slide-decorations {
    position: absolute;
    inset: 0;
    z-index: 5;
    pointer-events: none;
}

.geometric-shape {
    position: absolute;
    background: linear-gradient(135deg, 
        rgba(211, 47, 47, 0.1) 0%,
        rgba(255, 255, 255, 0.05) 100%
    );
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.shape-1 {
    width: 200px;
    height: 200px;
    top: 10%;
    right: 10%;
    border-radius: 50%;
    animation: float 8s ease-in-out infinite;
}

.shape-2 {
    width: 120px;
    height: 120px;
    bottom: 15%;
    left: 8%;
    clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
    animation: float 6s ease-in-out infinite reverse;
}

/* Floating Particles */
.floating-particles {
    position: absolute;
    inset: 0;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 50%;
    animation: particleFloat 12s linear infinite;
}

.particle:nth-child(1) {
    top: 20%;
    left: 15%;
    animation-delay: 0s;
}

.particle:nth-child(2) {
    top: 60%;
    right: 20%;
    animation-delay: 4s;
}

.particle:nth-child(3) {
    bottom: 30%;
    left: 70%;
    animation-delay: 8s;
}

/* Enhanced Navigation */
.carousel-navigation {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    z-index: 20;
    pointer-events: none;
    display: flex;
    justify-content: space-between;
    padding: 0 3rem;
}

.swiper-button-next,
.swiper-button-prev {
    position: relative;
    color: white;
    background: linear-gradient(135deg, 
        rgba(255, 255, 255, 0.15) 0%,
        rgba(255, 255, 255, 0.05) 100%
    );
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    width: 70px;
    height: 70px;
    border-radius: 50%;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    pointer-events: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.swiper-button-next::after,
.swiper-button-prev::after {
    display: none;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    background: linear-gradient(135deg, 
        rgba(211, 47, 47, 0.3) 0%,
        rgba(211, 47, 47, 0.1) 100%
    );
    transform: scale(1.1);
    box-shadow: 0 12px 35px rgba(211, 47, 47, 0.4);
}

.swiper-button-disabled {
    opacity: 0.3;
    pointer-events: none;
}

/* Enhanced Pagination */
.carousel-pagination {
    position: absolute;
    bottom: 3rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 20;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.swiper-pagination {
    display: flex;
    gap: 1rem;
}

.swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background: rgba(255, 255, 255, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    transition: all 0.3s ease;
    cursor: pointer;
}

.swiper-pagination-bullet-active {
    background: #d32f2f;
    border-color: #d32f2f;
    transform: scale(1.3);
    box-shadow: 0 0 20px rgba(211, 47, 47, 0.6);
}

.pagination-progress {
    width: 100px;
    height: 2px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 1px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    background: linear-gradient(90deg, #d32f2f, #ff4444);
    width: 0%;
    transition: width 0.3s ease;
    border-radius: 1px;
}

/* Autoplay Progress Circle */
.swiper-autoplay-progress {
    position: absolute;
    top: 2rem;
    right: 2rem;
    width: 60px;
    height: 60px;
    z-index: 20;
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.swiper-autoplay-progress:hover {
    opacity: 1;
}

.swiper-autoplay-progress svg {
    transform: rotate(-90deg);
    width: 100%;
    height: 100%;
}

.swiper-autoplay-progress circle {
    fill: none;
    stroke: rgba(255, 255, 255, 0.3);
    stroke-width: 2;
    stroke-dasharray: 126;
    stroke-dashoffset: 126;
    stroke-linecap: round;
    transition: stroke-dashoffset 0.1s linear;
}

/* Slide Counter */
.slide-counter {
    position: absolute;
    top: 2rem;
    left: 2rem;
    z-index: 20;
    color: white;
    font-family: 'Roboto Mono', monospace;
    font-size: 1.1rem;
    font-weight: 600;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    padding: 12px 20px;
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.current-slide {
    color: #d32f2f;
    font-weight: 800;
}

.divider {
    margin: 0 8px;
    opacity: 0.5;
}

.total-slides {
    opacity: 0.7;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .slide-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .project-title {
        font-size: clamp(2rem, 5vw, 3.5rem);
    }
}

@media (max-width: 768px) {
    .slide-overlay {
        padding: 0 1rem;
    }
    
    .content-wrapper {
        max-width: 100%;
    }
    
    .project-title {
        font-size: clamp(1.8rem, 8vw, 2.5rem);
        margin-bottom: 0.75rem;
    }
    
    .project-desc {
        font-size: 1rem;
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .project-stats {
        gap: 1rem;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
    
    .btn-explore {
        padding: 14px 28px;
        font-size: 0.9rem;
    }
    
    .carousel-navigation {
        padding: 0 1rem;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 50px;
        height: 50px;
        font-size: 1rem;
    }
    
    .slide-counter,
    .swiper-autoplay-progress {
        top: 1rem;
    }
    
    .slide-counter {
        left: 1rem;
        font-size: 0.9rem;
        padding: 8px 16px;
    }
    
    .swiper-autoplay-progress {
        right: 1rem;
        width: 45px;
        height: 45px;
    }
    
    .geometric-shape {
        display: none;
    }
}

@media (max-width: 480px) {
    .cinematic-carousel {
        min-height: 500px;
    }
    
    .project-tag {
        padding: 8px 16px;
        font-size: 0.75rem;
        margin-bottom: 1rem;
    }
    
    .carousel-pagination {
        bottom: 2rem;
    }
    
    .floating-particles {
        display: none;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 40px;
        height: 40px;
        font-size: 0.8rem;
    }
    
    .project-title {
        font-size: clamp(1.5rem, 6vw, 2.2rem);
    }
}

/* Loading state */
.cinematic-carousel.loading {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
}

.cinematic-carousel.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50px;
    height: 50px;
    border: 3px solid rgba(211, 47, 47, 0.3);
    border-top: 3px solid #d32f2f;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Focus styles for accessibility */
.btn-explore:focus,
.swiper-button-next:focus,
.swiper-button-prev:focus,
.swiper-pagination-bullet:focus {
    outline: 2px solid #d32f2f;
    outline-offset: 2px;
}

/* ==========================================================================
   PROJECTS CAROUSEL SECTION
   ========================================================================== */

.projects-carousel-section {
    padding: 80px 20px;
    background: #fff;
    text-align: center;
}

.projects-carousel-section h2 {
    font-size: 2.5rem;
    margin-bottom: 50px;
    color: #2B2B2B;
}

.projectsSwiper {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto 40px;
    border-radius: 12px;
    overflow: hidden;
}

.swiper-slide {
    position: relative;
    height: 500px;
}

.swiper-slide img,
.swiper-slide video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 12px;
}

.project-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    color: #fff;
    padding: 30px 20px 20px;
    text-align: left;
}

.project-overlay h3 {
    font-size: 1.5rem;
    margin-bottom: 5px;
}

.project-overlay p {
    font-size: 1rem;
    opacity: 0.9;
}

/* Swiper Navigation */
.swiper-button-next,
.swiper-button-prev {
    color: #fff;
    background: rgba(0,0,0,0.4);
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 20px;
}

.swiper-pagination-bullet {
    background: #C1272D;
    opacity: 0.7;
}

.swiper-pagination-bullet-active {
    opacity: 1;
}

/* MOBILE */
@media (max-width: 768px) {
    .swiper-slide {
        height: 300px;
    }
}

/* ==========================================================================
   ABOUT SHORT SECTION
   ========================================================================== */

.about-short {
    position: relative;
    padding: 100px 20px;
    color: #fff;
    overflow: hidden;
}

/* Background imagine + overlay */
.about-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('../img/team-hero.webp') center/cover no-repeat;
    z-index: -2;
}

.about-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.55);
    z-index: -1;
}

/* Container + content */
.about-short .container {
    padding-bottom: 10px;
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.about-content h2 {
    font-size: 2.2rem;
    margin-bottom: 25px;
    line-height: 1.3;
}

.about-content p {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 20px;
    color: silver;
}

/* MOBILE */
@media (max-width: 768px) {
    .about-content h2 { font-size: 1.8rem; }
    .about-content p  { font-size: 1rem; }
}

/* ==========================================================================
   FOOTER STYLES
   ========================================================================== */

.footer {
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 40px 0 0;
    margin-top: 50px;
}

.footer .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
}

.footer-column {
    flex: 1;
    min-width: 250px;
    margin-bottom: 30px;
}

.footer-column h3 {
    color: #3498db;
    margin-bottom: 15px;
    font-size: 1.2em;
    font-weight: 600;
}

.footer-column p {
    margin-bottom: 10px;
    line-height: 1.6;
    display: flex;
    align-items: center;
}

.footer-column i {
    margin-right: 10px;
    width: 16px;
    color: #3498db;
}

.footer-column a {
    color: #ecf0f1;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-column a:hover {
    color: #3498db;
}

.copyright {
    background-color: #1a252f;
    text-align: center;
    padding: 20px 0;
    margin-top: 20px;
    border-top: 1px solid #34495e;
}

.copyright p {
    margin: 0;
    font-size: 0.9em;
    color: #bdc3c7;
}

/* Floating Buttons */
.floating-buttons {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
}

.main-button {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #3498db;
    color: white;
    border: none;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
    transition: all 0.3s ease;
    position: relative;
    z-index: 1001;
}

.main-button:hover {
    background-color: #2980b9;
    transform: scale(1.1);
    box-shadow: 0 6px 16px rgba(52, 152, 219, 0.6);
}

.sub-buttons {
    position: absolute;
    bottom: 70px;
    right: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: all 0.3s ease;
}

.floating-buttons:hover .sub-buttons {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.sub-button {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: white;
    font-size: 18px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
}

.sub-button:nth-child(1) {
    background-color: #27ae60;
}

.sub-button:nth-child(2) {
    background-color: #25d366;
}

.sub-button:nth-child(3) {
    background-color: #e74c3c;
}

.sub-button:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer .container {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-column {
        min-width: auto;
        margin-bottom: 25px;
    }
    
    .floating-buttons {
        bottom: 20px;
        right: 20px;
    }
    
    .main-button {
        width: 55px;
        height: 55px;
        font-size: 20px;
    }
    
    .sub-button {
        width: 45px;
        height: 45px;
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .footer {
        padding: 30px 0 0;
    }
    
    .footer .container {
        padding: 0 15px;
    }
    
    .footer-column p {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }
    
    .footer-column i {
        margin-bottom: 5px;
    }
}

/* ==========================================================================
   ACCESSIBILITY UTILITIES
   ========================================================================== */

/* Screen reader only */
.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

/* Skip link */
.skip-link {
    position: absolute;
    top: -40px;
    left: 0;
    background: var(--primary-color);
    color: white;
    padding: 0.5rem 1rem;
    z-index: 1000;
    transition: top 0.3s;
}

.skip-link:focus {
    top: 0;
}

/* High contrast mode */
@media (prefers-contrast: high) {
    * {
        border-color: #000 !important;
    }
    
    .btn {
        border: 2px solid currentColor !important;
    }
}

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
}

/* Print styles */
@media print {
    .no-print { display: none !important; }
    
    * {
        background: transparent !important;
        color: black !important;
        box-shadow: none !important;
        text-shadow: none !important;
    }
    
    a[href]:after {
        content: " (" attr(href) ")";
    }
    
    .hero-video, 
    .swiper-button-next, 
    .swiper-button-prev, 
    .floating-buttons, 
    .cinematic-carousel { 
        display: none !important; 
    }
}

/* ==========================================================================
   PERFORMANCE & LOADING OPTIMIZATIONS
   ========================================================================== */

/* Critical CSS for above-the-fold content */
.cinematic-carousel {
    content-visibility: auto;
    contain-intrinsic-size: 100vh;
}

/* Optimize video rendering */
.bg-video {
    will-change: transform, filter;
    backface-visibility: hidden;
    perspective: 1000px;
}

/* GPU acceleration for animations */
.slide-content,
.geometric-shape,
.particle,
.btn-explore {
    will-change: transform;
    transform: translateZ(0);
}

/* Optimize backdrop-filter performance */
.project-tag,
.swiper-button-next,
.swiper-button-prev {
    contain: layout style paint;
}

/* Loading skeleton */
.cinematic-carousel.loading .swiper-slide {
    background: linear-gradient(
        90deg,
        rgba(255,255,255,0.1) 25%,
        rgba(255,255,255,0.2) 50%,
        rgba(255,255,255,0.1) 75%
    );
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
}

/* Preload critical resources */
.cinematic-carousel::before {
    content: '';
    position: absolute;
    top: -9999px;
    left: -9999px;
    background-image: 
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="white" d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg>'),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="white" d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6 1.41-1.41z"/></svg>');
}

/* Optimize for different screen densities */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .project-tag,
    .btn-explore {
        border-width: 0.5px;
    }
}

/* Container queries for responsive design */
@container (max-width: 768px) {
    .slide-content {
        grid-template-columns: 1fr;
    }
}

/* ==========================================================================
   RESPONSIVE DESIGN
   ========================================================================== */

/* Mobile First Approach */
@media (max-width: var(--mobile)) {
    /* Mobile styles */
    .hero-content h1 { font-size: 2rem; }
    .service-card { padding: 1.5rem; }
}

@media (min-width: calc(var(--mobile) + 1px)) and (max-width: var(--tablet)) {
    /* Tablet styles */
    .services-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (min-width: calc(var(--tablet) + 1px)) and (max-width: 1200px) {
    /* Desktop small styles */
    .services-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (min-width: 1201px) {
    /* Desktop large styles */
    .services-grid { grid-template-columns: repeat(4, 1fr); }
}

/* ANIMATION ENHANCEMENTS */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* FOCUS STATES FOR ACCESSIBILITY */
.btn-secondary:focus,
.card-link:focus {
    outline: 3px solid rgba(193, 39, 45, 0.5);
    outline-offset: 2px;
}