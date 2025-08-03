/* =========================================================
   MAIN.JS – MeisterDach Website Core
   Version: 4.0 | Last update: 2024-12-19
   Optimized for performance - No jQuery dependency
   Contains:
   • Header scroll optimization
   • Hero video lazy-load
   • Cinematic Swiper initialization
   • Mobile menu handling
   • Performance optimizations
========================================================= */

/* ---------------------------------------------------------
   1. CONFIG & UTILITIES
--------------------------------------------------------- */
const CONFIG = {
    debounceDelay: 150,
    autoplayDelay: 6000,
    rootPath: window.location.origin + '/'
};

// Debounce helper
const debounce = (fn, wait = CONFIG.debounceDelay) => {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => fn.apply(this, args), wait);
    };
};

// Throttle helper
const throttle = (fn, wait = 100) => {
    let inThrottle, lastFn, lastTime;
    return function() {
        const context = this,
            args = arguments;
        if (!inThrottle) {
            fn.apply(context, args);
            lastTime = Date.now();
            inThrottle = true;
        } else {
            clearTimeout(lastFn);
            lastFn = setTimeout(function() {
                if (Date.now() - lastTime >= wait) {
                    fn.apply(context, args);
                    lastTime = Date.now();
                }
            }, Math.max(wait - (Date.now() - lastTime), 0));
        }
    };
};

// Check passive event support
const passiveSupported = (() => {
    let passive = false;
    try {
        const options = {
            get passive() {
                passive = true;
                return false;
            }
        };
        window.addEventListener("test", null, options);
        window.removeEventListener("test", null, options);
    } catch(err) {}
    return passive;
})();

/* ---------------------------------------------------------
   2. HEADER SCROLL OPTIMIZATION
--------------------------------------------------------- */
const header = document.querySelector('.header');
let headerHeight = null;
let lastScrollY = 0;
let ticking = false;

// Cache header height
function cacheHeaderHeight() {
    if (header) {
        headerHeight = header.offsetHeight;
    }
}

// Optimized header state update
function updateHeaderState() {
    if (!header) return;
    
    const scrollY = window.scrollY;
    
    // Avoid unnecessary updates
    if (Math.abs(scrollY - lastScrollY) < 5) {
        ticking = false;
        return;
    }
    
    lastScrollY = scrollY;
    const isScrolled = scrollY > 50;
    
    // Use only classes, no inline styles
    if (isScrolled && !header.classList.contains('scrolled')) {
        header.classList.add('scrolled');
    } else if (!isScrolled && header.classList.contains('scrolled')) {
        header.classList.remove('scrolled');
    }
    
    ticking = false;
}

// Request animation frame for scroll
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

/* ---------------------------------------------------------
   3. MOBILE MENU HANDLING
--------------------------------------------------------- */
class MobileMenu {
    constructor() {
        this.hamburger = document.querySelector('.hamburger');
        this.navMobile = document.querySelector('.nav-mobile');
        this.overlay = document.querySelector('.mobile-overlay');
        this.isOpen = false;
        
        this.init();
    }
    
