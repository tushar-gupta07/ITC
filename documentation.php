<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation - Indian Traders Corp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#0a2463',
                    dark: '#071940',
                    light: '#1e3a8a',
                },
                secondary: {
                    DEFAULT: '#0a2463',
                    dark: '#b71c1c',
                    light: '#e53935',
                },
                accent: '#1e3a8a',
            },
            boxShadow: {
                'custom': '0 10px 40px rgba(0, 0, 0, 0.15)',
            },
            animation: {
                'scroll': 'scroll 30s linear infinite',
                'fade-in': 'fadeIn 0.6s ease-out',
                'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                'skeleton': 'skeleton 1.5s ease-in-out infinite',
            },
            keyframes: {
                skeleton: {
                    '0%, 100%': { opacity: '1' },
                    '50%': { opacity: '0.5' },
                }
            }
        }
    }
}

    </script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="bg-gray-50">
<?php include 'assets/include/header.php'; ?>

<!-- Include Modal -->
<?php include 'assets/include/modal.php'; ?>

<!-- Page Banner with Lazy Loading - FIXED VERSION -->
<section class="page-banner" style="width: 100%; position: relative; overflow: hidden; margin: 0; padding: 0; background: #e5e7eb;">
    <div style="position: relative; width: 100%; height: 100%;">
        <!-- Skeleton Loader -->
        <div class="skeleton banner-image" id="bannerSkeleton" style="width: 100%; height: 100%; display: block;"></div>
        <!-- Actual Image -->
        <img data-src="assets/images/crousel1.jpg" 
             alt="Documentation - Indian Traders Corp" 
             class="banner-image"
             id="bannerImage"
             style="width: 100%; height: 100%; display: none; position: absolute; top: 0; left: 0;">
    </div>
</section>

<!-- Responsive Banner CSS -->
<style>
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
    }

    @media (min-width: 1440px) {
        .page-banner {
            height: 550px;
        }
    }
</style>

<!-- Documentation Overview Section -->
<section class="py-20 bg-white lazy-load">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-block bg-blue-100 text-primary px-4 py-1 rounded-full text-sm font-bold mb-4">
                    QUALITY DOCUMENTATION
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">Comprehensive Product Documentation</h1>
                <p class="text-gray-600 text-lg">
                    Complete documentation and quality certifications for all our industrial products
                </p>
            </div>

            <div class="prose prose-lg max-w-none">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    At Indian Traders Corp, we maintain comprehensive documentation for all our products, ensuring complete transparency and traceability. Our documentation includes material test certificates, quality assurance reports, compliance certificates, and detailed product specifications that meet international standards.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- ========================================== -->
<!-- CERTIFICATE SHOWCASE SECTION -->
<!-- ========================================== -->

