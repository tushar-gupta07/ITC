<?php
/**
 * Header Component - Indian Traders Corp
 * Live Search reads from localStorage('itc_products') or fetches products.json
 */
?>

<!-- Header Section -->
<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">

            <!-- Logo Section -->
            <div class="flex items-center space-x-3 flex-shrink-0">
                <img src="./assets/images/ITC LOGO.png" alt="Indian Traders Corp Logo" class="h-12 w-12">
                <div>
                    <h1 class="text-xl font-bold text-primary">Indian Traders Corp</h1>
                    <p class="text-xs text-gray-600">Since 1969</p>
                </div>
            </div>

            <!-- ================================================
                 SEARCH BAR - DESKTOP
                 Type karo → live dropdown dikhega products ka
                 ================================================ -->
            <div class="hidden lg:flex items-center flex-1 max-w-xl mx-8 relative" id="desktopSearchWrapper">
                <div class="relative w-full group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Search for products, categories..."
                        autocomplete="off"
                        class="w-full pl-12 pr-24 py-3 bg-gray-50 border-2 border-gray-200 rounded-full text-gray-700 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/10 transition-all duration-300 ease-in-out"
                    >
                    
                </div>

                <!-- Desktop Dropdown Results -->
                <div id="searchDropdown"
                     class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-gray-100 z-[9999] max-h-[420px] overflow-y-auto">
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="index.php" class="text-gray-700 hover:text-secondary font-semibold transition">Home</a>

                <!-- About Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-secondary font-semibold transition flex items-center space-x-1">
                        <span>About</span>
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 -translate-y-2 z-50">
                        <div class="py-2">
                            <a href="documentation.php" class="block px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-secondary/10 hover:to-red-50 hover:text-secondary font-medium transition-all border-l-4 border-transparent hover:border-secondary">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <span>Documentation</span>
                                </div>
                            </a>
                            <a href="industry-we-serve.php" class="block px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-secondary/10 hover:to-red-50 hover:text-secondary font-medium transition-all border-l-4 border-transparent hover:border-secondary">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    <span>Industry We Serve</span>
                                </div>
                            </a>
                            <a href="why-itc.php" class="block px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-secondary/10 hover:to-red-50 hover:text-secondary font-medium transition-all border-l-4 border-transparent hover:border-secondary">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                    <span>Why ITC</span>
                                </div>
                            </a>
                            <a href="mission-vision.php" class="block px-6 py-3 text-gray-700 hover:bg-gradient-to-r hover:from-secondary/10 hover:to-red-50 hover:text-secondary font-medium transition-all border-l-4 border-transparent hover:border-secondary rounded-b-lg">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    <span>Mission & Vision</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="products.php" class="text-gray-700 hover:text-secondary font-semibold transition">Products</a>
                <a href="contact.php"  class="text-gray-700 hover:text-secondary font-semibold transition">Contact</a>

                <button onclick="openQuoteModal()" class="bg-gradient-to-r from-secondary to-red-700 text-white px-6 py-2 rounded-lg font-bold hover:from-red-700 hover:to-secondary transition-all transform hover:scale-105 shadow-lg">
                    Get Quote
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 space-y-4">

            <!-- Mobile Search Bar -->
            <div class="relative w-full" id="mobileSearchWrapper">
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-secondary transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="mobileSearchInput"
                        placeholder="Search products..."
                        autocomplete="off"
                        class="w-full pl-12 pr-16 py-3 bg-gray-50 border-2 border-gray-200 rounded-full text-gray-700 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-secondary focus:ring-4 focus:ring-secondary/20 transition-all duration-300"
                    >
                    <button onclick="doMobileSearch()" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-secondary to-red-700 text-white p-2 rounded-full hover:from-red-700 hover:to-secondary transition-all hover:shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
                <!-- Mobile Dropdown Results -->
                <div id="mobileSearchDropdown"
                     class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-gray-100 z-[9999] max-h-72 overflow-y-auto">
                </div>
            </div>

            <a href="index.php" class="block text-gray-700 hover:text-secondary font-semibold transition">Home</a>

            <!-- Mobile About Dropdown -->
            <div>
                <button id="mobileAboutBtn" class="w-full text-left text-gray-700 hover:text-secondary font-semibold transition flex items-center justify-between">
                    <span>About</span>
                    <svg id="mobileAboutIcon" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="mobileAboutMenu" class="hidden mt-2 ml-4 space-y-2 border-l-2 border-secondary/30 pl-4">
                    <a href="documentation.php"    class="block text-gray-600 hover:text-secondary font-medium transition py-1">📄 Documentation</a>
                    <a href="industry-we-serve.php" class="block text-gray-600 hover:text-secondary font-medium transition py-1">🏭 Industry We Serve</a>
                    <a href="why-itc.php"           class="block text-gray-600 hover:text-secondary font-medium transition py-1">⭐ Why ITC</a>
                    <a href="mission-vision.php"    class="block text-gray-600 hover:text-secondary font-medium transition py-1">👁️ Mission & Vision</a>
                </div>
            </div>

            <a href="products.php" class="block text-gray-700 hover:text-secondary font-semibold transition">Products</a>
            <a href="contact.php"  class="block text-gray-700 hover:text-secondary font-semibold transition">Contact</a>

            <button onclick="openQuoteModal()" class="w-full bg-gradient-to-r from-secondary to-red-700 text-white px-6 py-2 rounded-lg font-bold hover:from-red-700 hover:to-secondary transition-all shadow-lg">
                Get Quote
            </button>
        </div>
    </nav>
