<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industries We Serve - Indian Traders Corp</title>
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
        /* Lazy loading animation */
        .lazy-load {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .lazy-load.loaded {
            opacity: 1;
            transform: translateY(0);
        }

        /* Image lazy loading styles */
        img[data-src] {
            opacity: 0;
            transition: opacity 0.3s;
        }

        img.loaded {
            opacity: 1;
        }

        /* Skeleton loader for images */
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
    </style>
</head>
<body class="bg-gray-50">
<?php include 'assets/include/header.php'; ?>

<!-- Include Modal -->
<?php include 'assets/include/modal.php'; ?>

<!-- Page Banner with Lazy Loading - WITH SKELETON -->
<section class="page-banner" style="width: 100%; position: relative; overflow: hidden; margin: 0; padding: 0; background: #e5e7eb;">
    <div style="position: relative; width: 100%; height: 100%;">
        <!-- Skeleton Loader -->
        <div class="skeleton banner-image" id="bannerSkeleton" style="width: 100%; height: 100%; display: block;"></div>
        <!-- Actual Image -->
        <img data-src="assets/images/crousel2.jpg" 
             alt="Industries We Serve - Indian Traders Corp" 
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

<!-- Industries Overview Section -->
<section class="py-16 bg-white lazy-load">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block bg-blue-100 text-primary px-4 py-2 rounded-full text-sm font-bold mb-6">
                OUR EXPERTISE
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6">Industries We Serve</h1>
            <p class="text-gray-600 text-lg leading-relaxed">
                Indian Traders Corp has been serving diverse industries across Central India since 1969. We provide comprehensive solutions in valves, pipes, fittings, and accessories for water, steam, oil, gas, chemical, and other industrial applications with complete documentation and quality certifications.
            </p>
        </div>
    </div>
</section>

<!-- Industries Grid Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white lazy-load">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            
            <div class="text-center mb-16">
                <div class="inline-block bg-red-100 text-secondary px-4 py-2 rounded-full text-sm font-bold mb-4">
                    KEY SECTORS
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-primary mb-4">Major Industries We Cater To</h2>
                <p class="text-gray-600 text-lg">Comprehensive solutions for diverse industrial applications</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Power Generation -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Power Generation</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Thermal, hydro, and renewable energy plants require robust valves and piping systems for steam, water, and cooling applications.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>High-pressure steam valves (IBR approved)</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Boiler mounting valves and fittings</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Safety and pressure relief valves</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Cement Plants -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Cement Industry</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Cement manufacturing requires abrasion-resistant valves for handling cement powder, slurry, and high-temperature kiln operations.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Pinch valves for abrasive materials</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Butterfly and ball valves for air flow control</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Diverter valves for cement silos</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Oil & Gas -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Oil & Gas</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Petroleum refineries and gas processing plants need API-compliant valves for safe and efficient operations.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>API 600 gate valves</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>API 594 check valves</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Ball and plug valves for on/off control</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Water Treatment -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Water Treatment</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Municipal water supply, sewage treatment, and effluent plants require corrosion-resistant valves and piping.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Gate and butterfly valves for water distribution</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Non-return valves to prevent backflow</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Air release and air vent valves</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Chemical & Pharma -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Chemical & Pharma</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Chemical processing and pharmaceutical manufacturing demand corrosion-resistant, hygienic valves for handling acids and alkalis.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>SS (Stainless Steel) valves and fittings</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Diaphragm valves for corrosive chemicals</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Ball valves with PTFE/FEP lining</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Steel & Metal -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Steel & Metal</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Steel plants, foundries, and metal processing units require heavy-duty valves for molten metal and cooling water.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>High-temperature gate and globe valves</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Knife gate valves for slurry handling</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Safety valves for furnace applications</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Sugar & Food -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Sugar & Food</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Sugar mills and food processing industries need food-grade, hygienic valves for steam, juice, and process water.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Sanitary ball and butterfly valves</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Steam valves for evaporators</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Diaphragm valves for juice handling</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Paper & Pulp -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Paper & Pulp</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Paper manufacturing requires valves resistant to fibrous materials, chemicals, and high-temperature steam.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Knife gate valves for pulp slurry</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Ball valves for chemical dosing</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Control valves for steam and water</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Textile -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Textile Industry</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Textile mills require steam, water, and dye handling valves for dyeing, washing, and finishing processes.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Steam control valves for dyeing machines</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Ball and butterfly valves for water lines</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Pneumatic and hydraulic valves</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Mining -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Mining & Minerals</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Mining operations need heavy-duty valves for slurry, tailings, and dewatering applications in harsh environments.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Slurry knife gate valves</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Pinch valves for abrasive materials</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Heavy-duty ball and plug valves</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- HVAC -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">HVAC & Fire Fighting</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Commercial buildings, hospitals, and industrial facilities need reliable HVAC and fire protection systems.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Butterfly valves for HVAC systems</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Fire fighting valves and equipments</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Sprinkler system components</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Fertilizer -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-gray-100 lazy-load">
                    <div class="bg-gradient-to-r from-primary to-blue-900 p-6">
                        <div class="flex items-center">
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white ml-4">Fertilizer & Agro</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-4 leading-relaxed">
                            Fertilizer plants and agricultural processing units require chemical-resistant valves for ammonia and acids.
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Corrosion-resistant gate valves</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>Diaphragm valves for chemical handling</span>
                            </li>
                            <li class="flex items-start text-sm text-gray-600">
                                <span class="text-secondary mr-2 mt-1">✓</span>
                                <span>HDPE pipes for irrigation systems</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- WHY INDUSTRIES TRUST US SECTION -->
<!-- ========================================== -->
<!-- ========================================== -->
<!-- WHY INDUSTRIES TRUST US - PREMIUM MINIMAL -->
<!-- ========================================== -->
<section class="py-16 sm:py-20 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            
            <!-- Section Header -->
            <div class="text-center mb-16 max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-blue-50 text-primary px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    OUR STRENGTHS
                </div>
                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">
                    Why Industries Trust Us
                </h2>
                <p class="text-lg text-gray-600">
                    Delivering excellence across all sectors since 1969
                </p>
            </div>

            <!-- Strengths Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">ISO Certified</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">ISO 9001:2008 & ISI certified quality products</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">55+ Years</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Established in 1969 with proven track record</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Expert Team</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Experienced professionals to guide you</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Quality Products</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">ASTM, IBR, JIS grade materials</p>
                </div>

            </div>

        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="bg-gradient-to-r from-primary to-blue-900 text-white py-16 lazy-load">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Find Solutions for Your Industry</h2>
        <p class="text-xl mb-8 text-blue-100">Our experts can help you select the right products for your specific application</p>
        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="openQuoteModal()" class="bg-secondary hover:bg-red-700 text-white px-8 py-4 rounded-lg font-bold transition-all transform hover:scale-105 shadow-lg">
                Request Quote
            </button>
            <a href="contact.php" class="bg-white hover:bg-gray-100 text-primary font-bold px-8 py-4 rounded-lg transition-all transform hover:scale-105 shadow-lg">
                Contact Our Team
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
                bannerSkeleton.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#666;">Image not found</div>';
            }
        };
    }
});

// ==========================================
// LAZY LOADING FOR SECTIONS
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
console.log('✓ Industries page loaded');
console.log('✓ Lazy loading initialized');
</script>
</body>
</html>