<!-- ========================================== -->
<!-- INTRODUCTION / ABOUT SECTION -->
<!-- ========================================== -->
<section class="py-16 sm:py-20 md:py-24 bg-gradient-to-br from-white via-gray-50 to-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            
            <!-- Content Grid - Image Left, Content Right -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                
                <!-- Left Side - Image -->
                <div class="relative group">
                    <!-- Main Image Container -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl transform transition-all duration-700 hover:scale-105 hover:rotate-1">
                        <img src="https://placehold.co/800x900/0a2463/ffffff?text=Company+Image" 
                             alt="Company Introduction" 
                             class="w-full h-auto object-cover"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-primary/80 via-blue-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute top-6 right-6 bg-white/95 backdrop-blur-sm px-6 py-3 rounded-2xl shadow-xl transform group-hover:scale-110 transition-transform duration-500">
                            <div class="flex items-center gap-2">
                                <svg class="w-6 h-6 text-green-600 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <div class="text-left">
                                    <p class="text-xs text-gray-500 leading-none">Since</p>
                                    <p class="text-lg font-bold text-primary leading-none">1995</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Stats Bar -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/90 to-transparent p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                            <div class="grid grid-cols-3 gap-4 text-white text-center">
                                <div>
                                    <p class="text-2xl font-bold">30+</p>
                                    <p class="text-xs opacity-90">Years</p>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold">500+</p>
                                    <p class="text-xs opacity-90">Projects</p>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold">100%</p>
                                    <p class="text-xs opacity-90">Quality</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-gradient-to-br from-blue-400 to-blue-600 rounded-3xl opacity-20 blur-2xl -z-10"></div>
                    <div class="absolute -bottom-6 -right-6 w-40 h-40 bg-gradient-to-br from-red-400 to-red-600 rounded-3xl opacity-20 blur-2xl -z-10"></div>
                </div>

                <!-- Right Side - Content -->
                <div class="lg:pl-8">
                    <!-- Section Tag -->
                    <div class="inline-block mb-4">
                        <div class="bg-gradient-to-r from-blue-100 to-blue-50 text-primary px-5 py-2 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider shadow-md border border-blue-200">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                About Our Company
                            </span>
                        </div>
                    </div>

                    <!-- Main Heading -->
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                        Leading Manufacturer of 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-blue-700 to-secondary">Premium Industrial Products</span>
                    </h2>

                    <!-- Description -->
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-6">
                        With over three decades of excellence in manufacturing, we have established ourselves as a trusted name in the industry. Our commitment to quality, innovation, and customer satisfaction drives everything we do.
                    </p>

                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-8">
                        We specialize in producing high-grade industrial components that meet international standards, serving clients across various sectors including oil & gas, power generation, and heavy engineering.
                    </p>

                    <!-- Feature List -->
                    <div class="space-y-4 mb-8">
                        <!-- Feature 1 -->
                        <div class="flex items-start gap-4 group">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">ISO Certified Quality</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Internationally certified manufacturing processes ensuring consistent product excellence</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex items-start gap-4 group">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-green-600 transition-colors">Advanced Technology</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">State-of-the-art machinery and cutting-edge manufacturing techniques</p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex items-start gap-4 group">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-red-600 transition-colors">Expert Team</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Skilled professionals with decades of combined industry experience</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <button onclick="openQuoteModal()" class="group bg-gradient-to-r from-primary to-blue-800 hover:from-blue-800 hover:to-primary text-white px-8 py-4 rounded-xl font-bold shadow-xl hover:shadow-2xl transform hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2">
                            <span>Learn More</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>

                        <button onclick="openQuoteModal()" class="group bg-white hover:bg-gray-50 text-primary px-8 py-4 rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2 border-2 border-primary">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>Contact Us</span>
                        </button>
                    </div>

                    <!-- Stats Row -->
                    <div class="mt-10 pt-8 border-t border-gray-200">
                        <div class="grid grid-cols-3 gap-6 text-center">
                            <div class="group cursor-pointer">
                                <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-800 mb-1 group-hover:scale-110 transition-transform">30+</div>
                                <div class="text-sm text-gray-600">Years Experience</div>
                            </div>
                            <div class="group cursor-pointer">
                                <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-green-800 mb-1 group-hover:scale-110 transition-transform">500+</div>
                                <div class="text-sm text-gray-600">Projects Done</div>
                            </div>
                            <div class="group cursor-pointer">
                                <div class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800 mb-1 group-hover:scale-110 transition-transform">100%</div>
                                <div class="text-sm text-gray-600">Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- ALTERNATIVE LAYOUT: CONTENT LEFT, IMAGE RIGHT -->
<!-- ========================================== -->
<section class="py-16 sm:py-20 md:py-24 bg-gradient-to-br from-gray-50 via-white to-gray-50 overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            
            <!-- Content Grid - Content Left, Image Right -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                
                <!-- Left Side - Content -->
                <div class="lg:pr-8 order-2 lg:order-1">
                    <!-- Section Tag -->
                    <div class="inline-block mb-4">
                        <div class="bg-gradient-to-r from-red-100 to-red-50 text-secondary px-5 py-2 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider shadow-md border border-red-200">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                Our Products
                            </span>
                        </div>
                    </div>

                    <!-- Main Heading -->
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                        Precision Engineered
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary via-red-700 to-primary">Industrial Solutions</span>
                    </h2>

                    <!-- Description -->
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-6">
                        We manufacture a comprehensive range of industrial products designed to meet the most demanding specifications. Our products are trusted by leading companies worldwide.
                    </p>

                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-8">
                        From flanges to fittings, valves to fasteners, every product undergoes rigorous quality testing to ensure it meets international standards and exceeds customer expectations.
                    </p>

                    <!-- Product Categories -->
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-2xl border border-blue-200 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 group cursor-pointer">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900">Flanges</h3>
                            </div>
                            <p class="text-xs text-gray-600">High-quality pipe flanges</p>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-2xl border border-green-200 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 group cursor-pointer">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900">Fittings</h3>
                            </div>
                            <p class="text-xs text-gray-600">Precision pipe fittings</p>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-2xl border border-purple-200 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 group cursor-pointer">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900">Valves</h3>
                            </div>
                            <p class="text-xs text-gray-600">Industrial valve systems</p>
                        </div>

                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-2xl border border-orange-200 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 group cursor-pointer">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900">Fasteners</h3>
                            </div>
                            <p class="text-xs text-gray-600">Heavy-duty fasteners</p>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <button onclick="openQuoteModal()" class="group bg-gradient-to-r from-secondary to-red-800 hover:from-red-800 hover:to-secondary text-white px-8 py-4 rounded-xl font-bold shadow-xl hover:shadow-2xl transform hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2">
                        <span>View All Products</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </button>
                </div>

                <!-- Right Side - Image -->
                <div class="relative group order-1 lg:order-2">
                    <!-- Main Image Container -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl transform transition-all duration-700 hover:scale-105 hover:-rotate-1">
                        <img src="https://placehold.co/800x900/b71c1c/ffffff?text=Products+Image" 
                             alt="Products Showcase" 
                             class="w-full h-auto object-cover"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-bl from-secondary/80 via-red-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur-sm px-6 py-4 rounded-2xl shadow-xl transform group-hover:scale-110 transition-transform duration-500">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p class="text-xs text-gray-500 leading-none">Quality</p>
                                    <p class="text-lg font-bold text-primary leading-none">Certified</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-gradient-to-br from-red-400 to-red-600 rounded-3xl opacity-20 blur-2xl -z-10"></div>
                    <div class="absolute -bottom-6 -left-6 w-40 h-40 bg-gradient-to-br from-orange-400 to-orange-600 rounded-3xl opacity-20 blur-2xl -z-10"></div>
                </div>

            </div>

        </div>
    </div>
