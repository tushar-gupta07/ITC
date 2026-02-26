<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Indian Traders Corp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0a2463',
                        secondary: '#b71c1c',
                        accent: '#ff6b35',
                    }
                }
            }
        }
    </script>
    <style>
        /* ========================================
           LAZY LOADING ANIMATIONS
        ======================================== */
        .lazy-load {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .lazy-load.loaded {
            opacity: 1;
            transform: translateY(0);
        }

        /* Image lazy loading */
        img[data-src] {
            opacity: 0;
            transition: opacity 0.3s;
        }

        img.loaded {
            opacity: 1;
        }

        /* ========================================
           SKELETON LOADERS
        ======================================== */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        /* Contact info skeleton */
        .contact-skeleton {
            background: #f0f0f0;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .skeleton-line {
            height: 20px;
            background: linear-gradient(90deg, #e0e0e0 25%, #d0d0d0 50%, #e0e0e0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .skeleton-circle {
            width: 56px;
            height: 56px;
            background: linear-gradient(90deg, #e0e0e0 25%, #d0d0d0 50%, #e0e0e0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 50%;
        }

        /* ========================================
           BANNER STYLES
        ======================================== */
        .page-banner {
            height: 220px;
        }

        .banner-image {
            object-fit: contain;
            object-position: center;
        }

        @media (min-width: 640px) {
            .page-banner {
                height: 320px;
            }
            .banner-image {
                object-fit: cover;
            }
        }

        @media (min-width: 1024px) {
            .page-banner {
                height: 450px;
            }
            .banner-image {
                object-fit: cover;
            }
        }

        @media (min-width: 1440px) {
            .page-banner {
                height: 550px;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
<?php include 'assets/include/header.php'; ?>

<!-- Banner with Skeleton -->
<section class="page-banner" style="width: 100%; position: relative; overflow: hidden; margin: 0; padding: 0; background: #e5e7eb;">
    <div style="position: relative; width: 100%; height: 100%;">
        <!-- Skeleton -->
        <div class="skeleton banner-image" id="bannerSkeleton" style="width: 100%; height: 100%; display: block;"></div>
        <!-- Image -->
        <img data-src="assets/images/crousel2.jpg" 
             alt="Contact Indian Traders Corp" 
             class="banner-image"
             id="bannerImage"
             style="width: 100%; height: 100%; display: none; position: absolute; top: 0; left: 0;">
    </div>
</section>

<!-- Contact Information & Form -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-7xl mx-auto">
            
            <!-- Contact Information with Skeleton -->
            <div class="lazy-load">
                <div class="inline-block bg-blue-100 text-primary px-4 py-1 rounded-full text-sm font-bold mb-6">
                    REACH US
                </div>
                <h2 class="text-4xl font-bold text-primary mb-6">Let's Connect</h2>
                <p class="text-gray-600 mb-8 text-lg">Have questions? We're here to provide expert consultation and support for all your industrial needs.</p>

                <!-- Contact Cards Container -->
                <div id="contactCardsContainer">
                    <!-- Skeletons will be shown initially -->
                    <div class="contact-skeleton">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div class="skeleton-circle"></div>
                            <div style="flex: 1;">
                                <div class="skeleton-line" style="width: 60%;"></div>
                                <div class="skeleton-line" style="width: 80%;"></div>
                                <div class="skeleton-line" style="width: 70%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-skeleton">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div class="skeleton-circle"></div>
                            <div style="flex: 1;">
                                <div class="skeleton-line" style="width: 60%;"></div>
                                <div class="skeleton-line" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-skeleton">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div class="skeleton-circle"></div>
                            <div style="flex: 1;">
                                <div class="skeleton-line" style="width: 60%;"></div>
                                <div class="skeleton-line" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-skeleton">
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <div class="skeleton-circle"></div>
                            <div style="flex: 1;">
                                <div class="skeleton-line" style="width: 60%;"></div>
                                <div class="skeleton-line" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-xl border-2 border-gray-200 lazy-load">
                <h2 class="text-3xl font-bold text-primary mb-6">Send Us a Message</h2>
                <form id="contact-form" class="space-y-5">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                        <input type="text" name="fullName" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Email Address *</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Phone Number *</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Subject *</label>
                        <select name="subject" required class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="">Select a subject</option>
                            <option value="inquiry">General Inquiry</option>
                            <option value="quote">Request Quote</option>
                            <option value="support">Technical Support</option>
                            <option value="partnership">Business Partnership</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Message *</label>
                        <textarea name="message" required rows="5" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" placeholder="Tell us about your requirements..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-secondary hover:bg-red-700 text-white font-bold py-4 rounded-lg transition transform hover:scale-105 shadow-lg">
                        Send Message
                    </button>
                </form>

                <div id="form-message" class="hidden mt-4 p-4 rounded-lg"></div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section with Lazy Load -->
<section class="py-20 bg-gray-50 lazy-load">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-block bg-red-100 text-secondary px-4 py-1 rounded-full text-sm font-bold mb-4">
                LOCATION
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-primary mb-4">Find Us</h2>
            <p class="text-gray-600 text-lg">Visit our showroom in Gandhibagh, Nagpur</p>
        </div>
        <div class="max-w-5xl mx-auto">
            <div class="bg-gray-200 rounded-2xl overflow-hidden shadow-2xl" style="height: 450px;" id="mapContainer">
                <!-- Map Skeleton -->
                <div class="skeleton" style="width: 100%; height: 100%;" id="mapSkeleton"></div>
                <!-- Actual Map (hidden initially) -->
                <iframe 
                    id="googleMap"
                    data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.2!2d79.08!3d21.15!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDA5JzAwLjAiTiA3OcKwMDQnNDguMCJF!5e0!3m2!1sen!2sin!4v1234567890"
                    width="100%" 
                    height="100%" 
                    style="border:0; display: none;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

<?php include 'assets/include/footer.php'; ?>

<script>
// ============================================================================
// BANNER IMAGE LOADING
// ============================================================================

window.addEventListener('DOMContentLoaded', function() {
    const bannerImg = document.getElementById('bannerImage');
    const bannerSkeleton = document.getElementById('bannerSkeleton');
    
    if (bannerImg && bannerImg.dataset.src) {
        bannerImg.src = bannerImg.dataset.src;
        bannerImg.style.display = 'block';
        
        bannerImg.onload = function() {
            bannerImg.classList.add('loaded');
            if (bannerSkeleton) {
                bannerSkeleton.style.display = 'none';
            }
        };
        
        bannerImg.onerror = function() {
            console.error('Banner image failed to load');
            if (bannerSkeleton) {
                bannerSkeleton.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#666;">Image not found</div>';
            }
        };
    }
});

// ============================================================================
// CONTACT CARDS LOADING
// ============================================================================

const contactCardsHTML = `
    <div class="space-y-6">
        <!-- Address -->
        <div class="flex items-start space-x-4 bg-blue-50 p-6 rounded-xl lazy-load">
            <div class="w-14 h-14 bg-primary rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">Visit Our Office</h3>
                <p class="text-gray-600">Opposite Daga Hospital, Gandhibagh<br>Nagpur, Maharashtra - 440002, India</p>
            </div>
        </div>

        <!-- Phone -->
        <div class="flex items-start space-x-4 bg-green-50 p-6 rounded-xl lazy-load">
            <div class="w-14 h-14 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">Call Us</h3>
                <p class="text-gray-600">+91 712 234 5678<br>+91 712 234 5679</p>
            </div>
        </div>

        <!-- Email -->
        <div class="flex items-start space-x-4 bg-yellow-50 p-6 rounded-xl lazy-load">
            <div class="w-14 h-14 bg-secondary rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">Email Us</h3>
                <p class="text-gray-600">sales@itc.com<br>sales@indiantraderscorp.com</p>
            </div>
        </div>

        <!-- Working Hours -->
        <div class="flex items-start space-x-4 bg-purple-50 p-6 rounded-xl lazy-load">
            <div class="w-14 h-14 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">Business Hours</h3>
                <p class="text-gray-600">Monday - Saturday: 10:30 AM - 6:00 PM<br>Sunday: Closed</p>
            </div>
        </div>
    </div>
`;

// Load contact cards after delay
setTimeout(() => {
    const container = document.getElementById('contactCardsContainer');
    if (container) {
        container.innerHTML = contactCardsHTML;
        initLazyLoad();
    }
}, 600);

// ============================================================================
// LAZY LOAD MAP
// ============================================================================

const mapObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const iframe = document.getElementById('googleMap');
            const skeleton = document.getElementById('mapSkeleton');
            
            if (iframe && iframe.dataset.src) {
                iframe.src = iframe.dataset.src;
                iframe.style.display = 'block';
                
                iframe.onload = () => {
                    if (skeleton) {
                        skeleton.style.display = 'none';
                    }
                };
            }
            
            mapObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });

document.addEventListener('DOMContentLoaded', function() {
    const mapContainer = document.getElementById('mapContainer');
    if (mapContainer) {
        mapObserver.observe(mapContainer);
    }
});

// ============================================================================
// LAZY LOAD SECTIONS
// ============================================================================

function initLazyLoad() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('loaded');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '50px' });

    document.querySelectorAll('.lazy-load').forEach(el => {
        observer.observe(el);
    });
}

