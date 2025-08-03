/* =========================================================
MAIN.JS – MeisterDach Website Core
Version: 4.0.1 | Last update: 2024-04-05
Fixes: Swiper loading, MobileMenu robustness
Optimized for performance - No jQuery dependency
Contains:
• Header scroll optimization
• Hero video lazy-load
• Cinematic Swiper initialization (with safe loading)
• Mobile menu handling (robust)
• Performance optimizations
========================================================= */

/* -1. CONFIG & UTILITIES- */
const CONFIG = {
    debounceDelay: 150,
    autoplayDelay: 6000,
    rootPath: window.location.origin + '/'
};

// Debounce helper
const debounce = (fn, wait = CONFIG.debounceDelay) => {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => fn.apply(this, args), wait);
    };
};

// Passive event support check
let passiveSupported = false;
try {
    window.addEventListener("test", null, Object.defineProperty({}, "passive", {
        get: function () { passiveSupported = { passive: true }; }
    }));
} catch (err) { }

/* -2. HEADER OPTIMIZATION- */
let headerHeight = 100;
let ticking = false;

function cacheHeaderHeight() {
    const header = document.querySelector('.header');
    if (header) {
        headerHeight = header.offsetHeight;
        document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
    }
}

function updateHeaderState() {
    const header = document.querySelector('.header');
    if (!header) return;

    const scrolled = window.scrollY > headerHeight;
    const isHome = document.body.classList.contains('home-page');

    if (scrolled && isHome) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
    ticking = false;
}

function requestTick() {
    if (!ticking) {
        requestAnimationFrame(updateHeaderState);
        ticking = true;
    }
}

// Initialize header
document.addEventListener('DOMContentLoaded', () => {
    cacheHeaderHeight();
    updateHeaderState();
});
window.addEventListener('resize', debounce(cacheHeaderHeight, 250));
window.addEventListener('scroll', requestTick, { passive: true });

/* -3. MOBILE MENU HANDLING (Robust)- */
class MobileMenu {
    constructor() {
        this.hamburger = document.querySelector('.hamburger');
        this.navMobile = document.querySelector('.nav-mobile');
        this.overlay = document.querySelector('.mobile-overlay');
        this.isOpen = false;
        this.init();
    }

    init() {
        if (!this.hamburger || !this.navMobile) {
            console.warn('Mobile menu elements not found');
            return;
        }

        // Event listeners
        this.hamburger.addEventListener('click', () => this.toggle());
        this.overlay?.addEventListener('click', () => this.close());

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isOpen) {
                this.close();
            }
        });

        // Close on link click
        const links = this.navMobile.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', () => this.close());
        });
    }

    toggle() {
        this.isOpen ? this.close() : this.open();
    }

    open() {
        this.isOpen = true;
        this.hamburger.classList.add('active');
        this.navMobile.classList.add('active');
        this.overlay?.classList.add('active');
        this.hamburger.setAttribute('aria-expanded', 'true');
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }

    close() {
        this.isOpen = false;
        this.hamburger.classList.remove('active');
        this.navMobile.classList.remove('active');
        this.overlay?.classList.remove('active');
        this.hamburger.setAttribute('aria-expanded', 'false');
        // Restore body scroll
        document.body.style.overflow = '';
    }
}

// Ensure MobileMenu is initialized safely
document.addEventListener('DOMContentLoaded', () => {
    try {
        new MobileMenu();
    } catch (e) {
        console.error('Failed to initialize MobileMenu:', e);
    }
});

/* -4. HERO VIDEO OPTIMIZATION- */
class HeroVideoManager {
    constructor() {
        this.container = document.getElementById('hero-video-container');
        this.video = document.getElementById('hero-video');
        this.init();
    }

    init() {
        if (!this.container || !this.video) return;

        this.preloadVideos();
        this.setupIntersectionObserver();
    }

    preloadVideos() {
        if (!this.video) return;
        const videos = [this.video];
        videos.forEach((video, index) => {
            video.setAttribute('loading', index === 0 ? 'eager' : 'lazy');
            video.addEventListener('loadeddata', () => {
                video.classList.add('loaded');
            });
            video.addEventListener('error', () => {
                console.warn(`Video ${index + 1} failed to load`);
                video.style.display = 'none';
            });
        });
    }

    setupIntersectionObserver() {
        if (!this.video || !('IntersectionObserver' in window)) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.video.play().catch(e => console.warn('Autoplay blocked:', e));
                } else {
                    this.video.pause();
                }
            });
        }, { threshold: 0.1 });

        observer.observe(this.video);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    try {
        new HeroVideoManager();
    } catch (e) {
        console.error('Failed to initialize HeroVideoManager:', e);
    }
});