</section>

<script>
function openQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}
</script>

<section class="py-16 sm:py-20 md:py-24 bg-gradient-to-b from-white via-gray-50 to-white lazy-load">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-block bg-red-100 text-secondary px-4 py-1 rounded-full text-sm font-bold mb-4">
                DOCUMENTATION TYPES
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-primary mb-4">Complete Documentation Portfolio</h2>
            <p class="text-gray-600 text-lg">All documents verified and certified by authorized bodies</p>
        </div>

        <!-- Certificates Grid - 3 per row -->
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                
                <!-- Certificate 1: ISO 9001:2008 -->
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-blue-300 transform hover:-translate-y-2">
                    <!-- Certificate Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 aspect-[4/3]">
                        <img src="https://placehold.co/800x600/0a2463/ffffff?text=ISO+9001:2008" 
                             alt="ISO 9001:2008 Certificate" 
                             class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-all duration-700"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Certificate Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-4 py-2 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                CERTIFIED
                            </div>
                        </div>

                        <!-- View Certificate Icon (appears on hover) -->
              
                    </div>
                    
                    <!-- Certificate Info -->
                    <div class="p-6">
                        <!-- Title & Icon -->
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500">
                                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-blue-600 transition-colors">ISO 9001:2008</h3>
                                <p class="text-sm text-gray-500 leading-snug">Quality Management System</p>
                            </div>
                        </div>
                        
                        <!-- Certificate Details -->
                        <div class="space-y-2.5 mb-5">
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-blue-50 transition-colors">
                                <svg class="w-4 h-4 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Issued By:</strong> ISO</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-blue-50 transition-colors">
                                <svg class="w-4 h-4 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Valid:</strong> Dec 2027</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-blue-50 transition-colors">
                                <svg class="w-4 h-4 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Cert No:</strong> ISO-001234</span>
                            </div>
                        </div>

                    
                        
                    </div>

                    <!-- Decorative Corner -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-400/20 to-transparent rounded-bl-full"></div>
                </div>

                <!-- Certificate 2: ISI Mark -->
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-green-300 transform hover:-translate-y-2">
                    <!-- Certificate Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-green-50 to-green-100 aspect-[4/3]">
                        <img src="https://placehold.co/800x600/2e7d32/ffffff?text=ISI+Mark" 
                             alt="ISI Mark Certificate" 
                             class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-all duration-700"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Certificate Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <div class="bg-gradient-to-r from-green-600 to-green-800 text-white px-4 py-2 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                CERTIFIED
                            </div>
                        </div>

                        <!-- View Certificate Icon -->
                    
                        
                    </div>
                    
                    <!-- Certificate Info -->
                    <div class="p-6">
                        <!-- Title & Icon -->
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500">
                                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-green-600 transition-colors">ISI Mark</h3>
                                <p class="text-sm text-gray-500 leading-snug">Indian Standards Institute</p>
                            </div>
                        </div>
                        
                        <!-- Certificate Details -->
                        <div class="space-y-2.5 mb-5">
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-green-50 transition-colors">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Issued By:</strong> BIS India</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-green-50 transition-colors">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Valid:</strong> Mar 2028</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-green-50 transition-colors">
                                <svg class="w-4 h-4 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">License:</strong> CM/L-876543</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                     
                        
                    </div>

                    <!-- Decorative Corner -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-400/20 to-transparent rounded-bl-full"></div>
                </div>

                <!-- Certificate 3: ASTM Standards -->
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-red-300 transform hover:-translate-y-2">
                    <!-- Certificate Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-red-50 to-red-100 aspect-[4/3]">
                        <img src="https://placehold.co/800x600/c62828/ffffff?text=ASTM+Standard" 
                             alt="ASTM Standards Certificate" 
                             class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-all duration-700"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Certificate Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <div class="bg-gradient-to-r from-red-600 to-red-800 text-white px-4 py-2 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                COMPLIANT
                            </div>
                        </div>

                        <!-- View Certificate Icon -->
                        
                        
                    </div>
                    
                    <!-- Certificate Info -->
                    <div class="p-6">
                        <!-- Title & Icon -->
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-200 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500">
                                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-red-600 transition-colors">ASTM Standards</h3>
                                <p class="text-sm text-gray-500 leading-snug">American Testing Standards</p>
                            </div>
                        </div>
                        
                        <!-- Certificate Details -->
                        <div class="space-y-2.5 mb-5">
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Standards:</strong> A351, A182</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Valid:</strong> Jun 2027</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Cert No:</strong> ASTM-567890</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                      
                        
                    </div>

                    <!-- Decorative Corner -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-red-400/20 to-transparent rounded-bl-full"></div>
                </div>

                <!-- Certificate 4: IBR Approval -->
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-purple-300 transform hover:-translate-y-2">
                    <!-- Certificate Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-purple-50 to-purple-100 aspect-[4/3]">
                        <img src="https://placehold.co/800x600/6a1b9a/ffffff?text=IBR+Approval" 
                             alt="IBR Approval Certificate" 
                             class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-all duration-700"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Certificate Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <div class="bg-gradient-to-r from-purple-600 to-purple-800 text-white px-4 py-2 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                APPROVED
                            </div>
                        </div>

                       
                        
                    </div>
                    
                    <!-- Certificate Info -->
                    <div class="p-6">
                        <!-- Title & Icon -->
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500">
                                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-purple-600 transition-colors">IBR Approval</h3>
                                <p class="text-sm text-gray-500 leading-snug">Indian Boiler Regulations</p>
                            </div>
                        </div>
                        
                        <!-- Certificate Details -->
                        <div class="space-y-2.5 mb-5">
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-purple-50 transition-colors">
                                <svg class="w-4 h-4 text-purple-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Issued By:</strong> Govt of India</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-purple-50 transition-colors">
                                <svg class="w-4 h-4 text-purple-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Valid:</strong> Sep 2028</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-purple-50 transition-colors">
                                <svg class="w-4 h-4 text-purple-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Reg No:</strong> IBR-MH-12345</span>
                            </div>
                        </div>

                       
                        
                    </div>

                    <!-- Decorative Corner -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-400/20 to-transparent rounded-bl-full"></div>
                </div>

                <!-- Certificate 5: API Certification -->
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-orange-300 transform hover:-translate-y-2">
                    <!-- Certificate Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-orange-50 to-orange-100 aspect-[4/3]">
                        <img src="https://placehold.co/800x600/f57c00/ffffff?text=API+Certified" 
                             alt="API Certification" 
                             class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-all duration-700"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Certificate Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <div class="bg-gradient-to-r from-orange-600 to-orange-800 text-white px-4 py-2 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                CERTIFIED
                            </div>
                        </div>

                      
                        
                    </div>
                    
                    <!-- Certificate Info -->
                    <div class="p-6">
                        <!-- Title & Icon -->
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-100 to-orange-200 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500">
                                    <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-orange-600 transition-colors">API Certification</h3>
                                <p class="text-sm text-gray-500 leading-snug">American Petroleum Institute</p>
                            </div>
                        </div>
                        
                        <!-- Certificate Details -->
                        <div class="space-y-2.5 mb-5">
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-orange-50 transition-colors">
                                <svg class="w-4 h-4 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Standards:</strong> API 600, 609</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-orange-50 transition-colors">
                                <svg class="w-4 h-4 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Valid:</strong> Nov 2027</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-orange-50 transition-colors">
                                <svg class="w-4 h-4 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Cert No:</strong> API-654321</span>
                            </div>
                        </div>

                      
                        
                    </div>

                    <!-- Decorative Corner -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-orange-400/20 to-transparent rounded-bl-full"></div>
                </div>

                <!-- Certificate 6: NABL Accreditation -->
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-indigo-300 transform hover:-translate-y-2">
                    <!-- Certificate Image Container -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-50 to-indigo-100 aspect-[4/3]">
                        <img src="https://placehold.co/800x600/3949ab/ffffff?text=NABL+Accredited" 
                             alt="NABL Accreditation" 
                             class="w-full h-full object-cover group-hover:scale-110 group-hover:rotate-1 transition-all duration-700"
                             loading="lazy">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Certificate Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white px-4 py-2 rounded-full text-xs font-bold shadow-2xl flex items-center gap-2 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                ACCREDITED
                            </div>
                        </div>

                       
                        
                    </div>
                    
                    <!-- Certificate Info -->
                    <div class="p-6">
                        <!-- Title & Icon -->
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all duration-500">
                                    <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-indigo-600 transition-colors">NABL Accredited</h3>
                                <p class="text-sm text-gray-500 leading-snug">National Accreditation Board</p>
                            </div>
                        </div>
                        
                        <!-- Certificate Details -->
                        <div class="space-y-2.5 mb-5">
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-indigo-50 transition-colors">
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Issued By:</strong> NABL India</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-indigo-50 transition-colors">
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Valid:</strong> Aug 2028</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-600 bg-gray-50 p-2.5 rounded-lg hover:bg-indigo-50 transition-colors">
                                <svg class="w-4 h-4 text-indigo-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span><strong class="font-semibold text-gray-800">Cert No:</strong> NABL-TC-9876</span>
                            </div>
                        </div>

                     
                        
                    </div>

                    <!-- Decorative Corner -->
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-indigo-400/20 to-transparent rounded-bl-full"></div>
                </div>

            </div>
        </div>

        <!-- CTA Button -->
   
    </div>
