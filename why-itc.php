<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Why Choose Indian Traders Corp - Leading Industrial Valve Supplier</title>
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
        .lazy-load {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .lazy-load.loaded {
            opacity: 1;
            transform: translateY(0);
        }

        img[data-src] {
            opacity: 0;
            transition: opacity 0.3s;
        }

        img.loaded {
            opacity: 1;
        }

        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-white">
<?php include 'assets/include/header.php'; ?>

<!-- Include Modal -->
<?php include 'assets/include/modal.php'; ?>

<!-- Hero Section with Modern Banner -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary via-blue-900 to-blue-800" style="min-height: 500px;">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 py-20 md:py-32 relative z-10">
        <div class="max-w-5xl mx-auto text-center text-white">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 px-6 py-2 rounded-full text-sm font-semibold mb-8">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                55+ YEARS OF EXCELLENCE
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-tight">
                Why Industries Choose
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400">Indian Traders Corp</span>
            </h1>

            <!-- Description -->
            <p class="text-xl md:text-2xl text-blue-100 mb-10 leading-relaxed max-w-3xl mx-auto">
                Central India's most trusted name in industrial valves, pipes, and fittings since 1969
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap justify-center gap-4">
                <button onclick="openQuoteModal()" class="group bg-gradient-to-r from-secondary to-red-700 hover:from-red-700 hover:to-secondary text-white px-8 py-4 rounded-xl font-bold transition-all transform hover:scale-105 shadow-2xl flex items-center gap-2">
                    <span>Get Instant Quote</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
                <a href="contact.php" class="bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white border-2 border-white/30 px-8 py-4 rounded-xl font-bold transition-all transform hover:scale-105 shadow-2xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span>Call Us Now</span>
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">1000+</div>
                    <div class="text-sm text-blue-200">Happy Clients</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">500+</div>
                    <div class="text-sm text-blue-200">Products</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">55+</div>
                    <div class="text-sm text-blue-200">Years</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">100%</div>
                    <div class="text-sm text-blue-200">Genuine</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wave Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>

<!-- Core Values Section -->
<section class="py-20 md:py-28 bg-white lazy-load">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="inline-block text-primary font-bold text-sm uppercase tracking-widest mb-4 bg-blue-50 px-4 py-2 rounded-full">OUR CORE STRENGTHS</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">What Sets Us Apart</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover the key factors that make us the preferred choice for industrial solutions</p>
            </div>

            <!-- Values Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Value 1 -->
                <div class="group relative bg-gradient-to-br from-white to-blue-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-transparent hover:border-blue-300 transform hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-200 rounded-full opacity-10 blur-2xl group-hover:opacity-20 transition-opacity"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">Certified Quality</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Every product backed by ISO 9001:2008, ISI, and IBR certifications with complete documentation and manufacturer test certificates.
                        </p>
                        
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">ISO Certified</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">ISI Marked</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">IBR Approved</span>
                        </div>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="group relative bg-gradient-to-br from-white to-green-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-transparent hover:border-green-300 transform hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-200 rounded-full opacity-10 blur-2xl group-hover:opacity-20 transition-opacity"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-green-600 transition-colors">Best Pricing</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Direct relationships with manufacturers enable us to offer the most competitive rates in Central India without compromising quality.
                        </p>
                        
                        <div class="flex items-center gap-2 text-green-700 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Up to 20% savings</span>
                        </div>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="group relative bg-gradient-to-br from-white to-purple-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-transparent hover:border-purple-300 transform hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-200 rounded-full opacity-10 blur-2xl group-hover:opacity-20 transition-opacity"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-purple-600 transition-colors">Vast Inventory</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Over 500+ products readily available for immediate dispatch. From valves to fittings, we stock everything you need.
                        </p>
                        
                        <div class="flex items-center gap-2 text-purple-700 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Same-day dispatch available</span>
                        </div>
                    </div>
                </div>

                <!-- Value 4 -->
                <div class="group relative bg-gradient-to-br from-white to-orange-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-transparent hover:border-orange-300 transform hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-200 rounded-full opacity-10 blur-2xl group-hover:opacity-20 transition-opacity"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-orange-600 transition-colors">Fast Delivery</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Strategic location in Nagpur ensures quick delivery across Maharashtra, MP, Chhattisgarh, and surrounding regions.
                        </p>
                        
                        <div class="flex items-center gap-2 text-orange-700 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>24-48 hours delivery</span>
                        </div>
                    </div>
                </div>

                <!-- Value 5 -->
                <div class="group relative bg-gradient-to-br from-white to-red-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-transparent hover:border-red-300 transform hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-200 rounded-full opacity-10 blur-2xl group-hover:opacity-20 transition-opacity"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-red-600 transition-colors">Expert Guidance</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Our technical team provides professional consultation to help you select the right products for your specific requirements.
                        </p>
                        
                        <div class="flex items-center gap-2 text-red-700 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Free technical support</span>
                        </div>
                    </div>
                </div>

                <!-- Value 6 -->
                <div class="group relative bg-gradient-to-br from-white to-yellow-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 border-2 border-transparent hover:border-yellow-300 transform hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-200 rounded-full opacity-10 blur-2xl group-hover:opacity-20 transition-opacity"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-yellow-600 transition-colors">Legacy of Trust</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Since 1969, three generations have built a reputation of reliability, integrity, and excellence in industrial supplies.
                        </p>
                        
                        <div class="flex items-center gap-2 text-yellow-700 font-semibold">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>55+ years of excellence</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Product Range Showcase -->
<section class="py-20 md:py-28 bg-gradient-to-br from-gray-50 to-blue-50 lazy-load">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="inline-block text-primary font-bold text-sm uppercase tracking-widest mb-4 bg-white px-4 py-2 rounded-full shadow">COMPREHENSIVE RANGE</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Complete Industrial Solutions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">One-stop destination for all your industrial valve and piping needs</p>
            </div>

            <!-- Product Categories Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Gate Valves</h3>
                </div>

                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-green-600 transition-colors">Globe Valves</h3>
                </div>

                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-purple-600 transition-colors">Ball Valves</h3>
                </div>

                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-orange-600 transition-colors">Butterfly Valves</h3>
                </div>

                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-red-600 transition-colors">Check Valves</h3>
                </div>

                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Pipes & Tubes</h3>
                </div>

                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-pink-600 transition-colors">Pipe Fittings</h3>
                </div>

                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1 cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-center font-bold text-gray-900 group-hover:text-teal-600 transition-colors">Flanges</h3>
                </div>

            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="products.php" class="inline-flex items-center gap-2 bg-gradient-to-r from-primary to-blue-700 hover:from-blue-700 hover:to-primary text-white px-8 py-4 rounded-xl font-bold transition-all transform hover:scale-105 shadow-xl">
                    <span>View All Products</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Industries We Serve -->
<section class="py-20 md:py-28 bg-white lazy-load">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="inline-block text-secondary font-bold text-sm uppercase tracking-widest mb-4 bg-red-50 px-4 py-2 rounded-full">DIVERSE SECTORS</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Industries We Serve</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Trusted by leading companies across multiple industrial sectors</p>
            </div>

            <!-- Industries Grid with Icons -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                
                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-primary group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-primary group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-primary transition-colors">Power Generation</h3>
                </div>

                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-green-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-green-600 transition-colors">Cement Industry</h3>
                </div>

                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-600 group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-orange-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-orange-600 transition-colors">Oil & Gas</h3>
                </div>

                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-600 group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-blue-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Chemical Plants</h3>
                </div>

                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-600 group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-purple-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-purple-600 transition-colors">Pharmaceutical</h3>
                </div>

                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-indigo-600 group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-indigo-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">Steel & Metal</h3>
                </div>

                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-teal-600 group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-teal-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-teal-600 transition-colors">Sugar Industry</h3>
                </div>

                <div class="group bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 hover:border-primary rounded-2xl p-6 text-center transition-all hover:shadow-lg transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-cyan-600 group-hover:scale-110 transition-all">
                        <svg class="w-8 h-8 text-cyan-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 group-hover:text-cyan-600 transition-colors">Water Treatment</h3>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-20 md:py-28 bg-gradient-to-br from-primary via-blue-900 to-blue-800 text-white lazy-load relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Quote Icon -->
            <div class="text-center mb-10">
                <svg class="w-20 h-20 mx-auto text-yellow-400 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                </svg>
            </div>

            <!-- Testimonial Content -->
            <blockquote class="text-center">
                <p class="text-2xl md:text-3xl font-medium leading-relaxed mb-8 text-blue-50">
                    "Our success story spanning over five decades is built on unwavering commitment to quality, competitive pricing, and customer satisfaction. We don't just supply products – we build lasting partnerships based on trust and reliability."
                </p>
                
                <footer class="border-t border-white/20 pt-8">
                    <div class="flex items-center justify-center gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-400 rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-primary">BG</span>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-lg text-white">Bharatchandra Gupta</p>
                            <p class="text-blue-200">Partner, Indian Traders Corp</p>
                        </div>
                    </div>
                </footer>
            </blockquote>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 md:py-28 bg-gradient-to-br from-white to-gray-50 lazy-load">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-gradient-to-br from-primary to-blue-800 rounded-3xl overflow-hidden shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center p-10 md:p-16">
                <!-- Left Content -->
                <div class="text-white">
                    <span class="inline-block bg-white/20 px-4 py-2 rounded-full text-sm font-bold mb-6">GET STARTED TODAY</span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Experience the Difference?</h2>
                    <p class="text-xl text-blue-100 mb-6">Join 1000+ satisfied customers who trust us for their industrial needs</p>
                    
                    <!-- Benefits List -->
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-lg">Free technical consultation</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-lg">Instant quote within 24 hours</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-lg">Best prices guaranteed</span>
                        </li>
                    </ul>

                    <!-- Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <button onclick="openQuoteModal()" class="bg-gradient-to-r from-secondary to-red-700 hover:from-red-700 hover:to-secondary text-white px-8 py-4 rounded-xl font-bold shadow-xl transition-all transform hover:scale-105 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Get Your Quote</span>
                        </button>

                        <a href="contact.php" class="bg-white hover:bg-gray-100 text-primary px-8 py-4 rounded-xl font-bold shadow-xl transition-all transform hover:scale-105 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>Call Us Now</span>
                        </a>
                    </div>
                </div>

                <!-- Right Image/Graphic -->
                <div class="hidden lg:block">
                    <div class="relative">
                        <!-- Floating Elements -->
                        <div class="absolute -top-6 -right-6 w-32 h-32 bg-yellow-400 rounded-full opacity-20 blur-2xl"></div>
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-400 rounded-full opacity-20 blur-2xl"></div>
                        
                        <!-- Main Content -->
                        <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20">
                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-bold">55+ Years Experience</p>
                                        <p class="text-blue-200 text-sm">Since 1969</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-bold">1000+ Happy Clients</p>
                                        <p class="text-blue-200 text-sm">Across India</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-white font-bold">ISO Certified</p>
                                        <p class="text-blue-200 text-sm">Quality Guaranteed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'assets/include/footer.php'; ?>

<script>
// Lazy Loading
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
    }
});

const observerOptions = {
    root: null,
    rootMargin: '50px',
    threshold: 0.1
};

const sectionObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('loaded');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', function() {
    const lazyElements = document.querySelectorAll('.lazy-load');
    lazyElements.forEach(el => {
        sectionObserver.observe(el);
    });
});

// Modal Functions
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    if (menu) {
        menu.classList.toggle('hidden');
    }
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
    alert('Thank you! Your request has been submitted. We will contact you within 24 hours.');
    closeQuoteForm();
    const form = document.getElementById('quote-form');
    if (form) {
        form.reset();
    }
    return false;
}

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

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modal = document.getElementById('quoteModal');
        if (modal && !modal.classList.contains('hidden')) {
            closeQuoteForm();
        }
    }
});

console.log('✓ Why Choose page loaded with modern design');
console.log('✓ Lazy loading initialized');
</script>
</body>
</html>