</header>

<!-- ============================================================
     SEARCH JS — works on ALL pages
     Data source: localStorage('itc_products') → products.json
     ============================================================ -->
<script>
var searchProducts = [];
var searchLoaded   = false;

// 1. Load products data
function loadSearchData() {
    if (searchLoaded) return;
    try {
        var cached = localStorage.getItem('itc_products');
        if (cached) {
            searchProducts = JSON.parse(cached);
            searchLoaded = true;
        } else {
            fetch('./products.json')
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    searchProducts = data;
                    searchLoaded = true;
                    localStorage.setItem('itc_products', JSON.stringify(data));
                    console.log('✅ Search: products loaded from JSON →', data.length);
                })
                .catch(function(e) { console.warn('Search load failed:', e); });
        }
    } catch(e) { console.warn(e); }
}

// 2. Filter function
function doFilter(query) {
    if (!query || query.trim().length < 2) return [];
    var q = query.toLowerCase().trim();
    return searchProducts.filter(function(p) {
        return p.name.toLowerCase().indexOf(q) > -1
            || p.subtitle.toLowerCase().indexOf(q) > -1
            || p.category.toLowerCase().indexOf(q) > -1
            || (p.material    && p.material.toLowerCase().indexOf(q) > -1)
            || (p.description && p.description.toLowerCase().indexOf(q) > -1);
    }).slice(0, 8);
}

// 3. Highlight matching text
function hlText(text, query) {
    if (!text || !query) return text || '';
    var safe = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    return text.replace(new RegExp('(' + safe + ')', 'gi'),
        '<mark class="bg-yellow-200 text-gray-900 px-0.5 rounded">$1</mark>');
}