</section>

<style>
    .lazy-load {
        opacity: 0;
        animation: fadeInUp 0.8s ease-out forwards;
    }

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
</style>

<script>
// Intersection Observer for lazy loading
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
            }
        });
    }, {
        threshold: 0.1
    });

    document.querySelectorAll('.lazy-load').forEach(el => {
        observer.observe(el);
    });
});

function openQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}
</script>


<!-- Documentation Types Grid -->
<section class="py-20 bg-gray-50 lazy-load">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-block bg-red-100 text-secondary px-4 py-1 rounded-full text-sm font-bold mb-4">
                DOCUMENTATION TYPES
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-primary mb-4">Complete Documentation Portfolio</h2>
            <p class="text-gray-600 text-lg">All documents verified and certified by authorized bodies</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <!-- Material Test Certificates -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all border-2 border-transparent hover:border-secondary lazy-load">
                <div class="w-20 h-20 bg-blue-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Material Test Certificates (MTC)</h3>
                <p class="text-gray-600 text-center mb-4">Certified material composition and mechanical properties as per EN 10204 3.1B standards</p>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Chemical composition analysis</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Mechanical properties verification</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Heat treatment records</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Traceability documentation</span>
                    </li>
                </ul>
            </div>

            <!-- Quality Assurance Documents -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all border-2 border-transparent hover:border-secondary lazy-load">
                <div class="w-20 h-20 bg-green-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Quality Assurance (QA) Reports</h3>
                <p class="text-gray-600 text-center mb-4">Comprehensive inspection and testing reports for quality verification</p>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Dimensional inspection reports</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Hydrostatic test certificates</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Pneumatic test documentation</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Visual inspection reports</span>
                    </li>
                </ul>
            </div>

            <!-- Compliance Certificates -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all border-2 border-transparent hover:border-secondary lazy-load">
                <div class="w-20 h-20 bg-purple-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Compliance Certificates</h3>
                <p class="text-gray-600 text-center mb-4">International standard compliance and safety certifications</p>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>ISO 9001:2008 certification</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>ISI mark certificates</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>IBR approval documents</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>PESO certification</span>
                    </li>
                </ul>
            </div>

            <!-- Product Specifications -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all border-2 border-transparent hover:border-secondary lazy-load">
                <div class="w-20 h-20 bg-orange-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Product Specifications</h3>
                <p class="text-gray-600 text-center mb-4">Detailed technical specifications and product datasheets</p>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Design drawings and dimensions</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Operating parameters</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Pressure-temperature ratings</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Material grade specifications</span>
                    </li>
                </ul>
            </div>

            <!-- Installation Manuals -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all border-2 border-transparent hover:border-secondary lazy-load">
                <div class="w-20 h-20 bg-red-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Installation & O&M Manuals</h3>
                <p class="text-gray-600 text-center mb-4">Complete installation guides and maintenance procedures</p>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Step-by-step installation guides</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Operation and maintenance manual</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Troubleshooting procedures</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Safety guidelines</span>
                    </li>
                </ul>
            </div>

            <!-- Calibration Certificates -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all border-2 border-transparent hover:border-secondary lazy-load">
                <div class="w-20 h-20 bg-indigo-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">Calibration Certificates</h3>
                <p class="text-gray-600 text-center mb-4">Instrument calibration and accuracy verification records</p>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Pressure gauge calibration</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Flow meter verification</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>Temperature sensor calibration</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-secondary mr-2">✓</span>
                        <span>NABL accredited certificates</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>