/* -5. CINEMATIC SWIPER (Safe Loading) - */
class CinematicSwiper {
    constructor() {
        this.swiper = null;
        this.isInitialized = false;
        this.autoplayProgress = document.querySelector('.autoplay-progress svg circle');
        this.slideCounter = {
            current: document.querySelector('.slide-counter .current'),
            total: document.querySelector('.slide-counter .total')
        };
        this.videos = document.querySelectorAll('.videoProjectsSwiper video');
    }

    // Method to initialize Swiper after it's loaded
    init() {
        const swiperElement = document.querySelector('.videoProjectsSwiper');
        if (!swiperElement) return;

        // Check if Swiper is already available
        if (typeof Swiper !== 'undefined') {
            this.initializeSwiper();
        } else {
            // Wait for Swiper to be loaded (e.g., by the script loader in header.php)
            const checkSwiper = setInterval(() => {
                if (typeof Swiper !== 'undefined') {
                    clearInterval(checkSwiper);
                    this.initializeSwiper();
                }
            }, 100); // Check every 100ms

            // Failsafe timeout
            setTimeout(() => {
                if (!this.isInitialized) {
                    clearInterval(checkSwiper);
                    console.error('Swiper failed to load within timeout.');
                }
            }, 5000); // 5 seconds timeout
        }
    }

    preloadVideos() {
        this.videos.forEach((video, index) => {
            video.setAttribute('loading', index === 0 ? 'eager' : 'lazy');
            video.addEventListener('loadeddata', () => {
                video.classList.add('loaded');
            });
            video.addEventListener('error', () => {
                console.warn(`Video ${index + 1} failed to load`);
                video.style.display = 'none';
            });
        });
    }

    initializeSwiper() {
        const swiperElement = document.querySelector('.videoProjectsSwiper');
        if (!swiperElement || typeof Swiper === 'undefined' || this.isInitialized) return;

        // Pre-calculate dimensions
        const rect = swiperElement.getBoundingClientRect();
        swiperElement.style.width = `${rect.width}px`;
        swiperElement.style.height = `${rect.height}px`;

        requestAnimationFrame(() => {
            this.swiper = new Swiper(swiperElement, {
                // Core settings
                loop: true,
                effect: 'fade',
                speed: 1200,
                grabCursor: true,

                // Performance optimizations
                observer: false,
                observeParents: false,
                observeSlideChildren: false,
                updateOnWindowResize: false,
                preloadImages: false,
                // Lazy loading
                lazy: {
                    loadPrevNext: true,
                    loadOnTransitionStart: true
                },

                // Touch settings
                touchEventsTarget: 'container',
                passiveListeners: passiveSupported,

                // Autoplay
                autoplay: {
                    delay: CONFIG.autoplayDelay,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },

                // Navigation
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // Pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    bulletElement: 'button',
                    bulletClass: 'swiper-pagination-bullet',
                    bulletActiveClass: 'swiper-pagination-bullet-active',
                    renderBullet: function (index, className) {
                        return `<button class="${className}" aria-label="Slide ${index + 1}" type="button"></button>`;
                    }
                },

                // Keyboard
                keyboard: {
                    enabled: true,
                    onlyInViewport: true,
                },

                // Accessibility
                a11y: {
                    prevSlideMessage: 'Proiectul anterior',
                    nextSlideMessage: 'Următorul proiect',
                    firstSlideMessage: 'Acesta este primul slide',
                    lastSlideMessage: 'Acesta este ultimul slide',
                },

                // Fade effect
                fadeEffect: {
                    crossFade: true,
                },

                // Events
                on: {
                    init: () => {
                        requestAnimationFrame(() => this.onSwiperInit());
                    },
                    slideChange: () => {
                        requestAnimationFrame(() => this.onSlideChange());
                    },
                    autoplayTimeLeft: (swiper, time, progress) => {
                        requestAnimationFrame(() => this.updateAutoplayProgress(progress));
                    },
                    autoplayStart: () => this.onAutoplayStart(),
                    autoplayStop: () => this.onAutoplayStop(),
                    touchStart: () => this.pauseAllVideos(),
                    touchEnd: () => this.playActiveVideo(),
                },
            });

            // Remove fixed dimensions
            swiperElement.style.width = '';
            swiperElement.style.height = '';
            this.isInitialized = true;
        });
    }

    onSwiperInit() {
        this.updateSlideCounter(this.swiper);
        this.playActiveVideo();
        this.updateProgressBar(0);
    }

    onSlideChange() {
        this.updateSlideCounter(this.swiper);
        this.handleVideoTransition();
        const progress = (this.swiper.realIndex + 1) / this.getTotalUniqueSlides(this.swiper) * 100;
        this.updateProgressBar(progress);
        this.announceSlideChange(this.swiper.realIndex + 1);
        this.preloadNextSlide();
    }

    getTotalUniqueSlides(swiper) {
        return swiper.slides.filter(slide => !slide.classList.contains('swiper-slide-duplicate')).length;
    }

    updateSlideCounter(swiper) {
        if (!this.slideCounter.current || !this.slideCounter.total) return;
        const totalSlides = this.getTotalUniqueSlides(swiper);
        const current = String(swiper.realIndex + 1).padStart(2, '0');
        const total = String(totalSlides).padStart(2, '0');
        this.slideCounter.current.textContent = current;
        this.slideCounter.total.textContent = total;
    }

    updateAutoplayProgress(progress) {
        if (!this.autoplayProgress) return;
        const circumference = 2 * Math.PI * 20;
        const offset = circumference * (1 - progress);
        this.autoplayProgress.style.strokeDashoffset = offset;
        this.autoplayProgress.style.stroke = progress > 0.8 ? '#d32f2f' : 'rgba(255,255,255,0.6)';
    }

    onAutoplayStart() {
        // Optional: Add visual indicator for autoplay start
    }

    onAutoplayStop() {
        // Optional: Add visual indicator for autoplay stop
    }

    playActiveVideo() {
        const activeSlide = this.swiper?.slides[this.swiper.activeIndex];
        const video = activeSlide?.querySelector('video');
        if (video) {
            video.play().catch(e => console.warn('Autoplay blocked:', e));
        }
    }

    pauseAllVideos() {
        this.videos.forEach(video => {
            video.pause();
        });
    }

    handleVideoTransition() {
        this.pauseAllVideos();
        setTimeout(() => this.playActiveVideo(), 300); // Slight delay for transition
    }

    updateProgressBar(progress) {
        const bar = document.querySelector('.progress-bar .progress');
        if (bar) {
            bar.style.width = `${progress}%`;
        }
    }

    announceSlideChange(index) {
        const announcement = document.querySelector('.sr-announce');
        if (announcement) {
            announcement.textContent = `Slide ${index} afișat`;
        }
    }

    preloadNextSlide() {
        const nextIndex = (this.swiper.realIndex + 1) % this.swiper.slides.length;
        const nextSlide = this.swiper.slides[nextIndex];
        const video = nextSlide?.querySelector('video');
        if (video && video.readyState < 3) { // HAVE_FUTURE_DATA
            video.load();
        }
    }

    toggleAutoplay() {
        if (this.swiper?.autoplay?.running) {
            this.swiper.autoplay.stop();
        } else {
            this.swiper?.autoplay?.start();
        }
    }

    setupKeyboardControls() {
        document.addEventListener('keydown', (e) => {
            if (!this.swiper) return;
            switch (e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    this.swiper.slidePrev();
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    this.swiper.slideNext();
                    break;
                case ' ':
                    e.preventDefault();
                    this.toggleAutoplay();
                    break;
            }
        });
    }

    // Visibility change handling
    setupVisibilityHandler() {
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.pauseAllVideos();
                this.swiper?.autoplay?.stop();
            } else {
                this.playActiveVideo();
                this.swiper?.autoplay?.start();
            }
        });
    }

    setupIntersectionObserver() {
        // Optional: Pause swiper when not in view
    }

    destroy() {
        this.swiper?.destroy(true, true);
        this.swiper = null;
        this.isInitialized = false;
    }
}