    init() {
        if (!this.hamburger || !this.navMobile) return;
        
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

/* ---------------------------------------------------------
   4. HERO VIDEO OPTIMIZATION
--------------------------------------------------------- */
class HeroVideo {
    constructor() {
        this.video = document.querySelector('.hero-video');
        this.section = document.querySelector('.hero-section');
        
        if (this.video) {
            this.init();
        }
    }
    
    init() {
        // Set initial state
        this.video.style.opacity = '0';
        this.video.style.transition = 'opacity 0.5s ease';
        
        // Handle video load
        this.video.addEventListener('loadeddata', () => {
            this.onVideoLoaded();
        });
        
        // Fallback
        setTimeout(() => {
            if (!this.video.hasAttribute('data-loaded')) {
                this.onVideoLoaded();
            }
        }, 3500);
        
        // Try autoplay
        this.attemptAutoplay();
    }
    
    onVideoLoaded() {
        this.video.setAttribute('data-loaded', 'true');
        this.video.style.opacity = '1';
        
        // Remove placeholder if exists
        const placeholder = this.section?.querySelector('.hero-placeholder');
        if (placeholder) {
            placeholder.style.opacity = '0';
            setTimeout(() => placeholder.remove(), 500);
        }
    }
    
    attemptAutoplay() {
        const playPromise = this.video.play();
        
        if (playPromise !== undefined) {
            playPromise.catch(() => {
                // Fallback to poster
                this.video.style.display = 'none';
                if (this.section) {
                    const poster = this.video.getAttribute('poster');
                    if (poster) {
                        this.section.style.backgroundImage = `url(${poster})`;
                        this.section.style.backgroundSize = 'cover';
                        this.section.style.backgroundPosition = 'center';
                    }
                }
            });
        }
    }
}

/* ---------------------------------------------------------
   5. CINEMATIC CAROUSEL
--------------------------------------------------------- */
class CinematicCarousel {
    constructor() {
        this.swiper = null;
        this.isInitialized = false;
        this.autoplayProgress = null;
        this.progressBar = null;
        this.slideCounter = null;
        this.videos = [];
        
        this.init();
    }

    init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.initializeCarousel());
        } else {
            this.initializeCarousel();
        }
    }

    initializeCarousel() {
        const carouselElement = document.querySelector('.videoProjectsSwiper');
        if (!carouselElement) return;

        this.initializeElements();
        this.preloadVideos();
        this.initializeSwiper();
        this.setupEventListeners();
        
        // Remove loading state
        setTimeout(() => {
            document.querySelector('.cinematic-carousel')?.classList.remove('loading');
        }, 500);
    }

    initializeElements() {
        this.autoplayProgress = document.querySelector('.swiper-autoplay-progress circle');
        this.progressBar = document.querySelector('.progress-bar');
        this.slideCounter = {
            current: document.querySelector('.current-slide'),
            total: document.querySelector('.total-slides')
        };
        this.videos = document.querySelectorAll('.bg-video');
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
        if (!swiperElement || typeof Swiper === 'undefined') return;
        
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

    handleVideoTransition() {
        this.pauseAllVideos();
        setTimeout(() => this.playActiveVideo(), 300);
    }

    playActiveVideo() {
        if (!this.swiper) return;
        
        const activeSlide = this.swiper.slides[this.swiper.activeIndex];
        const activeVideo = activeSlide?.querySelector('.bg-video');
        
        if (activeVideo) {
            activeVideo.currentTime = 0;
            activeVideo.play().catch(() => {
                activeVideo.style.display = 'none';
                const poster = activeVideo.getAttribute('poster');
                if (poster) {
                    activeSlide.style.backgroundImage = `url(${poster})`;
                    activeSlide.style.backgroundSize = 'cover';
                }
            });
        }
    }

    pauseAllVideos() {
        this.videos.forEach(video => {
            if (!video.paused) {
                video.pause();
            }
        });
    }

    preloadNextSlide() {
        if (!this.swiper) return;
        
        const nextIndex = (this.swiper.activeIndex + 1) % this.swiper.slides.length;
        const nextSlide = this.swiper.slides[nextIndex];
        const nextVideo = nextSlide?.querySelector('.bg-video');
        
        if (nextVideo && nextVideo.preload === 'none') {
            nextVideo.preload = 'metadata';
        }
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

    updateProgressBar(progress) {
        if (!this.progressBar) return;
        this.progressBar.style.width = `${progress}%`;
    }

    onAutoplayStart() {
        document.querySelector('.swiper-autoplay-progress')?.classList.add('active');
    }

    onAutoplayStop() {
        document.querySelector('.swiper-autoplay-progress')?.classList.remove('active');
    }

    announceSlideChange(slideNumber) {
        const announcement = document.createElement('div');
        announcement.setAttribute('aria-live', 'polite');
        announcement.setAttribute('aria-atomic', 'true');
        announcement.className = 'sr-only';
        announcement.textContent = `Slide ${slideNumber} activ`;
        
        document.body.appendChild(announcement);
        
        setTimeout(() => {
            document.body.removeChild(announcement);
        }, 1000);
    }

    setupEventListeners() {
        const carousel = document.querySelector('.cinematic-carousel');
        if (!carousel) return;

        // Pause/resume on hover
        carousel.addEventListener('mouseenter', () => {
            if (this.swiper?.autoplay) {
                this.swiper.autoplay.stop();
            }
        });

        carousel.addEventListener('mouseleave', () => {
            if (this.swiper?.autoplay) {
                this.swiper.autoplay.start();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!this.swiper) return;
            
            switch(e.key) {
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

        // Visibility change handling
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.pauseAllVideos();
                this.swiper?.autoplay?.stop();
            } else {
                this.playActiveVideo();
                this.swiper?.autoplay?.start();
            }
        });

        // Intersection Observer
        this.setupIntersectionObserver();
    }

    setupIntersectionObserver() {
        const carousel = document.querySelector('.cinematic-carousel');
        if (!carousel) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.playActiveVideo();
                    this.swiper?.autoplay?.start();
                } else {
                    this.pauseAllVideos();
                    this.swiper?.autoplay?.stop();
                }
            });
        }, {
            threshold: 0.5
        });

        observer.observe(carousel);
    }

    toggleAutoplay() {
        if (!this.swiper?.autoplay) return;
        
        if (this.swiper.autoplay.running) {
            this.swiper.autoplay.stop();
        } else {
            this.swiper.autoplay.start();
        }
    }

    destroy() {
        if (this.swiper) {
            this.pauseAllVideos();
            this.swiper.destroy(true, true);
            this.swiper = null;
            this.isInitialized = false;
        }
    }
}