<section class="py-12 sm:py-16 md:py-20 bg-gradient-to-br from-primary to-primary-dark text-white relative overflow-hidden">
    <!-- Background Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>
    

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-10 sm:mb-12">
            <div class="inline-block bg-white/20 text-white px-5 py-1.5 rounded-full text-xs font-bold mb-3 shadow-lg uppercase tracking-wider">
                Quality Guarantee
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-6 px-4">
                Certified Quality, <span class="text-secondary">Guaranteed Performance</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            
            <!-- Feature 1 -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">100% Authentic</h3>
                <p class="text-blue-100 text-sm">All certificates verified by authorized bodies</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Quick Delivery</h3>
                <p class="text-blue-100 text-sm">Documents delivered within 24-48 hours</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Complete Traceability</h3>
                <p class="text-blue-100 text-sm">Full product history and documentation</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center hover:bg-white/20 transition-all duration-300 border border-white/20">
                <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Expert Support</h3>
                <p class="text-blue-100 text-sm">24/7 documentation assistance</p>
            </div>

        </div>
    </div>
</section>

<!-- Standards Compliance Section -->
<section class="py-20 bg-white lazy-load">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-block bg-blue-100 text-primary px-4 py-1 rounded-full text-sm font-bold mb-4">
                INDUSTRY STANDARDS
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-primary mb-4">Compliance with International Standards</h2>
            <p class="text-gray-600 text-lg">Our products meet globally recognized quality and safety standards</p>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- Left Column -->
                <div class="space-y-6">
                    <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl border-2 border-blue-200 lazy-load">
                        <h3 class="text-xl font-bold text-primary mb-3 flex items-center">
                            <span class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">1</span>
                            ASTM Standards
                        </h3>
                        <p class="text-gray-700 ml-11">American Society for Testing and Materials - Compliance with ASTM A351, A182, A105, and other relevant specifications for valves and fittings</p>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-white p-6 rounded-xl border-2 border-green-200 lazy-load">
                        <h3 class="text-xl font-bold text-green-700 mb-3 flex items-center">
                            <span class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">2</span>
                            ANSI/ASME Standards
                        </h3>
                        <p class="text-gray-700 ml-11">ANSI B16.34 for valve design, ASME B16.5 for flange dimensions, and ASME Section VIII for pressure vessel components</p>
                    </div>

                    <div class="bg-gradient-to-br from-purple-50 to-white p-6 rounded-xl border-2 border-purple-200 lazy-load">
                        <h3 class="text-xl font-bold text-purple-700 mb-3 flex items-center">
                            <span class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">3</span>
                            API Standards
                        </h3>
                        <p class="text-gray-700 ml-11">API 600 for gate valves, API 594 for check valves, and API 609 for butterfly valves used in petroleum and natural gas industries</p>
                    </div>

                    <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-xl border-2 border-red-200 lazy-load">
                        <h3 class="text-xl font-bold text-secondary mb-3 flex items-center">
                            <span class="w-8 h-8 bg-secondary text-white rounded-full flex items-center justify-center mr-3 text-sm">4</span>
                            IBR Standards
                        </h3>
                        <p class="text-gray-700 ml-11">Indian Boiler Regulations - IBR approved products for boiler mounting and high-pressure applications</p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div class="bg-gradient-to-br from-orange-50 to-white p-6 rounded-xl border-2 border-orange-200 lazy-load">
                        <h3 class="text-xl font-bold text-orange-700 mb-3 flex items-center">
                            <span class="w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">5</span>
                            JIS Standards
                        </h3>
                        <p class="text-gray-700 ml-11">Japanese Industrial Standards - JIS B2220 for steel valves and JIS G3454 for carbon steel pipes</p>
                    </div>

                    <div class="bg-gradient-to-br from-indigo-50 to-white p-6 rounded-xl border-2 border-indigo-200 lazy-load">
                        <h3 class="text-xl font-bold text-indigo-700 mb-3 flex items-center">
                            <span class="w-8 h-8 bg-indigo-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">6</span>
                            DIN Standards
                        </h3>
                        <p class="text-gray-700 ml-11">German Institute for Standardization - DIN 3352 for gate valves and DIN 2633 for flanges</p>
                    </div>

                    <div class="bg-gradient-to-br from-teal-50 to-white p-6 rounded-xl border-2 border-teal-200 lazy-load">
                        <h3 class="text-xl font-bold text-teal-700 mb-3 flex items-center">
                            <span class="w-8 h-8 bg-teal-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">7</span>
                            BS Standards
                        </h3>
                        <p class="text-gray-700 ml-11">British Standards - BS 5163 for gate valves and BS 1503 for steel castings</p>
                    </div>

                    <div class="bg-gradient-to-br from-pink-50 to-white p-6 rounded-xl border-2 border-pink-200 lazy-load">
                        <h3 class="text-xl font-bold text-pink-700 mb-3 flex items-center">
                            <span class="w-8 h-8 bg-pink-600 text-white rounded-full flex items-center justify-center mr-3 text-sm">8</span>
                            MSS Standards
                        </h3>
                        <p class="text-gray-700 ml-11">Manufacturers Standardization Society - MSS SP-61 for pressure testing and MSS SP-25 for marking systems</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Documentation Request Process -->