// 4. Render dropdown
function renderDropdown(results, query, dropdownId) {
    var dd = document.getElementById(dropdownId);
    if (!dd) return;

    if (results.length === 0) {
        dd.innerHTML =
            '<div class="p-6 text-center">' +
            '<svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>' +
            '<p class="font-bold text-gray-600 text-sm">Koi product nahi mila</p>' +
            '<p class="text-xs text-gray-400 mt-1">Try: gate valve, IBR, pipes, SS 304</p>' +
            '</div>';
        dd.classList.remove('hidden');
        return;
    }

    var html =
        '<div class="flex items-center justify-between px-4 py-2 border-b border-gray-100 bg-gray-50 rounded-t-2xl">' +
        '<span class="text-xs font-bold text-gray-500 uppercase">' + results.length + ' result' + (results.length !== 1 ? 's' : '') + '</span>' +
        '<a href="products.php" class="text-xs font-bold text-secondary hover:underline">All Products →</a>' +
        '</div>';

    results.forEach(function(p) {
        var price = '₹' + p.price.toLocaleString('en-IN');
        html +=
            '<div class="flex items-center gap-3 px-4 py-3 hover:bg-blue-50 cursor-pointer border-b border-gray-50 transition-colors group"' +
            ' onclick="goToProductFromSearch(' + p.id + ')">' +
            '<img src="' + p.image + '" alt="' + p.name + '" ' +
            'class="w-14 h-14 object-contain bg-gray-50 rounded-xl p-1 flex-shrink-0 group-hover:scale-105 transition-transform" ' +
            'onerror="this.src=\'./assets/images/Gate-Valve-1.png\'">' +
            '<div class="flex-1 min-w-0">' +
            '<p class="font-bold text-gray-900 text-sm leading-tight line-clamp-1 group-hover:text-secondary">' + hlText(p.name, query) + '</p>' +
            '<p class="text-xs text-gray-400 mt-0.5 line-clamp-1">' + hlText(p.subtitle, query) + '</p>' +
            '<span class="inline-block mt-1 text-xs bg-secondary/10 text-secondary px-2 py-0.5 rounded-full font-semibold">' + p.category + '</span>' +
            '</div>' +
            '<div class="text-right flex-shrink-0">' +
            '<p class="font-extrabold text-secondary text-sm">' + price + '</p>' +
            '<p class="text-xs text-gray-400">/ piece</p>' +
            '</div>' +
            '</div>';
    });

    html +=
        '<div class="px-4 py-3 bg-gray-50 rounded-b-2xl text-center">' +
        '<button onclick="doSearchWithQuery(\'' + encodeURIComponent(query) + '\')" ' +
        'class="text-sm font-bold text-secondary hover:text-blue-800 transition-colors">' +
        'See all results for &quot;' + query + '&quot; →</button></div>';

    dd.innerHTML = html;
    dd.classList.remove('hidden');
}

// 5. Navigate to cart.php with full product details as URL params
function goToProductFromSearch(id) {
    closeAllDropdowns();
    var p = searchProducts.find(function(x){ return x.id === id; });
    if (!p) return;
    var params = new URLSearchParams({
        name:        p.name,
        subtitle:    p.subtitle,
        description: p.description,
        image:       p.image,
        price:       '₹' + p.price.toLocaleString('en-IN'),
        category:    p.category
    });
    window.location.href = 'cart.php?' + params.toString();
}

// 6. Close all dropdowns
function closeAllDropdowns() {
    var d1 = document.getElementById('searchDropdown');
    var d2 = document.getElementById('mobileSearchDropdown');
    if (d1) d1.classList.add('hidden');
    if (d2) d2.classList.add('hidden');
}

// 7. Go to products page with search param
function doSearchWithQuery(encodedQuery) {
    closeAllDropdowns();
    window.location.href = 'products.php?search=' + encodedQuery;
}

function doSearch() {
    var inp = document.getElementById('searchInput');
    var q = inp ? inp.value.trim() : '';
    if (!q) return;
    closeAllDropdowns();
    window.location.href = 'products.php?search=' + encodeURIComponent(q);
}

function doMobileSearch() {
    var inp = document.getElementById('mobileSearchInput');
    var q = inp ? inp.value.trim() : '';
    if (!q) return;
    closeAllDropdowns();
    window.location.href = 'products.php?search=' + encodeURIComponent(q);
}

// 8. Desktop input events
(function() {
    var timer;
    var inp = document.getElementById('searchInput');
    if (!inp) return;

    inp.addEventListener('focus', loadSearchData);

    inp.addEventListener('input', function() {
        clearTimeout(timer);
        var q = this.value.trim();
        if (q.length < 2) { closeAllDropdowns(); return; }
        timer = setTimeout(function() {
            renderDropdown(doFilter(q), q, 'searchDropdown');
        }, 250);
    });

    inp.addEventListener('keydown', function(e) {
        if (e.key === 'Enter')  doSearch();
        if (e.key === 'Escape') closeAllDropdowns();
    });
})();

