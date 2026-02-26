<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Indian Traders Corp | Industrial Valves & Pipe Fittings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0a2463',         
                        secondary: '#b71c1c',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
<?php include 'assets/include/header.php'; ?>

<!-- Include Modal -->
<?php include 'assets/include/modal.php'; ?>

<!-- Hero Banner Section -->
<section class="relative bg-gradient-to-br from-primary via-[#0d2d7a] to-primary overflow-hidden" style="min-height: 400px;">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    </div>

    <div class="container mx-auto px-4 py-20 md:py-32 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 px-6 py-2 rounded-full text-sm font-semibold mb-6">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                </svg>
                OUR PRODUCT RANGE
            </div>

            <!-- Main Heading -->
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                Premium Industrial
                <span class="block text-yellow-400">Products & Solutions</span>
            </h1>

            <!-- Description -->
            <p class="text-xl text-blue-100 mb-8 leading-relaxed max-w-3xl mx-auto">
                High-quality valves, pipes, and fittings for all your industrial needs
            </p>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-6 max-w-2xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="text-3xl font-bold text-yellow-400 mb-1">500+</div>
                    <div class="text-sm text-white/90">Products</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="text-3xl font-bold text-yellow-400 mb-1">100%</div>
                    <div class="text-sm text-white/90">Quality</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="text-3xl font-bold text-yellow-400 mb-1">ISO</div>
                    <div class="text-sm text-white/90">Certified</div>
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

<!-- Valves Section -->
<section id="valves" class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="inline-block bg-gradient-to-r from-primary/10 to-primary/5 text-primary px-5 py-2 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider mb-4 border border-primary/20">
                VALVES COLLECTION
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Industrial Valves</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">High-quality valves for diverse industrial applications</p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="valvesGrid">
            <!-- Skeleton Loaders -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden animate-pulse">
                <div class="bg-gray-200 h-64"></div>
                <div class="p-6 space-y-4">
                    <div class="h-6 bg-gray-200 rounded w-3/4"></div>
                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                    <div class="flex gap-3">
                        <div class="h-10 bg-gray-200 rounded flex-1"></div>
                        <div class="h-10 bg-gray-200 rounded flex-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pipes & Fittings Section -->
<section id="pipes" class="py-16 md:py-20 bg-gradient-to-br from-gray-50 to-blue-50/30">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="inline-block bg-gradient-to-r from-secondary/10 to-secondary/5 text-secondary px-5 py-2 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider mb-4 border border-secondary/20">
                PIPES & FITTINGS
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Pipes & Fittings</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Complete range of industrial pipes and fittings</p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="pipesGrid">
            <!-- Products will be loaded here -->
        </div>
    </div>
</section>