<!-- ========================================== -->
<!-- DOCUMENTATION REQUEST PROCESS SECTION -->
<!-- ========================================== -->
<section class="py-16 bg-gray-100 to-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12 sm:mb-16">
            <div class="inline-block bg-red-100 text-secondary px-4 sm:px-6 py-2 rounded-full text-xs sm:text-sm font-bold mb-4 uppercase tracking-wider shadow-lg">
                REQUEST PROCESS
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-primary mb-4 px-4">How to Request Documentation</h2>
            <div class="w-20 h-1 bg-secondary mx-auto mb-4 rounded-full"></div>
            <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto px-4">Simple 4-step process to get your product documentation</p>
        </div>

        <!-- Process Steps -->
        <div class="max-w-7xl mx-auto">
            <!-- Desktop View - Horizontal -->
            <div class="hidden md:grid md:grid-cols-4 gap-8 lg:gap-12 relative">
                
                <!-- Step 1: Contact Us -->
                <div class="step-item text-center relative" style="animation-delay: 0.1s;">
                    <!-- Connector Line -->
                    <div class="absolute top-20 left-1/2 right-[-50%] h-1 bg-gradient-to-r from-blue-400 to-green-400 hidden lg:block" style="transform: translateY(-50%);"></div>
                    
                    <!-- Icon Circle -->
                    <div class="relative inline-block mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center mx-auto shadow-2xl transform hover:scale-110 transition-all duration-300 hover:shadow-blue-500/50">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <!-- Step Number Badge -->
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-white border-4 border-blue-600 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-blue-600 font-bold text-lg">1</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Contact Us</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Submit your documentation request via email or phone</p>
                    
                    <!-- Contact Methods -->
                    <div class="mt-4 flex flex-col gap-2">
                        <div class="flex items-center justify-center text-xs text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Email
                        </div>
                        <div class="flex items-center justify-center text-xs text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Phone
                        </div>
                    </div>
                </div>

                <!-- Step 2: Specify Requirements -->
                <div class="step-item text-center relative" style="animation-delay: 0.2s;">
                    <!-- Connector Line -->
                    <div class="absolute top-20 left-1/2 right-[-50%] h-1 bg-gradient-to-r from-green-400 to-orange-400 hidden lg:block" style="transform: translateY(-50%);"></div>
                    
                    <!-- Icon Circle -->
                    <div class="relative inline-block mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mx-auto shadow-2xl transform hover:scale-110 transition-all duration-300 hover:shadow-green-500/50">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <!-- Step Number Badge -->
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-white border-4 border-green-600 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-green-600 font-bold text-lg">2</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Specify Requirements</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Provide product details and required document types</p>
                    
                    <!-- Document Types -->
                    <div class="mt-4 flex flex-wrap justify-center gap-2">
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">MTC</span>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">QA</span>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Specs</span>
                    </div>
                </div>

                <!-- Step 3: Verification -->
                <div class="step-item text-center relative" style="animation-delay: 0.3s;">
                    <!-- Connector Line -->
                    <div class="absolute top-20 left-1/2 right-[-50%] h-1 bg-gradient-to-r from-orange-400 to-red-400 hidden lg:block" style="transform: translateY(-50%);"></div>
                    
                    <!-- Icon Circle -->
                    <div class="relative inline-block mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-orange-600 to-orange-800 rounded-full flex items-center justify-center mx-auto shadow-2xl transform hover:scale-110 transition-all duration-300 hover:shadow-orange-500/50">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <!-- Step Number Badge -->
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-white border-4 border-orange-600 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-orange-600 font-bold text-lg">3</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Verification</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">We verify and prepare the requested documentation</p>
                    
                    <!-- Process Time -->
                    <div class="mt-4 flex items-center justify-center text-xs text-orange-600">
                        <svg class="w-4 h-4 mr-1 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Processing...
                    </div>
                </div>

                <!-- Step 4: Delivery -->
                <div class="step-item text-center relative" style="animation-delay: 0.4s;">
                    <!-- Icon Circle -->
                    <div class="relative inline-block mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center mx-auto shadow-2xl transform hover:scale-110 transition-all duration-300 hover:shadow-red-500/50">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <!-- Step Number Badge -->
                        <div class="absolute -top-2 -right-2 w-10 h-10 bg-white border-4 border-red-600 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-red-600 font-bold text-lg">4</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Delivery</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Receive certified documents within 24-48 hours</p>
                    
                    <!-- Delivery Time -->
                    <div class="mt-4 flex items-center justify-center text-xs text-red-600">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        24-48 hours
                    </div>
                </div>

            </div>

            <!-- Mobile/Tablet View - Vertical -->
            <div class="md:hidden space-y-8">
                
                <!-- Step 1 -->
                <div class="step-item flex items-start gap-4 bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all" style="animation-delay: 0.1s;">
                    <div class="relative flex-shrink-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-lg font-bold">
                            1
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Contact Us</h3>
                        <p class="text-gray-600 text-sm mb-3">Submit your documentation request via email or phone</p>
                        <div class="flex gap-3">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded-full flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Email
                            </span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded-full flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Phone
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Vertical Connector -->
                <div class="flex justify-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-blue-300 to-green-300 rounded-full"></div>
                </div>

                <!-- Step 2 -->
                <div class="step-item flex items-start gap-4 bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all" style="animation-delay: 0.2s;">
                    <div class="relative flex-shrink-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center shadow-lg font-bold">
                            2
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Specify Requirements</h3>
                        <p class="text-gray-600 text-sm mb-3">Provide product details and required document types</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full">MTC</span>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full">QA Reports</span>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs rounded-full">Specifications</span>
                        </div>
                    </div>
                </div>

                <!-- Vertical Connector -->
                <div class="flex justify-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-green-300 to-orange-300 rounded-full"></div>
                </div>

                <!-- Step 3 -->
                <div class="step-item flex items-start gap-4 bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all" style="animation-delay: 0.3s;">
                    <div class="relative flex-shrink-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-600 to-orange-800 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center shadow-lg font-bold">
                            3
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Verification</h3>
                        <p class="text-gray-600 text-sm mb-3">We verify and prepare the requested documentation</p>
                        <div class="flex items-center gap-2 text-xs text-orange-700 bg-orange-50 px-3 py-2 rounded-lg">
                            <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Quality checking in progress
                        </div>
                    </div>
                </div>

                <!-- Vertical Connector -->
                <div class="flex justify-center">
                    <div class="w-1 h-8 bg-gradient-to-b from-orange-300 to-red-300 rounded-full"></div>
                </div>

                <!-- Step 4 -->
                <div class="step-item flex items-start gap-4 bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all" style="animation-delay: 0.4s;">
                    <div class="relative flex-shrink-0">
                        <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-red-800 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center shadow-lg font-bold">
                            4
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Delivery</h3>
                        <p class="text-gray-600 text-sm mb-3">Receive certified documents within 24-48 hours</p>
                        <div class="flex items-center gap-2 text-xs text-red-700 bg-red-50 px-3 py-2 rounded-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Fast delivery guaranteed
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Call to Action -->
   
    </div>