/* ---------------------------------------------------------
   6. PROJECTS SWIPER
--------------------------------------------------------- */
function initProjectsSwiper() {
    const el = document.querySelector('.projectsSwiper');
    if (!el || typeof Swiper === 'undefined') return;

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

/* ---------------------------------------------------------
   7. LIGHTBOX INITIALIZATION (GLightbox)
--------------------------------------------------------- */
function initLightbox() {
    if (typeof GLightbox !== 'undefined') {
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            preload: false,
            autoplayVideos: false,
            plyr: {
                css: 'https://cdn.plyr.io/3.6.8/plyr.css',
                js: 'https://cdn.plyr.io/3.6.8/plyr.js',
                config: {
                    ratio: '16:9',
                    youtube: {
                        noCookie: true,
                        rel: 0,
                        showinfo: 0,
                        iv_load_policy: 3
                    }
                }
            }
        });
    }
}

/* ---------------------------------------------------------
   8. SMOOTH SCROLL
--------------------------------------------------------- */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (!target) return;
            
            e.preventDefault();
            
            const headerOffset = headerHeight || 100;
            const elementPosition = target.getBoundingClientRect().top;
            const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        });
    });
}

/* ---------------------------------------------------------
   9. LAZY LOADING IMAGES
--------------------------------------------------------- */
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    img.classList.add('lazyloaded');
                    imageObserver.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });

        images.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        images.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            img.classList.add('lazyloaded');
        });
    }
}

/* ---------------------------------------------------------
   10. PERFORMANCE MONITORING
--------------------------------------------------------- */
function initPerformanceMonitoring() {
    if ('PerformanceObserver' in window) {
        // CLS Monitoring
        let clsValue = 0;
        const clsObserver = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
                if (!entry.hadRecentInput) {
                    clsValue += entry.value;
                    if (clsValue > 0.1) {
                        console.warn('High CLS detected:', clsValue);
                    }
                }
            }
        });
        clsObserver.observe({type: 'layout-shift', buffered: true});
        
        // LCP Monitoring
        const lcpObserver = new PerformanceObserver((list) => {
            const entries = list.getEntries();
            const lastEntry = entries[entries.length - 1];
            console.log('LCP:', lastEntry.startTime);
        });
        lcpObserver.observe({type: 'largest-contentful-paint', buffered: true});
        
        // FID Monitoring
        const fidObserver = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
                console.log('FID:', entry.processingStart - entry.startTime);
            }
        });
        fidObserver.observe({type: 'first-input', buffered: true});
    }
}

/* ---------------------------------------------------------
   11. ACCESSIBILITY HELPERS
--------------------------------------------------------- */
function initAccessibility() {
    // Skip to content
    const skipLink = document.querySelector('.skip-link');
    if (skipLink) {
        skipLink.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.querySelector(skipLink.getAttribute('href'));
            if (target) {
                target.tabIndex = -1;
                target.focus();
            }
        });
    }
    
    // Reduced motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.documentElement.style.setProperty('--transition-fast', '0.001ms');
        document.documentElement.style.setProperty('--transition-normal', '0.001ms');
        document.documentElement.style.scrollBehavior = 'auto';
        
        // Disable autoplay
        document.querySelectorAll('video[autoplay]').forEach(video => {
            video.removeAttribute('autoplay');
        });
    }
}

/* ---------------------------------------------------------
   12. INITIALIZATION
--------------------------------------------------------- */
document.addEventListener('DOMContentLoaded', () => {
    // Initialize core components
    const mobileMenu = new MobileMenu();
    const heroVideo = new HeroVideo();
    const cinematicCarousel = new CinematicCarousel();
    
    // Initialize other features
    initProjectsSwiper();
    initLightbox();
    initSmoothScroll();
    initLazyLoading();
    initAccessibility();
    
    // Initialize performance monitoring in development
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        initPerformanceMonitoring();
    }
    
    // Dynamic imports for page-specific modules
    if (document.querySelector('#gallery')) {
        import('./modules/projects.js').then(m => m.default?.());
    }
    
    if (document.querySelector('#ajaxForm')) {
        import('./modules/contact-form.js').then(m => m.initContactForm?.());
    }
});

// Cleanup on page unload
window.addEventListener('beforeunload', () => {
    if (window.cinematicCarousel) {
        window.cinematicCarousel.destroy();
    }
});

// Export for external use
window.MobileMenu = MobileMenu;
window.HeroVideo = HeroVideo;
window.CinematicCarousel = CinematicCarousel;

/* ---------------------------------------------------------
   13. SERVICE WORKER REGISTRATION (Optional)
--------------------------------------------------------- */
if ('serviceWorker' in navigator && window.location.protocol === 'https:') {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => console.log('SW registered:', registration))
            .catch(error => console.log('SW registration failed:', error));
    });
}