<!-- Accessories Section -->
<section id="accessories" class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="inline-block bg-gradient-to-r from-primary/10 to-primary/5 text-primary px-5 py-2 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider mb-4 border border-primary/20">
                ACCESSORIES
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Industrial Accessories</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Essential accessories for complete industrial solutions</p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="accessoriesGrid">
            <!-- Products will be loaded here -->
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-20 md:py-28 bg-gradient-to-br from-primary via-[#0d2d7a] to-primary text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Need a Custom Quote?</h2>
        <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
            Our expert team is ready to help you find the perfect solution for your industrial needs
        </p>
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mb-12">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="text-4xl font-bold text-yellow-400 mb-2">55+</div>
                <div class="text-sm text-white/90">Years Trust</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="text-4xl font-bold text-yellow-400 mb-2">1000+</div>
                <div class="text-sm text-white/90">Clients</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="text-4xl font-bold text-yellow-400 mb-2">500+</div>
                <div class="text-sm text-white/90">Products</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="text-4xl font-bold text-yellow-400 mb-2">24/7</div>
                <div class="text-sm text-white/90">Support</div>
            </div>
        </div>

        <!-- CTA Buttons -->
        <div class="flex flex-wrap justify-center gap-4">
            <a href="tel:+917122345678" class="group bg-white hover:bg-gray-100 text-primary font-bold px-10 py-4 rounded-xl transition-all transform hover:scale-105 shadow-2xl flex items-center gap-2">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
                <span>Call Now</span>
            </a>
            <button onclick="openQuoteModal()" class="group bg-secondary hover:bg-red-800 text-white font-bold px-10 py-4 rounded-xl transition-all transform hover:scale-105 shadow-2xl flex items-center gap-2">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
                <span>Request Quote</span>
            </button>
        </div>
    </div>
</section>

<?php include 'assets/include/footer.php'; ?>

<script>
// Product Data
const productsData = {
    valves: [
        { name: 'Gate Valve', category: 'Cast Iron, Carbon Steel', image: 'Gate-Valve-1.png', badge: 'Popular', badgeColor: 'primary' },
        { name: 'Globe Valve', category: 'ASTM, IBR Grade', image: 'Globe-Valve-1.png', badge: 'ISO', badgeColor: 'secondary' },
        { name: 'Ball Valve', category: '2-Way, 3-Way Available', image: 'Ball-Valve.png', badge: 'Featured', badgeColor: 'primary' },
        { name: 'Butterfly Valve', category: 'Wafer, Lug, Flanged Type', image: 'Butterfly-Valve.png', badge: 'Premium', badgeColor: 'secondary' },
        { name: 'Non Return Valve', category: 'Check Valve, Swing Type', image: 'Non-return-Valve-1.png', badge: 'Quality', badgeColor: 'primary' },
        { name: 'Safety Valve', category: 'Pressure Relief, IBR Approved', image: 'Safety-Valves.png', badge: 'IBR', badgeColor: 'secondary' },
        { name: 'Plug Valve', category: 'Lubricated, Non-Lubricated', image: 'Plug-Valve.png', badge: '', badgeColor: '' },
        { name: 'Diaphragm Valve', category: 'Weir Type, Straight Through', image: 'Diaphagram-valves.jpg', badge: '', badgeColor: '' },
        { name: 'Pressure Reducing Valve', category: 'Direct Acting, Pilot Type', image: 'PRV.png', badge: '', badgeColor: '' },
        { name: 'Air Valves', category: 'Single, Double, Triple Orifice', image: 'Air-alves.png', badge: '', badgeColor: '' }
    ],
    pipes: [
        { name: 'MS Pipes & Fittings', category: 'Mild Steel, ERW, Seamless', image: 'MS-pipes-Fittings.png', badge: 'Industrial', badgeColor: 'primary' },
        { name: 'SS Pipes & Fittings', category: 'SS304, SS316, SS321', image: 'SS-Pipes-Fittings.png', badge: 'Premium', badgeColor: 'secondary' },
        { name: 'GI Pipes & Fittings', category: 'Galvanized Iron, ISI Certified', image: 'GI-pipes-Fittings.png', badge: 'ISI Mark', badgeColor: 'primary' },
        { name: 'HDPE Pipes', category: 'PE80, PE100, ISI Certified', image: 'HDPE-pipes-and-fittings.png', badge: '', badgeColor: '' },
        { name: 'Flanges', category: 'Slip-On, Weld Neck, Blind', image: 'Flanges.png', badge: '', badgeColor: '' },
        { name: 'Brass Fittings', category: 'Elbow, Tee, Union, Nipple', image: 'Bras-Pipe-Fittings.png', badge: '', badgeColor: '' },
        { name: 'Hydraulic Fittings', category: 'Hose, Adapters, Couplings', image: 'Hydraulic-Pipes-Fittings.png', badge: '', badgeColor: '' },
        { name: 'Dairy Fittings', category: 'Food Grade, Stainless Steel', image: 'Dairy-Valves-Fittings.png', badge: 'Hygienic', badgeColor: 'secondary' }
    ],
    accessories: [
        { name: 'Strainers', category: 'Y-Type, Basket, Duplex', image: 'Strainers.png', badge: '', badgeColor: '' },
        { name: 'Pressure Gauges', category: 'Analog, Digital, Diaphragm', image: 'Temprature-Pressure-Gaugaes.png', badge: '', badgeColor: '' },
        { name: 'Boiler Mounting', category: 'IBR Approved Components', image: 'Boiler-Mounting.png', badge: 'IBR', badgeColor: 'secondary' },
        { name: 'Fire Fighting Accessories', category: 'Hydrant, Hose, Nozzles', image: 'Fire-Fighting-Accsesories.png', badge: '', badgeColor: '' }
    ]
};

// Get badge classes based on color
function getBadgeClass(color) {
    if (color === 'primary') {
        return 'bg-primary text-white';
    } else if (color === 'secondary') {
        return 'bg-secondary text-white';
    }
    return '';
}

// Create Skeleton Loader
function createSkeleton() {
    return `
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden animate-pulse">
            <div class="bg-gray-200 h-64"></div>
            <div class="p-6 space-y-4">
                <div class="h-6 bg-gray-200 rounded w-3/4"></div>
                <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                <div class="flex gap-3">
                    <div class="h-10 bg-gray-200 rounded flex-1"></div>
                    <div class="h-10 bg-gray-200 rounded flex-1"></div>
                </div>
            </div>
        </div>
    `;
}

// Create Product Card
function createProductCard(product) {
    const badgeClass = product.badge ? getBadgeClass(product.badgeColor) : '';
    
    return `
        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 hover:border-primary overflow-hidden transform hover:-translate-y-2">
            <!-- Image Container -->
            <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 p-8 h-64 flex items-center justify-center overflow-hidden cursor-pointer" onclick="window.location.href='product_details.php'">
                ${product.badge ? `<span class="absolute top-4 right-4 ${badgeClass} px-3 py-1 rounded-lg text-xs font-bold uppercase tracking-wide shadow-lg z-10">${product.badge}</span>` : ''}
                <img src="assets/images/${product.image}" 
                     alt="${product.name}" 
                     class="max-w-full h-48 object-contain transform group-hover:scale-110 transition-transform duration-500"
                     loading="lazy">
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <h3 class="text-xl font-bold text-primary mb-2 group-hover:text-[#0d2d7a] transition-colors cursor-pointer" onclick="window.location.href='product_details.php'">${product.name}</h3>
                <p class="text-gray-600 text-sm mb-6">${product.category}</p>
                
                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <button onclick="window.location.href='product_details.php'" class="flex-1 bg-white border-2 border-primary text-primary hover:bg-primary hover:text-white px-4 py-2.5 rounded-lg font-semibold transition-all duration-300 text-sm">
                        View Details
                    </button>
                    <button onclick="openQuoteModal()" class="flex-1 bg-gradient-to-r from-secondary to-red-800 hover:from-red-800 hover:to-secondary text-white px-4 py-2.5 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl text-sm">
                        Enquiry
                    </button>
                </div>
            </div>
        </div>
    `;
}

// Load Products
function loadProducts(gridId, products) {
    const grid = document.getElementById(gridId);
    if (!grid) return;
    
    // Show skeletons
    grid.innerHTML = Array(products.length).fill(createSkeleton()).join('');
    
    // Load products after delay
    setTimeout(() => {
        grid.innerHTML = products.map(product => createProductCard(product)).join('');
    }, 800);
}

// Initialize on page load
window.addEventListener('DOMContentLoaded', function() {
    loadProducts('valvesGrid', productsData.valves);
    loadProducts('pipesGrid', productsData.pipes);
    loadProducts('accessoriesGrid', productsData.accessories);
});

// Modal Functions
function openQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

function closeQuoteModal() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }
}

// Close modal on background click
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('quoteModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeQuoteModal();
            }
        });
    }
});

// Close modal on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeQuoteModal();
    }
});

console.log('✓ Products page loaded with Primary & Secondary colors only');
</script>
</body>
</html>