</section>

<style>
    .step-item {
        opacity: 0;
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
// Intersection Observer for animations
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
            }
        });
    }, {
        threshold: 0.1
    });

    document.querySelectorAll('.step-item').forEach(item => {
        observer.observe(item);
    });
});

function openQuoteModal() {
    // Your existing modal function
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}
</script>



<!-- CTA Section -->
<section class="bg-gradient-to-r from-primary via-blue-900 to-blue-800 text-white py-16 lazy-load">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Need Specific Documentation?</h2>
        <p class="text-xl mb-8 text-blue-100">Contact our documentation team for customized certificate requirements</p>
        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="openQuoteModal()" class="bg-gradient-to-r from-secondary to-red-700 text-white px-8 py-3 rounded-lg font-bold hover:from-red-700 hover:to-secondary transition-all transform hover:scale-105 shadow-lg">
                Request Documents
            </button>
            <a href="contact.php" class="bg-white hover:bg-gray-100 text-primary font-bold px-8 py-3 rounded-lg transition transform hover:scale-105 shadow-xl">
                Contact Us
            </a>
        </div>
    </div>
</section>

<?php include 'assets/include/footer.php'; ?>

<script>
// ==========================================
// IMAGE LAZY LOADING - PRIORITY LOAD
// ==========================================

