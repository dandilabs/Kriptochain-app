// ===== Performance Optimized Main JavaScript =====

(function() {
    'use strict';

    // ===== Utility Functions =====
    const debounce = (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    };

    const throttle = (func, limit) => {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    };

    // ===== DOM Ready =====
    const init = () => {
        initNavbar();
        initScrollEffects();
        initCounterAnimation();
        initFormValidation();
        initLazyLoading();
        initAccessibility();
        initPerformanceOptimizations();
        initBootstrapComponents();
        initCardHoverEffects();
    };

    // ===== Navbar Functionality =====
    const initNavbar = () => {
        const navbar = document.getElementById('navbar');
        if (!navbar) return;

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();
                    const navbarHeight = navbar.offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Close mobile menu
                    const navbarCollapse = document.getElementById('navbarContent');
                    if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) bsCollapse.hide();
                    }
                }
            });
        });

        // Auto-close mobile menu on outside click
        document.addEventListener('click', (e) => {
            const navbarCollapse = document.getElementById('navbarContent');
            const navbarToggler = document.querySelector('.navbar-toggler');

            if (navbarCollapse && navbarCollapse.classList.contains('show') &&
                !navbarCollapse.contains(e.target) &&
                !navbarToggler.contains(e.target)) {
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                if (bsCollapse) bsCollapse.hide();
            }
        });
    };

    // ===== Scroll Effects =====
    const initScrollEffects = () => {
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        const handleScroll = throttle(() => {
            const scrollY = window.pageYOffset;

            // Show/hide scroll to top button
            if (scrollToTopBtn) {
                if (scrollY > 300) {
                    scrollToTopBtn.style.display = 'flex';
                    scrollToTopBtn.style.opacity = '1';
                } else {
                    scrollToTopBtn.style.opacity = '0';
                    setTimeout(() => {
                        if (scrollY <= 300) {
                            scrollToTopBtn.style.display = 'none';
                        }
                    }, 300);
                }
            }

            // Navbar background on scroll
            const navbar = document.getElementById('navbar');
            if (navbar) {
                if (scrollY > 50) {
                    navbar.style.background = 'rgba(26, 41, 53, 0.95)';
                    navbar.style.backdropFilter = 'blur(10px)';
                } else {
                    navbar.style.background = 'var(--dark)';
                    navbar.style.backdropFilter = 'none';
                }
            }
        }, 16); // ~60fps

        window.addEventListener('scroll', handleScroll, { passive: true });

        // Scroll to top functionality
        if (scrollToTopBtn) {
            scrollToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    };

    // ===== Counter Animation =====
    const initCounterAnimation = () => {
        const counters = document.querySelectorAll('.statistik-angka');
        if (counters.length === 0) return;

        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000; // 2 seconds
            const step = target / (duration / 16); // 60fps
            let current = 0;

            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            updateCounter();
        };

        // Intersection Observer for counter animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    counterObserver.unobserve(counter);
                }
            });
        }, {
            threshold: 0.5,
            rootMargin: '0px 0px -50px 0px'
        });

        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    };

    // ===== Form Validation =====
    const initFormValidation = () => {
        const forms = document.querySelectorAll('.needs-validation');

        forms.forEach(form => {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });

            // Real-time validation
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('is-invalid');
                        this.classList.add('is-valid');
                    } else {
                        this.classList.remove('is-valid');
                        this.classList.add('is-invalid');
                    }
                });
            });
        });

        // Contact form handling
        const contactForm = document.getElementById('form-kontak');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Simulate form submission
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;

                submitBtn.textContent = 'Mengirim...';
                submitBtn.disabled = true;

                setTimeout(() => {
                    alert('Pesan berhasil dikirim! Kami akan segera menghubungi Anda.');
                    this.reset();
                    this.classList.remove('was-validated');
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        }
    };

    // ===== Lazy Loading =====
    const initLazyLoading = () => {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            }, {
                rootMargin: '50px 0px'
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    };

    // ===== Accessibility Enhancements =====
    const initAccessibility = () => {
        // Skip to main content link
        const skipLink = document.createElement('a');
        skipLink.href = '#main-content';
        skipLink.textContent = 'Skip to main content';
        skipLink.className = 'sr-only sr-only-focusable';
        skipLink.style.cssText = `
            position: absolute;
            top: -40px;
            left: 6px;
            z-index: 1000;
            color: white;
            background: var(--primary);
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            transition: top 0.3s;
        `;

        skipLink.addEventListener('focus', () => {
            skipLink.style.top = '6px';
        });

        skipLink.addEventListener('blur', () => {
            skipLink.style.top = '-40px';
        });

        document.body.insertBefore(skipLink, document.body.firstChild);

        // Add main content ID if not exists
        const mainContent = document.querySelector('main') || document.querySelector('#hero') || document.querySelector('.container');
        if (mainContent && !mainContent.id) {
            mainContent.id = 'main-content';
        }

        // Keyboard navigation for cards
        document.querySelectorAll('.card, .pricing-card, .why-card').forEach(card => {
            if (!card.hasAttribute('tabindex')) {
                card.setAttribute('tabindex', '0');
            }

            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    const link = this.querySelector('a');
                    if (link) {
                        e.preventDefault();
                        link.click();
                    }
                }
            });
        });

        // Announce dynamic content changes
        const announcer = document.createElement('div');
        announcer.setAttribute('aria-live', 'polite');
        announcer.setAttribute('aria-atomic', 'true');
        announcer.className = 'sr-only';
        document.body.appendChild(announcer);

        window.announceToScreenReader = (message) => {
            announcer.textContent = message;
            setTimeout(() => {
                announcer.textContent = '';
            }, 1000);
        };
    };

    // ===== Performance Optimizations =====
    const initPerformanceOptimizations = () => {
        // Preload critical resources
        const preloadLinks = [
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
            'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css'
        ];

        preloadLinks.forEach(href => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'style';
            link.href = href;
            document.head.appendChild(link);
        });

        // Optimize images
        document.querySelectorAll('img').forEach(img => {
            if (!img.hasAttribute('loading')) {
                img.setAttribute('loading', 'lazy');
            }
            if (!img.hasAttribute('decoding')) {
                img.setAttribute('decoding', 'async');
            }
        });

        // Service Worker registration (if available)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('SW registered: ', registration);
                    })
                    .catch(registrationError => {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
    };

    // ===== Bootstrap Components Initialization =====
    const initBootstrapComponents = () => {
        // Initialize Bootstrap tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl, {
                boundary: 'viewport'
            });
        });

        // Initialize Bootstrap popovers
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl, {
                boundary: 'viewport'
            });
        });

        // Initialize Bootstrap modals with accessibility
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('shown.bs.modal', function() {
                const firstInput = this.querySelector('input, textarea, select, button');
                if (firstInput) firstInput.focus();
            });
        });
    };

    // ===== Card Hover Effects =====
    const initCardHoverEffects = () => {
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const x = e.pageX - card.offsetLeft;
                const y = e.pageY - card.offsetTop;

                card.style.transform = `perspective(1000px) rotateX(${(y - card.offsetHeight/2)/20}deg) rotateY(${-(x - card.offsetWidth/2)/20}deg)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
            });
        });
    };

    // ===== Responsive Utilities =====
    const handleResize = debounce(() => {
        // Adjust layout for different screen sizes
        const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

        // Mobile-specific optimizations
        if (vw < 768) {
            // Optimize touch targets
            document.querySelectorAll('.btn, .nav-link, .social-icon').forEach(el => {
                if (el.offsetHeight < 44) {
                    el.style.minHeight = '44px';
                }
            });
        }

        // Update CSS custom properties based on viewport
        document.documentElement.style.setProperty('--vh', `${window.innerHeight * 0.01}px`);
    }, 250);

    window.addEventListener('resize', handleResize, { passive: true });
    window.addEventListener('orientationchange', handleResize, { passive: true });

    // ===== Error Handling =====
    window.addEventListener('error', (e) => {
        console.error('JavaScript error:', e.error);
        // Could send to analytics service
    });

    // ===== Initialize Everything =====
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Initial resize call
    handleResize();

    // ===== Public API =====
    window.KriptoChain = {
        init,
        debounce,
        throttle,
        announceToScreenReader: window.announceToScreenReader
    };

    // Animate statistics counter
function animateStats() {
  const statNumbers = document.querySelectorAll('.stat-number');

  statNumbers.forEach(stat => {
    const target = parseInt(stat.getAttribute('data-target'));
    const duration = 2000; // 2 seconds
    const start = 0;
    const increment = target / (duration / 16); // 60fps

    let current = start;
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        clearInterval(timer);
        current = target;
        stat.classList.add('animated');
      }
      stat.textContent = Math.floor(current);
    }, 16);
  });
}

// Run when section is in view
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      animateStats();
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 });

const statsSection = document.getElementById('statistik');
if (statsSection) {
  observer.observe(statsSection);
}

})();
