// ===================================================================
// GUPTA MACHINERY STORES - MAIN JAVASCRIPT
// Industry-Level Functionality with Mobile Support
// ===================================================================

'use strict';

// === GLOBAL VARIABLES ===
let currentSlide = 0;
let autoSlideInterval;
const SLIDE_INTERVAL = 4000; // 4 seconds

// === INITIALIZE ON DOM LOAD ===
document.addEventListener('DOMContentLoaded', function() {
    initializeCarousel();
    initializeQuoteForm();
    initializeMobileMenu();
    initializeSmoothScroll();
    initializeScrollEffects();
});

// === HERO CAROUSEL INITIALIZATION ===
function initializeCarousel() {
    const slides = document.querySelectorAll('.hero-bg-slide');
    
    if (slides.length === 0) return;
    
    // Set first slide as active
    slides[0].classList.add('active');
    
    // Start auto-rotation
    startAutoSlide();
    
    // Add keyboard navigation
    document.addEventListener('keydown', handleKeyboardNavigation);
    
    // Add touch support for mobile
    initializeTouchSupport();
    
    // Pause on hover (desktop only)
    const heroSection = document.querySelector('section');
    if (heroSection && window.innerWidth > 768) {
        heroSection.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });
        
        heroSection.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    }
}

// === CAROUSEL NAVIGATION ===
function changeSlide(index) {
    const slides = document.querySelectorAll('.hero-bg-slide');
    
    if (slides.length === 0) return;
    
    // Remove active class from current slide
    slides[currentSlide].classList.remove('active');
    
    // Update current slide index
    currentSlide = index;
    if (currentSlide >= slides.length) currentSlide = 0;
    if (currentSlide < 0) currentSlide = slides.length - 1;
    
    // Add active class to new slide
    slides[currentSlide].classList.add('active');
}

function nextSlide() {
    changeSlide(currentSlide + 1);
}

function prevSlide() {
    changeSlide(currentSlide - 1);
}

function startAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(nextSlide, SLIDE_INTERVAL);
}

// === KEYBOARD NAVIGATION ===
function handleKeyboardNavigation(e) {
    if (e.key === 'ArrowLeft') {
        prevSlide();
        startAutoSlide(); // Restart timer
    }
    if (e.key === 'ArrowRight') {
        nextSlide();
        startAutoSlide(); // Restart timer
    }
}

// === TOUCH SUPPORT FOR MOBILE ===
function initializeTouchSupport() {
    let touchStartX = 0;
    let touchEndX = 0;
    
    const heroSection = document.querySelector('section');
    
    if (!heroSection) return;
    
    heroSection.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });
    
    heroSection.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe(touchStartX, touchEndX);
    }, { passive: true });
}

function handleSwipe(startX, endX) {
    const threshold = 50;
    
    if (endX < startX - threshold) {
        nextSlide();
        startAutoSlide();
    }
    if (endX > startX + threshold) {
        prevSlide();
        startAutoSlide();
    }
}

// === QUOTE FORM MODAL ===
function initializeQuoteForm() {
    const modal = document.getElementById('quoteModal');
    const form = document.getElementById('quote-form');
    
    if (!modal || !form) return;
    
    // Close on background click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeQuoteForm();
        }
    });
    
    // Handle form submission
    form.addEventListener('submit', handleQuoteFormSubmit);
    
    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeQuoteForm();
        }
    });
}

function openQuoteForm() {
    const modal = document.getElementById('quoteModal');
    const modalContent = document.getElementById('quoteModalContent');
    
    if (!modal || !modalContent) return;
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Trigger animation
    setTimeout(() => {
        modalContent.classList.remove('translate-x-full');
    }, 10);
}

function closeQuoteForm() {
    const modal = document.getElementById('quoteModal');
    const modalContent = document.getElementById('quoteModalContent');
    
    if (!modal || !modalContent) return;
    
    modalContent.classList.add('translate-x-full');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
}

function handleQuoteFormSubmit(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(e.target);
    
    // Show success message
    showNotification('Thank you! Your quote request has been submitted. We will contact you within 24 hours.', 'success');
    
    // Reset form
    e.target.reset();
    
    // Close modal
    closeQuoteForm();
    
    return false;
}

// === MOBILE MENU ===
function initializeMobileMenu() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (!mobileMenuBtn || !mobileMenu) return;
    
    mobileMenuBtn.addEventListener('click', toggleMobileMenu);
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
    
    // Close menu on link click
    const menuLinks = mobileMenu.querySelectorAll('a');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
}

function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenu) {
        mobileMenu.classList.toggle('hidden');
    }
}

// === SMOOTH SCROLL ===
function initializeSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            
            if (href === '#') return;
            
            const target = document.querySelector(href);
            
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// === SCROLL EFFECTS ===
function initializeScrollEffects() {
    // Fade in elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all cards and sections
    document.querySelectorAll('.product-card, .hover-lift').forEach(el => {
        observer.observe(el);
    });
}

// === NOTIFICATION SYSTEM ===
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-[10001] px-6 py-4 rounded-lg shadow-2xl transform transition-all duration-300 translate-x-full`;
    
    // Set color based on type
    const colors = {
        success: 'bg-green-500 text-white',
        error: 'bg-red-500 text-white',
        warning: 'bg-yellow-500 text-gray-900',
        info: 'bg-blue-500 text-white'
    };
    
    notification.className += ` ${colors[type] || colors.info}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 10);
    
    // Remove after 5 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 5000);
}

// === PARALLAX EFFECTS (Optional) ===
function initializeParallax() {
    const productSection = document.getElementById('productSection');
    const parallaxBg = document.querySelector('.parallax-bg');
    
    if (!productSection || !parallaxBg) return;
    
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const sectionTop = productSection.offsetTop;
        const sectionHeight = productSection.offsetHeight;
        
        if (scrolled + window.innerHeight > sectionTop && 
            scrolled < sectionTop + sectionHeight) {
            const offset = (scrolled - sectionTop) * 0.5;
            parallaxBg.style.transform = `translateY(${offset}px)`;
        }
    }, { passive: true });
}

// === UTILITY FUNCTIONS ===
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// === EXPORT FUNCTIONS FOR INLINE USE ===
window.openQuoteForm = openQuoteForm;
window.closeQuoteForm = closeQuoteForm;
window.toggleMobileMenu = toggleMobileMenu;
window.nextSlide = nextSlide;
window.prevSlide = prevSlide;

console.log('🚀 Gupta Machinery Stores - Initialized Successfully');
