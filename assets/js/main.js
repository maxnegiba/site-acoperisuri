
/* =========================================================
   MAIN.JS – MeisterDach Website Core
   Version: 3.0 | Last update: 2024-07-19
   Contains:
   • Header scroll & resize
   • Hero video lazy-load & autoplay
   • Cinematic Swiper init
   • Mobile-menu delegation
   • Accessibility helpers
   • Performance optimisations
========================================================= */
/* Adaugă la începutul fișierului main.js */
// Previne rearanjările forțate prin batchuire a operațiilor DOM
const batchDOMUpdates = (updates) => {
    requestAnimationFrame(() => {
        // Creează un document fragment pentru a minimiza reflow
        const fragment = document.createDocumentFragment();
        
        // Aplică toate actualizările
        updates.forEach(update => {
            if (update.element && update.styles) {
                Object.assign(update.element.style, update.styles);
            }
        });
    });
};

/* Actualizează funcția updateHeaderState pentru a folosi batchDOMUpdates */
function updateHeaderState() {
    if (!header) return;
    
    requestAnimationFrame(() => {
        const isScrolled = window.scrollY > 50;
        header.classList.toggle('scrolled', isScrolled);
        
        // Folosește transform pentru a evita rearanjarea
        header.style.transform = isScrolled ? 'translateY(-5px)' : 'translateY(0)';
        header.style.boxShadow = isScrolled ? '0 4px 20px rgba(0, 0, 0, 0.1)' : '0 8px 32px rgba(0, 0, 0, 0.08)';
    });
}
/* ---------------------------------------------------------
   1.  CONFIG / UTILS
--------------------------------------------------------- */
// Asigură-te că inițializezi lightbox doar după ce DOM-ul este gata
document.addEventListener('DOMContentLoaded', function() {
  if (typeof lightbox !== 'undefined') {
    lightbox.init();
  }
});

const CONFIG = {
  debounceDelay: 150,
  autoplayDelay: 6000,
  rootPath: window.location.origin + '/'
};

/* Throttle / debounce helpers */
const debounce = (fn, wait = CONFIG.debounceDelay) => {
  let t;
  return (...a) => { clearTimeout(t); t = setTimeout(() => fn(...a), wait); };
};

/* ---------------------------------------------------------
   2.  HEADER SCROLL EFFECT
--------------------------------------------------------- */
const header = document.querySelector('.header');
const heroSection = document.querySelector('.hero-section');

function updateHeaderState() {
  if (!header) return;
  header.classList.toggle('scrolled', window.scrollY > 50);
}
window.addEventListener('scroll', debounce(updateHeaderState, 50));




/* ---------------------------------------------------------
   3.  HERO VIDEO LAZY-LOAD & AUTOPLAY
--------------------------------------------------------- */
document.addEventListener('DOMContentLoaded', () => {
  const heroVideo = document.querySelector('.hero-video');
  const heroSection = document.querySelector('.hero-section');
  const videoContainer = document.querySelector('.hero-video-container');
  const overlay = heroSection?.querySelector('.hero-overlay');
  
  if (!heroVideo) return;

  // Setează starea inițială pentru a preveni layout shift
  heroVideo.style.opacity = '0';
  heroVideo.style.visibility = 'hidden';
  
  // Asigură dimensiuni fixe pentru toate elementele
  const updateDimensions = () => {
    const headerHeight = header?.offsetHeight || 100;
    const sectionHeight = `calc(100vh - ${headerHeight}px)`;
    
    // Actualizează secțiunea hero
    if (heroSection) {
      heroSection.style.minHeight = sectionHeight;
      heroSection.style.maxHeight = sectionHeight;
    }
    
    // Actualizează containerul video
    if (videoContainer) {
      videoContainer.style.minHeight = sectionHeight;
      videoContainer.style.maxHeight = sectionHeight;
    }
    
    // Actualizează overlay-ul
    if (overlay) {
      overlay.style.minHeight = sectionHeight;
      overlay.style.maxHeight = sectionHeight;
    }
  };
  
  // Aplică dimensiunile inițiale
  updateDimensions();
  
  heroVideo.addEventListener('loadeddata', () => {
    heroVideo.setAttribute('data-loaded', 'true');
    // Fă video vizibil și fade-in
    heroVideo.style.visibility = 'visible';
    heroVideo.style.transition = 'opacity 0.5s ease';
    heroVideo.style.opacity = '1';
  });

  // Fallback dacă video nu se încarcă
  setTimeout(() => {
    if (!heroVideo.hasAttribute('data-loaded')) {
      heroVideo.setAttribute('data-loaded', 'true');
      heroVideo.style.visibility = 'visible';
      heroVideo.style.transition = 'opacity 0.5s ease';
      heroVideo.style.opacity = '1';
    }
  }, 3500);

  // Încearcă autoplay
  const playPromise = heroVideo.play();
  if (playPromise !== undefined) {
    playPromise.catch(() => {
      heroVideo.style.display = 'none';
      if (heroSection) {
        heroSection.style.backgroundImage = `url(${heroVideo.getAttribute('poster')})`;
        heroSection.style.backgroundSize = 'cover';
        heroSection.style.backgroundPosition = 'center';
      }
    });
  }
  
  // Actualizează dimensiunile la resize
  window.addEventListener('resize', debounce(updateDimensions, 100));
});