// Initialize CinematicSwiper safely after DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Initialize other components first
    // ...

    // Then initialize Swiper component
    try {
        const cinematicSwiper = new CinematicSwiper();
        cinematicSwiper.init(); // This now handles waiting for Swiper
        cinematicSwiper.setupKeyboardControls();
        cinematicSwiper.setupVisibilityHandler();
    } catch (e) {
        console.error('Failed to initialize CinematicSwiper:', e);
    }
});

/* -6. PROJECTS SWIPER (Safe Loading)- */
function initProjectsSwiper() {
    const el = document.querySelector('.projectsSwiper');
    if (!el) return;

    // Check if Swiper is already available
    if (typeof Swiper !== 'undefined') {
        createProjectsSwiper(el);
    } else {
        // Wait for Swiper to be loaded
        const checkSwiper = setInterval(() => {
            if (typeof Swiper !== 'undefined') {
                clearInterval(checkSwiper);
                createProjectsSwiper(el);
            }
        }, 100);

        // Failsafe timeout
        setTimeout(() => {
            if (!document.querySelector('.projectsSwiper .swiper-wrapper')) { // Simple check if not initialized
                clearInterval(checkSwiper);
                console.error('Projects Swiper failed to load within timeout.');
            }
        }, 5000);
    }
}

function createProjectsSwiper(el) {
    requestAnimationFrame(() => {
        new Swiper(el, {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 1,
            // Performance optimizations
            observer: false,
            observeParents: false,
            preloadImages: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    });
}

// Initialize Projects Swiper safely
document.addEventListener('DOMContentLoaded', () => {
    try {
        initProjectsSwiper();
    } catch (e) {
        console.error('Failed to initialize Projects Swiper:', e);
    }
});