// 9. Mobile input events
(function() {
    var timer;
    var inp = document.getElementById('mobileSearchInput');
    if (!inp) return;

    inp.addEventListener('focus', loadSearchData);

    inp.addEventListener('input', function() {
        clearTimeout(timer);
        var q = this.value.trim();
        if (q.length < 2) {
            var dd = document.getElementById('mobileSearchDropdown');
            if (dd) dd.classList.add('hidden');
            return;
        }
        timer = setTimeout(function() {
            renderDropdown(doFilter(q), q, 'mobileSearchDropdown');
        }, 250);
    });

    inp.addEventListener('keydown', function(e) {
        if (e.key === 'Enter')  doMobileSearch();
        if (e.key === 'Escape') closeAllDropdowns();
    });
})();

// 10. Click outside → close dropdown
document.addEventListener('click', function(e) {
    var dw = document.getElementById('desktopSearchWrapper');
    var mw = document.getElementById('mobileSearchWrapper');
    if (dw && !dw.contains(e.target)) {
        var d = document.getElementById('searchDropdown');
        if (d) d.classList.add('hidden');
    }
    if (mw && !mw.contains(e.target)) {
        var d2 = document.getElementById('mobileSearchDropdown');
        if (d2) d2.classList.add('hidden');
    }
});

// 11. products.php pe ?search= param handle karo
//     URL mein ?search=gate+valve ho toh auto-filter
function handleSearchParam() {
    var params = new URLSearchParams(window.location.search);
    var q = params.get('search');
    if (!q) return;

    // Fill both inputs
    var di = document.getElementById('searchInput');
    var mi = document.getElementById('mobileSearchInput');
    if (di) di.value = q;
    if (mi) mi.value = q;

    // Wait for allProducts to be populated by products.php script
    var attempts = 0;
    var interval = setInterval(function() {
        attempts++;
        var ap = (typeof allProducts !== 'undefined') ? allProducts : [];
        if (ap.length > 0) {
            clearInterval(interval);
            applySearchFilter(q, ap);
        }
        if (attempts > 50) clearInterval(interval);
    }, 100);
}

// Filter and re-render the product grid on products.php
function applySearchFilter(q, ap) {
    var query = q.toLowerCase().trim();
    var results = ap.filter(function(p) {
        return p.name.toLowerCase().indexOf(query) > -1
            || p.subtitle.toLowerCase().indexOf(query) > -1
            || p.category.toLowerCase().indexOf(query) > -1
            || (p.material && p.material.toLowerCase().indexOf(query) > -1);
    });

    // Update heading
    var titleEl = document.getElementById('section-title');
    var countEl = document.getElementById('section-count');
    if (titleEl) titleEl.textContent = 'Search: "' + q + '"';
    if (countEl) countEl.textContent = results.length + ' product' + (results.length !== 1 ? 's' : '') + ' found';

    var grid = document.getElementById('productGrid');
    if (!grid) return;

    if (results.length === 0) {
        grid.innerHTML =
            '<div class="col-span-4 text-center py-20">' +
            '<svg class="w-20 h-20 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' +
            '<p class="text-2xl font-bold text-gray-600 mb-2">No results for &quot;' + q + '&quot;</p>' +
            '<p class="text-gray-400 mb-6">Try: gate valve, globe valve, pipes, IBR, SS 304</p>' +
            '<a href="products.php" class="bg-secondary text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-800 transition-all inline-block">View All Products</a>' +
            '</div>';
        return;
    }

    // Use whichever card function is available on the page
    var cardFn = (typeof createCard === 'function') ? createCard
               : (typeof createProductCard === 'function') ? createProductCard
               : null;

    if (cardFn) {
        grid.innerHTML = results.map(cardFn).join('');
    }
}

// 12. Mobile menu toggle
var mbBtn = document.getElementById('mobileMenuBtn');
if (mbBtn) {
    mbBtn.addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
}

// 13. Mobile About dropdown toggle
var abBtn = document.getElementById('mobileAboutBtn');
if (abBtn) {
    abBtn.addEventListener('click', function() {
        document.getElementById('mobileAboutMenu').classList.toggle('hidden');
        document.getElementById('mobileAboutIcon').classList.toggle('rotate-180');
    });
}

// Init on load
document.addEventListener('DOMContentLoaded', function() {
    loadSearchData();
    handleSearchParam();
});
</script>