document.addEventListener('DOMContentLoaded', initLazyLoad);

// ============================================================================
// MODAL FUNCTIONS
// ============================================================================

function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    if (menu) {
        menu.classList.toggle('hidden');
    }
}

function openQuoteForm() {
    const modal = document.getElementById('quoteModal');
    const content = document.getElementById('quoteModalContent');
    if (modal && content) {
        modal.classList.remove('hidden');
        setTimeout(function() {
            content.style.transform = 'scale(1)';
        }, 10);
        document.body.style.overflow = 'hidden';
    }
}

function closeQuoteForm() {
    const content = document.getElementById('quoteModalContent');
    if (content) {
        content.style.transform = 'scale(0.95)';
        setTimeout(function() {
            const modal = document.getElementById('quoteModal');
            if (modal) {
                modal.classList.add('hidden');
            }
        }, 300);
        document.body.style.overflow = '';
    }
}

function handleFormSubmit(event) {
    event.preventDefault();
    alert('Thank you! Your quote request has been submitted. We will contact you within 24 hours.');
    closeQuoteForm();
    const form = document.getElementById('quote-form');
    if (form) {
        form.reset();
    }
    return false;
}

// Close on background click
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.onclick = function(e) {
            if (e.target.id === 'quoteModal') {
                closeQuoteForm();
            }
        };
    }
});

// Close on ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modal = document.getElementById('quoteModal');
        if (modal && !modal.classList.contains('hidden')) {
            closeQuoteForm();
        }
    }
});

// ============================================================================
// CONTACT FORM SUBMISSION
// ============================================================================

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const messageDiv = document.getElementById('form-message');
            if (messageDiv) {
                messageDiv.className = 'mt-4 p-4 rounded-lg bg-green-100 text-green-700 border-2 border-green-300';
                messageDiv.textContent = 'Thank you for your message! We will get back to you soon.';
                messageDiv.classList.remove('hidden');
                this.reset();
                
                setTimeout(() => {
                    messageDiv.classList.add('hidden');
                }, 5000);
            }
        });
    }
});

console.log('✓ Contact page loaded with skeleton + lazy loading');
</script>
</body>
</html>