/* ==========================================================================
   ENHANCED CINEMATIC SWIPER INITIALIZATION
========================================================================== */

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
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => this.initializeCarousel());
    } else {
      this.initializeCarousel();
    }
  }

  initializeCarousel() {
    const carouselElement = document.querySelector('.videoProjectsSwiper');
    if (!carouselElement) return;

    // Initialize components
    this.initializeElements();
    this.preloadVideos();
    this.initializeSwiper();
    this.setupEventListeners();
    this.initializeAnimations();
    
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
      // Set loading priority
      video.setAttribute('loading', index === 0 ? 'eager' : 'lazy');
      
      // Handle video loading
      video.addEventListener('loadeddata', () => {
        video.classList.add('loaded');
      });

      // Handle video errors
      video.addEventListener('error', () => {
        console.warn(`Video ${index + 1} failed to load`);
        video.style.display = 'none';
      });
    });
  }

// Înlocuiește initializeSwiper cu versiune optimizată
initializeSwiper() {
    const swiperElement = document.querySelector('.videoProjectsSwiper');
    if (!swiperElement) return;
    
    // Folosește will-change pentru a pregăti browserul
    swiperElement.style.willChange = 'transform';
    
    // Inițializează Swiper fără măsurători inutile
    this.swiper = new Swiper(swiperElement, {
        loop: true,
        effect: 'fade',
        speed: 1200,
        grabCursor: true,
        
        // Dezactivează funcțiile care cauzează reflow
        observer: false,
        observeParents: false,
        observeSlideChildren: false,
        
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        
        on: {
            init: () => this.onSwiperInit(),
            slideChange: () => this.onSlideChange(),
        },
    });
    
    // Elimină will-change după inițializare
    setTimeout(() => {
        swiperElement.style.willChange = 'auto';
    }, 1000);
}


  onSwiperInit(swiper) {
    // Update slide counter
    this.updateSlideCounter(swiper);
    
    // Play first video
    this.playActiveVideo();
    
    // Initialize AOS animations
    if (typeof AOS !== 'undefined') {
      AOS.refresh();
    }
    
    // Set initial progress
    this.updateProgressBar(0);
  }

  onSlideChange(swiper) {
    // Update slide counter
    this.updateSlideCounter(swiper);
    
    // Handle video playback
    this.handleVideoTransition();
    
    // Refresh animations
    this.refreshSlideAnimations();
    
    // Update progress bar
    const progress = (swiper.realIndex + 1) / this.getTotalUniqueSlides(swiper) * 100;
    this.updateProgressBar(progress);
    
    // Announce slide change for screen readers
    this.announceSlideChange(swiper.realIndex + 1);
  }

  getTotalUniqueSlides(swiper) {
    // Calculează numărul de slide-uri unice, excluzând duplicatele din loop
    return swiper.slides.filter(slide => !slide.classList.contains('swiper-slide-duplicate')).length;
  }

  handleVideoTransition() {
    // Pause all videos first
    this.pauseAllVideos();
    
    // Small delay to ensure smooth transition
    setTimeout(() => {
      this.playActiveVideo();
    }, 300);
  }

  playActiveVideo() {
    if (!this.swiper) return;
    
    const activeSlide = this.swiper.slides[this.swiper.activeIndex];
    const activeVideo = activeSlide?.querySelector('.bg-video');
    
    if (activeVideo) {
      activeVideo.currentTime = 0;
      activeVideo.play().catch(() => {
        // Fallback: afișăm poster dacă video nu poate fi redat
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
    
    const circumference = 2 * Math.PI * 20; // radius = 20
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

  refreshSlideAnimations() {
    // Reset and trigger AOS animations for current slide
    if (typeof AOS !== 'undefined') {
      const activeSlide = document.querySelector('.swiper-slide-active');
      if (activeSlide) {
        const animatedElements = activeSlide.querySelectorAll('[data-aos]');
        animatedElements.forEach(el => {
          el.classList.remove('aos-animate');
          setTimeout(() => {
            el.classList.add('aos-animate');
          }, 100);
        });
      }
    }
  }

  announceSlideChange(slideNumber) {
    // Create announcement for screen readers
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

    // Intersection Observer for performance
    this.setupIntersectionObserver();
  }

  setupIntersectionObserver() {
    const carousel = document.querySelector('.cinematic-carousel');
    if (!carousel) return;

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Carousel is visible
          this.playActiveVideo();
          this.swiper?.autoplay?.start();
        } else {
          // Carousel is not visible
          this.pauseAllVideos();
          this.swiper?.autoplay?.stop();
        }
      });
    }, {
      threshold: 0.5
    });

    observer.observe(carousel);
  }

  initializeAnimations() {
    // Initialize AOS if available
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: false,
        mirror: true,
        offset: 100,
      });
    }

    // Add entrance animations
    const carousel = document.querySelector('.cinematic-carousel');
    if (carousel) {
      carousel.style.opacity = '0';
      carousel.style.transform = 'scale(1.05)';
      
      setTimeout(() => {
        carousel.style.transition = 'opacity 1s ease, transform 1s ease';
        carousel.style.opacity = '1';
        carousel.style.transform = 'scale(1)';
      }, 100);
    }
  }

  toggleAutoplay() {
    if (!this.swiper?.autoplay) return;
    
    if (this.swiper.autoplay.running) {
      this.swiper.autoplay.stop();
    } else {
      this.swiper.autoplay.start();
    }
  }

  // Public methods for external control
  goToSlide(index) {
    if (this.swiper) {
      this.swiper.slideTo(index);
    }
  }

  nextSlide() {
    if (this.swiper) {
      this.swiper.slideNext();
    }
  }

  prevSlide() {
    if (this.swiper) {
      this.swiper.slidePrev();
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

  // Performance monitoring
  getPerformanceMetrics() {
    return {
      isInitialized: this.isInitialized,
      activeSlide: this.swiper?.activeIndex || 0,
      totalSlides: this.swiper?.slides?.length || 0,
      autoplayRunning: this.swiper?.autoplay?.running || false,
      videosLoaded: Array.from(this.videos).filter(v => v.readyState >= 2).length,
      totalVideos: this.videos.length
    };
  }
}

// Initialize carousel when DOM is ready
let cinematicCarousel;

document.addEventListener('DOMContentLoaded', () => {
  cinematicCarousel = new CinematicCarousel();
});

// Cleanup on page unload
window.addEventListener('beforeunload', () => {
  if (cinematicCarousel) {
    cinematicCarousel.destroy();
  }
});

// Export for external use
window.CinematicCarousel = CinematicCarousel;

/* ---------------------------------------------------------
   6.  LAZY MODULES
--------------------------------------------------------- */
function initProjectsSwiper() {
    const el = document.querySelector('.projectsSwiper');
    if (!el) return;

    // Use requestAnimationFrame to prevent forced sync layouts
    requestAnimationFrame(() => {
        // Measure layout properties before any DOM changes
        const containerWidth = el.offsetWidth;
        
        // Initialize Swiper with optimized settings
        new Swiper(el, {
            loop: true,
            spaceBetween: 10,
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

document.addEventListener('DOMContentLoaded', () => {
  initProjectsSwiper();

  /* Dynamically import project-specific modules */
  if (document.querySelector('#gallery')) {
    import('./modules/projects.js').then(m => m.default?.());
  }
  if (document.querySelector('#ajaxForm')) {
    import('./modules/contact-form.js').then(m => m.initContactForm?.());
  }
});

/* ---------------------------------------------------------
   7.  ACCESSIBILITY & REDUCED MOTION
--------------------------------------------------------- */
if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
  document.documentElement.style.setProperty('--transition-fast', '0.001ms');
  document.documentElement.style.setProperty('--transition-normal', '0.001ms');
  document.documentElement.style.scrollBehavior = 'auto';
}

/* ---------------------------------------------------------
   8.  PERFORMANCE – Preload critical assets
--------------------------------------------------------- */
const preload = (href, as = 'image') => {
  const l = document.createElement('link');
  l.rel = 'preload';
  l.href = href;
  l.as = as;
  document.head.appendChild(l);
};



// Înlocuiește codul problematic din main.js (linia 609) cu:
document.addEventListener('DOMContentLoaded', function() {
  // Inițializează Swiper corect
  const swiper = new Swiper('.swiper-container', {
    // opțiunile tale aici
  });
  
  // Abia acum poți folosi evenimentele swiper
  swiper.on('slideChange', function () {
    const bullets = document.querySelectorAll('.swiper-pagination-bullet');
    bullets.forEach((bullet, index) => {
      if (index === swiper.activeIndex) {
        bullet.setAttribute('aria-current', 'true');
      } else {
        bullet.removeAttribute('aria-current');
      }
    });
  });
});