// Load banner image immediately on page load
window.addEventListener('DOMContentLoaded', function() {
    const bannerImg = document.getElementById('bannerImage');
    const bannerSkeleton = document.getElementById('bannerSkeleton');
    
    if (bannerImg && bannerImg.dataset.src) {
        // Load banner image immediately
        bannerImg.src = bannerImg.dataset.src;
        bannerImg.style.display = 'block';
        
        bannerImg.onload = function() {
            bannerImg.classList.add('loaded');
            if (bannerSkeleton) {
                bannerSkeleton.style.display = 'none';
            }
        };
        
        // Handle image load error
        bannerImg.onerror = function() {
            console.error('Banner image failed to load:', bannerImg.dataset.src);
            if (bannerSkeleton) {
                bannerSkeleton.innerHTML = '<div style="display:flex;align-items:center;justify-center;height:100%;color:#666;">Image not found</div>';
            }
        };
    }
});

// ==========================================
// LAZY LOADING FOR OTHER SECTIONS
// ==========================================

const observerOptions = {
    root: null,
    rootMargin: '50px',
    threshold: 0.1
};

// Create observer for sections
const sectionObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('loaded');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all lazy-load sections
document.addEventListener('DOMContentLoaded', function() {
    const lazyElements = document.querySelectorAll('.lazy-load');
    lazyElements.forEach(el => {
        sectionObserver.observe(el);
    });
});

// ==========================================
// MODAL & FORM FUNCTIONS
// ==========================================

function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}

function openQuoteModal() {
    openQuoteForm();
}

function closeQuoteModal() {
    closeQuoteForm();
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
    const modal = document.getElementById('quoteModal');
    const content = document.getElementById('quoteModalContent');
    if (content) {
        content.style.transform = 'scale(0.95)';
        setTimeout(function() {
            if (modal) {
                modal.classList.add('hidden');
            }
        }, 300);
        document.body.style.overflow = '';
    }
}

function handleFormSubmit(event) {
    event.preventDefault();
    alert('Thank you! Your documentation request has been submitted. We will contact you within 24 hours.');
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
        modal.addEventListener('click', function(e) {
            if (e.target.id === 'quoteModal') {
                closeQuoteForm();
            }
        });
    }
});

// Close on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modal = document.getElementById('quoteModal');
        if (modal && !modal.classList.contains('hidden')) {
            closeQuoteForm();
        }
    }
});

// Console log for debugging
console.log('✓ Documentation page loaded');
console.log('✓ Lazy loading initialized');
</script>
</body>
</html>
